<?php
require_once "../classes/Usuario.php";

// logica para buscar usuario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    
    // busca o usuario pelo ID
    $usuarioObj = new Usuario();
    $usuario = $usuarioObj->buscar('id_usuario = '.$id_usuario);

    $busca_usuario_servico = $usuarioObj->select_servicos_atendidos();
    $servico_usuario = array_keys($busca_usuario_servico, $id_usuario);
    
    foreach ($busca_usuario_servico as $ser_atendido){
        if($ser_atendido[0] == $id_usuario){
            array_push($servico, $ser_atendido[1]);
        }
    }
    
    if ($usuario) {
        // retorna os dados como um objeto JSON
        if($busca_usuario_servico){
            echo json_encode([$usuario[0], $servico]);
        }
        else{
            echo json_encode([$usuario[0], null]);
        }
    } else {
        echo json_encode(["error" => "Usuário não encontrado"]);
    }
    exit; 
}
?>