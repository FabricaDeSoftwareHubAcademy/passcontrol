<?php
require "../classes/Usuario.php";
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
    // $foto = $_POST["foto"];
    $id_perfil = $_POST["id_perfil"];

    
    // VERIFICA SE OS DADOS FORAM PREENCHIDOS
    if($nome != null || $email != null || $cpf != null || $id_perfil != null){   
        
        // INSERE OS DADOS NO OBJETO $objUser
        $objUser = new Usuario();
        $objUser->nome = $nome;
        $objUser->cpf = $cpf;
        $objUser->email = $email;
        // $objUser->foto = $foto;
        $objUser->id_perfil = $id_perfil;
        
        $res = $objUser->update($id_usuario);
        if($res){
            $resposta = array( "msg" => "Cadastrado com sucesso", "status" => "OK");
            echo json_encode($resposta);
        }else{
            $resposta = array( "msg" => "Erro ao cadastrar", "status" => "ERRO");
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