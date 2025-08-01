<?php

header('Content-Type: application/json');
require_once '../classes/Usuario.php';

$objUser = new Usuario();

if(isset($_POST['id_usuario']) && isset($_POST['confirmar_senha'])){
    $id_usuario = filter_var(addslashes($_POST['id_usuario']), FILTER_SANITIZE_NUMBER_INT);
    $nova_senha = addslashes($_POST['confirmar_senha']);

    $res = $objUser->definirNovaSenha($id_usuario, $nova_senha);

    if($res){
        echo json_encode([ "status" => 200, "msg" => "Senha alterada com sucesso!!"]);
    }else{
        echo json_encode([ "status" => 400, "msg" => "Erro ao Alterar a Senha!!" ]);
    }   
}