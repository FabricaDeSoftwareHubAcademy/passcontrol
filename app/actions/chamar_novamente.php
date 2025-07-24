<?php
session_start();
require_once '../database/Database.php';
header('Content-Type: application/json');

try {
    // Obtém o ID da senha via POST
    $idSenha = $_POST['id_senha'] ?? null;

    if (!$idSenha || !is_numeric($idSenha)) {
        echo json_encode(['success' => false, 'message' => 'ID da senha inválido.']);
        exit;
    }

    // Instancia conexão com banco da fila_senha
    $db = new Database('fila_senha');

    // Atualiza apenas o campo fila_senha_updated_in
    $db->update(
        'id_fila_senha = ' . (int)$idSenha,
        ['fila_senha_updated_in' => date('Y-m-d H:i:s')]
    );

    // Retorna sucesso
    echo json_encode(['success' => true, 'message' => 'Senha atualizada com sucesso.']);
} catch (Exception $e) {
    // Em caso de erro
    echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
}
