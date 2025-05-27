<?php
require "../classe/Usuario.php";

if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];

    $usuarioObj = new Usuario();

    $user_alternar = $usuarioObj->buscar_id_usu($id_usuario);

    if($user_alternar){
        // retorna os dados como um objeto JSON
        $res = $usuarioObj->alternar_status($user_alternar['id_usuario'], $user_alternar['status_usuario']);

        if($res){     
            $resposta = array("status_usuario" => "OK");
            echo json_encode($resposta);
        }
        else{
            $resposta = array("status_usuario" => "ERRO");
            echo json_encode($resposta);
        }
    }
    exit; 
}
?>