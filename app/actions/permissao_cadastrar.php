<?php
require_once '../classes/Permissao.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
    exit;
}

$nome_permissao = $_POST['nome_permissao'] ?? null;
$descricao_permissao = $_POST['descricao_permissao'] ?? null;
$idUsuario = $_SESSION['id_usuario'] ?? null;

if (!$nome_permissao || !$descricao_permissao) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Preencha todos os campos.']);
    exit;
}

$permissao = new Permissao();

try {
    $idPermissao = $permissao->inserir([
        'nome_permissao' => $nome_permissao,
        'descricao_permissao' => $descricao_permissao,
        'permissao_created_in' => date('Y-m-d H:i:s'),
        'permissao_created_by_id' => $idUsuario
    ]);

    echo json_encode(['status' => 'ok', 'id' => $idPermissao, 'nome' => $nome_permissao, 'descricao' => $descricao_permissao]);

} catch (Exception $e) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao salvar: ' . $e->getMessage()]);
}
