<?php
require_once '../database/Database.php';

$sql = "SELECT id_servico, nome_servico FROM servico WHERE status_servico = 1";
$resultado = mysqli_query($conn, $sql);

$servicos = [];
while ($row = mysqli_fetch_assoc($resultado)) {
    $servicos[] = $row;
}

echo json_encode($servicos);
?>