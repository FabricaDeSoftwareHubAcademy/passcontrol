<?php
require_once '../classes/Permissao.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
    exit;
}

$permissao = new Permissao();

try {
    $lista = $permissao->buscar();  // Busca todas as permissões

    echo json_encode([
        'status' => 'ok',
        'permissoes' => $lista
    ]);
} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao buscar permissões: ' . $e->getMessage()]);
}

exit;
