<?php
require_once "../classes/Usuario.php";

// logica para buscar usuario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    
    // busca o usuario pelo ID
    $usuarioObj = new Usuario();
    $lista_usuario_servico = $usuarioObj->select_servicos_atendidos();
    $servico_usuario = array_column($lista_usuario_servico, $id_usuario);
    
    if ($servico_usuario) {
        // retorna os dados como um objeto JSON
        echo json_encode($servico_usuario);
    } else {
        echo json_encode(["error" => "Usuário não encontrado"]);
    }
    exit; 
}
?>