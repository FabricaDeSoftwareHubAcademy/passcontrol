
<?php

header('Content-Type: application/json');
require_once '../classes/Usuario.php';

$objUser = new Usuario();

if(isset($_GET['id_user']) && isset($_POST['confirmar_senha'])){
    $id = addslashes($_GET['id_user']);
    $nova_senha = addslashes($_POST['confirmar_senha']);

    $res = $objUser->definirNovaSenha($id, $nova_senha);

    if($res){
        echo json_encode([ "status" => 200, "msg" => "Senha alterada com sucesso!!"]);
    }else{
        echo json_encode([ "status" => 400, "msg" => "Erro ao Alterar a Senha!!" ]);
    }

}


//UTILIZA O MESMO MÉTODO definirNovaSenha da CLASSE Usuario.php para A RECUPERAÇÃO DE SENHA
if(isset($_POST['recuperar_senha'])){
    $id = addslashes($_POST['id_user']);
    $nova_senha = addslashes($_POST['confirmar_senha']);

    $res = $objUser->definirNovaSenha($id, $nova_senha);

    if($res){
        echo json_encode([ "status" => 200, "msg" => "Senha alterada com sucesso!!" ]);
    }else{
        echo json_encode([ "status" => 400, "msg" => "Erro ao Alterar a Senha!!" ]);
    }

}
