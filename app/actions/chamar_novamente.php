<?php
session_start();
require_once '../classes/FilaSenha.php';
header('Content-Type: application/json');

try {
    $idSenha = $_POST['id_senha'] ?? null;

    if (!$idSenha || !is_numeric($idSenha)) {
        echo json_encode(['success' => false, 'message' => 'ID da senha inválido.']);
        exit;
    }

    $fila = new FilaSenha();
    $atualizado = $fila->chamarNovamente((int)$idSenha);

    if ($atualizado !== false) {
        echo json_encode(['success' => true, 'message' => 'Senha atualizada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Não foi possível atualizar a senha.']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro: ' . $e->getMessage()]);
}
