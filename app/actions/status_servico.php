<?php 
require_once '../classes/Servico.php';

if(isset($_GET['id_servico'])) {
    $id = $_GET['id_servico'];
    $servico = new Servico();
    $resultado = $servico->atualizar_status($id);

    echo json_encode(['status' => $resultado ? 'OK' : 'ERRO']);
}else{
    echo json_encode(['status' => 'ERRO']);
}
?>