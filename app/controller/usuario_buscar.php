<?php
require "../classes/Usuario.php";

// logica para buscar usuario
if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];
    
    // busca o usuario pelo ID
    $usuarioObj = new Usuario();
    $usuario = $usuarioObj->buscar_id_usu($id_usuario);
    
    if ($usuario) {
        // retorna os dados como um objeto JSON
        echo json_encode($usuario);
    } else {
        echo json_encode(["error" => "Usuário não encontrado"]);
    }
    exit; 
}
?>