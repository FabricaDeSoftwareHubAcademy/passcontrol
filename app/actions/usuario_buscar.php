<?php
require_once "../classes/Usuario.php";

// logica para buscar usuario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    
    // busca o usuario pelo ID
    $usuarioObj = new Usuario();
    $usuario = $usuarioObj->buscar('id_usuario = '.$id_usuario);

    $busca_usuario_servico = $usuarioObj->select_servicos_atendidos();

    $servicos = [];
    foreach ($busca_usuario_servico as $servico_atendido){ //captura ids dos servicos atendidos e insere em um array
        if($servico_atendido["id_usuario"] == $id_usuario){
            // $servicos[] = ["id_servico" => $servico_atendido["id_servico"]];
            $servicos[] = $servico_atendido["id_servico"];
        }
    }

    if ($usuario) {
        // retorna os dados como um objeto JSON
        if($busca_usuario_servico){
            echo json_encode([$usuario[0], $servicos]);
        }
        else{
            echo json_encode([$usuario[0], []]);
        }
    } else {
        echo json_encode(["error" => "Usuário não encontrado"]);
    }
    exit; 
}
?>