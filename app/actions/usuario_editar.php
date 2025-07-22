<?php
require_once "../classes/Usuario.php";
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
    exit;
}
elseif (($_SERVER['REQUEST_METHOD'] === 'POST')){
  
    // PEGA OS DADOS VIA POST
    $id_usuario = $_POST["id_usuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $id_perfil = $_POST["id_perfil"];

    $path_foto = '';
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {

        $pasta = '../../public/img/uploads/';
        $arquivo = $_FILES["foto"];
        $nome_arquivo = $arquivo['name'];
        $novo_nome = uniqid();
        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

        if (!in_array($extensao, ["png", "jpg", "jpeg"])) {
            die("Arquivo inválido");
        }

        $path_foto = $pasta . $novo_nome . "." . $extensao;

        if (move_uploaded_file($arquivo['tmp_name'], $path_foto)) {
            $res_img = ("Arquivo enviado com sucesso");
        } else {
            $res_img = ("Falha ao salvar arquivo");
            $path_foto = ''; // EM CASO DE FALHA RETORNA VAZIO
        }
    }else{
        $res_img = ('Imagem nao alterada'); // PERMITE O ENVIO OPCIONAL DA IMAGEM
    }
    
    // VERIFICA SE OS DADOS FORAM PREENCHIDOS
    if($nome != null || $email != null || $cpf != null || $id_perfil != null){
        
        // INSERE OS DADOS NO OBJETO $objUser
        $objUser = new Usuario();
        $objUser->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        $objUser->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $objUser->cpf = preg_replace('/\D/', '',(filter_var($cpf, FILTER_SANITIZE_SPECIAL_CHARS)));
        
        if ($path_foto == '' || $path_foto == null){
            $objUser->foto = $_POST["foto_nula"]; // CASO O CAMPO ESTEJA VAZIO, MANTEM O CAMINHO DA IMAGEM QUE VEIO DO BANCO
        }else{
            $objUser->foto = $path_foto;
        }

        $objUser->id_perfil = filter_var($id_perfil, FILTER_SANITIZE_NUMBER_INT);
        
        $res = $objUser->atualizar($id_usuario);

        $msg = $res ? "Editado com sucesso" : "Dados não alterados";
        
        $res_vincula = "Nao Vinculado";
        
        //// CAPTURA SERVICOS SELECIONADOS
        try{
            $limpa = $objUser->limpa_servicos_usuario($id_usuario);
            // $res_vincula = $limpa ? "Limpou" : "Nao limpou";
            
            if($limpa){
                if(isset($_POST['id_servico'])){
                    $servicos_selecionados = $_POST['id_servico'];
            
                    $vincula = $objUser->vincular_servico(null, $id_usuario,$servicos_selecionados);
                    if($vincula){
                        $res_vincula = "Vinculado";
                    }
                }
            }
        }catch(Exception $erro){
            $res_vincula = ("Nao Vinculado: " . $erro);
        }
        
        // $status = $res ? "OK" : "ERRO";
        
        $status = ($res || $limpa) ? "OK" : "ERRO";
        

        // BOA SORTE NA MANUTENCAO S2
        $resposta = array("msg" => $msg, "img" => $res_img ." ". $path_foto, "status" => $status, "servico" => $res_vincula);
        echo json_encode($resposta);
    }
    else{
        $resposta = array("msg" => "Preencha todos os campos", "status" => "ERRO");
        echo json_encode($resposta);
        exit;
    }
}
?>