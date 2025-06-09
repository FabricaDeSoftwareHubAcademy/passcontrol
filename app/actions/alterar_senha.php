
<?php

header('Content-Type: application/json');
require_once '../classes/Usuario.php';

$objUser = new Usuario();

if(isset($_GET['id_user']) && isset($_POST['confirmar_senha'])){
    $id = addslashes($_GET['id_user']);
    $nova_senha = addslashes($_POST['confirmar_senha']);

    $hashed_senha = password_hash($nova_senha, PASSWORD_DEFAULT);

    $res = $objUser->definirNovaSenha($id, $hashed_senha);

    if($res){
        echo json_encode([ "status" => 200, "msg" => "Senha alterada com sucesso!!" ]);
    }else{
        echo json_encode([ "status" => 400, "msg" => "Erro ao Alterar a Senha!!" ]);
    }

}
