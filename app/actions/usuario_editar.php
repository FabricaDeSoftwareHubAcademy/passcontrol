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
    $foto = $_FILES["foto"];
    $id_perfil = $_POST["id_perfil"];

    
    // VERIFICA SE OS DADOS FORAM PREENCHIDOS
    if($nome != null || $email != null || $cpf != null || $id_perfil != null){   
        
        // INSERE OS DADOS NO OBJETO $objUser
        $objUser = new Usuario();
        $objUser->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
        $objUser->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $objUser->cpf = preg_replace('/\D/', '',(filter_var($cpf, FILTER_SANITIZE_SPECIAL_CHARS)));
        $objUser->foto = $foto;
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
?>