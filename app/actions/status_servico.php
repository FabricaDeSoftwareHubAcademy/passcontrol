<?php 
require_once '../classes/Servico.php';

if (isset($_GET['id_servico'])) {
    $id_servico = $_GET['id_servico'];

    $servico = new Servico();
    $dadosAtuais = $servico->buscar_por_id($id_servico);

    if ($dadosAtuais) {
        $novoStatus = ($dadosAtuais->$status_servico == 1) ? 0 : 1;
        $servico->id_servico = $id_servico;
        $servico->status_servico = $novoStatus;

        $resultado = $servico->atualizarStatus();

        if ($resultado) {
            echo json_encode(['status' => 'OK']);
        }else{
            echo json_encode(['status' => 'ERRO','mensagem' => 'Falha ao atualizar status.']);
        }
    }else{
        echo json_encode(['status' => 'ERRO','mensagem' => 'Servico não encontrado']);
    }
} 
?>