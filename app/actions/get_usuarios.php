<?php
require_once '../database/Database.php';

header('Content-Type: application/json');

$db = new Database('usuario');

$where = "status_usuario = 1";
$order = "nome_usuario";

$result = $db->select(null, $where, null, $order);

if($result) {
    $usuarios = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($usuarios);
} else {
    echo json_encode(['erro' => 'Erro ao consultar usuários']);
}
?>