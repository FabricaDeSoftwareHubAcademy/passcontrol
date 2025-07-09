<?php

require_once '../database/Database.php';

header('Content-Type: application/json');

$db = new Database('servico');

$result = $db->select(null,null,null,'nome_servico');

if($result) {
    $servicos = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($servicos);
} else {
    echo json_encode(['erro' => 'Erro ao consultar serviços']);
}






?>