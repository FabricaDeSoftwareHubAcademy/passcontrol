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
    
    // $foto = $_FILES["foto"];

    $path_foto = '';
    // Verifica se o campo "foto" foi enviado
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {

        $arquivo = $_FILES["foto"];
        $pasta = __DIR__ . './public/img/uploads/uploads_usuario/';
        $nome_arquivo = $arquivo['name'];
        $novo_nome = uniqid();
        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

        if (!in_array($extensao, ["png", "jpg", "jpeg"])) {
            die("Arquivo inválido");
        }

        $path_foto = $pasta . $novo_nome . "." . $extensao;

        if (move_uploaded_file($arquivo['tmp_name'], $path_foto)) {
            $res_img = array("msg" => "Arquivo enviado com sucesso");
            echo json_encode($res_img);
        } else {
            $res_img = array("msg" => "Falha ao salvar arquivo");
            echo json_encode($res_img);
            $path_foto = ''; // Define como vazio se falhar
        }
    }
    // else: Não faz nada, pois o envio da foto é opcional
    
    // VERIFICA SE OS DADOS FORAM PREENCHIDOS
    if($nome != null || $email != null || $cpf != null || $id_perfil != null){   
        
        // INSERE OS DADOS NO OBJETO $objUser
        $objUser = new Usuario();
        $objUser->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        $objUser->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $objUser->cpf = preg_replace('/\D/', '',(filter_var($cpf, FILTER_SANITIZE_SPECIAL_CHARS)));
        
        $objUser->foto = $path_foto;
        $objUser->id_perfil = filter_var($id_perfil, FILTER_SANITIZE_NUMBER_INT);
        
        $res = $objUser->atualizar($id_usuario);
        if($res){
            $resposta = array( "msg" => "Editado com sucesso", "status" => "OK");
            echo json_encode($resposta);
        }else{
            $resposta = array( "msg" => "Erro ao editar", "status" => "ERRO");
            echo json_encode($resposta);
        }                    
    }
    else{
        $resposta = array( "msg" => "Preencha todos os campos", "status" => "ERRO");
        echo json_encode($resposta);
        exit;
    }
}

// if ($foto['erro']){
    //     $resposta = array("msg" => "Falha ao enviar a foto");
    //     echo json_encode($resposta);
    //     exit;
    // }

    // $pasta = './public/img/uploads/uploads_usuario/';
    // $nome_foto = $foto['name'];
    // $novo_nome = uniqid();
    // $extensao = strtolower(pathinfo($nome_foto, PATHINFO_EXTENSION));

    // if($extensao != 'png' && $extensao != 'jpg'){
    //     $resposta = array("msg" => "Arquivo não autorizado");
    //     echo json_encode($resposta);
    //     exit;
    // }
     
    // $path = $pasta . $novo_nome . '.' . $extensao;
    // $foto = move_uploaded_file($arquivo['tmp_name'], $path);

?>