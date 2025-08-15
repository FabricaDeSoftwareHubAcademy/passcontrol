<?php
require_once '../database/Database.php';

$sql = "SELECT id_ponto_atendimento, identificador_ponto_atendimento FROM ponto_atendimento WHERE status_ponto_atendimento = 1";
$resultado = mysqli_query($conn, $sql);

$pontos = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $pontos[] = $row;
}

echo json_encode($pontos);
?>