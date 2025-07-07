<?php
session_start();

if (!isset($_SESSION['fila_senhas']) || empty($_SESSION['fila_senhas'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'Fila vazia']);
    exit;
}

$atual = $_SESSION['senha_principal'];
$_SESSION['historico_senhas'][] = $atual;

$_SESSION['senha_principal'] = array_shift($_SESSION['fila_senhas']);

echo json_encode(['sucesso' => true]);
