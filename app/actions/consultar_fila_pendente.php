<?php
require_once '../classes/FilaSenha.php';

$fila = new FilaSenha();
$senhas = $fila->buscarFilaPendenteCategoria();

header('Content-Type: application/json');
echo json_encode($senhas);