<?php
header('Content-Type: application/json');
require_once '../database/Database.php';

$db = new Database('fila_senha');

$id = (int)($_POST['id_senha'] ?? 0);
$statusPresenca = isset($_POST['status_presenca']) ? (int)$_POST['status_presenca'] : null;

if (!$id || !is_numeric($statusPresenca) || !in_array($statusPresenca, [0,1], true)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
    exit;
}

$updated = $db->update(
    "id_fila_senha = $id",
    [
        'status_presenca' => $statusPresenca,
        'fila_senha_iniciada_in' => date('Y-m-d H:i:s')
    ]
);

if ($updated !== false) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao atualizar no banco']);
}
