<?php
require_once '../database/Database.php';

header('Content-Type: application/json');

$db = new Database('ponto_atendimento');

$order = "nome_ponto_atendimento";

// Remova o filtro WHERE
$result = $db->select(null, null, null, $order);

if($result) {
    $pontos = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($pontos);
} else {
    echo json_encode(['erro' => 'Nenhum ponto de atendimento encontrado']);
}
?>