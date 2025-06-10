<?php
require_once "../classes/Usuario.php";

if(isset($_GET['id'])){
    $id_usuario = $_GET['id'];

    $usuarioObj = new Usuario();

    $usuario_busca = $usuarioObj->buscar("id_usuario = " . $id_usuario);

    $status = $usuario_busca[0]["status_usuario"];

    if($usuario_busca){
        // retorna os dados como um objeto JSON
        $res = $usuarioObj->alternar_status($id_usuario, $status);

        if($res){     
            $resposta = array("msg" => "Status alterado com sucesso" ,"status" => "OK");
            echo json_encode($resposta);
        }
        else{
            $resposta = array("msg" => "Erro ao alterar o status", "status" => "ERRO");
            echo json_encode($resposta);
        }
    }else{
        $resposta = array("msg" => "Usuario não encontrado", "status" => "ERRO");
        echo json_encode($resposta);
    }
    exit; 
}
?>