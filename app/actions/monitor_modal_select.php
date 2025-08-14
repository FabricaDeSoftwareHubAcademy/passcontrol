<?php
header('Content-Type: application/json');

require_once '../classes/FilaSenha.php';

$filaSenha = new FilaSenha();
$senhas = $filaSenha->buscar_em_atendimento_modal();

$senhas = $senhas ?: [];

$principal = $senhas[0] ?? null;
$ultimas   = array_slice($senhas, 1, 4);

echo json_encode([
    'principal' => $principal,
    'ultimas'   => $ultimas
]);
