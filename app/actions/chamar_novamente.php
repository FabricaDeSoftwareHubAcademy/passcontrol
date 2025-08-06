<?php
session_start();
require_once '../database/Database.php';
header('Content-Type: application/json');

try {
    $idSenha = $_POST['id_senha'] ?? null;

    if (!$idSenha || !is_numeric($idSenha)) {
        echo json_encode(['success' => false, 'message' => 'ID da senha inválido.']);
        exit;
    }
    $db = new Database('fila_senha');
    $db->update(
        'id_fila_senha = ' . (int)$idSenha,
        ['fila_senha_chamada_in' => date('Y-m-d H:i:s')]
    );

    echo json_encode(['success' => true, 'message' => 'Senha atualizada com sucesso.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
}
