<?php
require_once '../classes/Database.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Método inválido.']);
    exit;
}

$nome = $_POST['nome_perfil_usuario'] ?? null;
$idUsuario = $_SESSION['id_usuario'] ?? null;

if (!$nome) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Informe o nome do perfil.']);
    exit;
}

$db = new Database();
try {
    $db->insert('perfil_usuario', [
        'nome_perfil_usuario' => $nome,
        'status_perfil_usuario' => 1,
        'perfil_usuario_created_by_id' => $idUsuario,
        'perfil_usuario_created_in' => date('Y-m-d H:i:s')
    ]);
    $id = $db->getConnection()->lastInsertId();
    echo json_encode(['status' => 'ok', 'id' => $id, 'nome' => $nome]);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao salvar: ' . $e->getMessage()]);
}

