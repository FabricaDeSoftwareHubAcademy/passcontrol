<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../classes/FilaSenha.php';

header('Content-Type: application/json; charset=UTF-8');

$fila = new FilaSenha();
$senhas = $fila->buscarFilaPendenteCategoria();

if ($senhas === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Nenhuma senha pendente encontrada'], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($senhas === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro ao buscar senhas pendentes'] , JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode($senhas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
exit;
