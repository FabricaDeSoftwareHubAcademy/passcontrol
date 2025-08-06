<?php
require_once '../classes/FilaSenha.php';

$fila = new FilaSenha();
$senhas = $fila->buscarSenhasAtendidasNoDia();

header('Content-Type: application/json; charset=utf-8');

// Verifica se há senhas "em atendimento" no dia

if (!$senhas) {
    $senhas = [];
}

foreach ($senhas as &$senha) {
    $senha['inicio'] = date('d/m/Y H:i:s', strtotime($senha['inicio']));
    $senha['termino'] = date('d/m/Y H:i:s', strtotime($senha['termino']));
}


echo json_encode($senhas);
