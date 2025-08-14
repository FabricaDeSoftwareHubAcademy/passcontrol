<?php
header('Content-Type: application/json');
require_once '../classes/FilaSenha.php';

try {
    $id = (int)($_POST['id_senha'] ?? 0);
    $statusPresenca = isset($_POST['status_presenca']) ? (int)$_POST['status_presenca'] : null;

    if (!$id || !is_numeric($statusPresenca) || !in_array($statusPresenca, [0, 1], true)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Dados inválidos']);
        exit;
    }

    $filaSenha = new FilaSenha();
    $resultado = $filaSenha->atualizarPresenca($id, $statusPresenca);

    if ($resultado !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar no banco']);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
