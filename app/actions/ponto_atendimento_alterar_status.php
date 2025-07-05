<?php
require_once '../classes/PontoAtendimento.php';

if (isset($_GET['id_ponto_atendimento'])) {
    $id = $_GET['id_ponto_atendimento'];

    if ($id !== null && $id !== '') {
        $objPonto = new Ponto_Atendimento();

        $pontoAtend = $objPonto->buscar_por_id($id);

        if ($pontoAtend) {
            $res = $objPonto->alternar_ativo($pontoAtend->id_ponto_atendimento, $pontoAtend->status_ponto_atendimento);

            if ($res) {
                $resposta = array("msg" => "Status alterado com sucesso", "status" => "OK");
                echo json_encode($resposta);
            } else {
                $resposta = array("msg" => "Erro ao alterar o status", "status" => "ERRO");
                echo json_encode($resposta);
            }
        } else {
            $resposta = array("msg" => "Ponto de atendimento não encontrado", "status" => "ERRO");
            echo json_encode($resposta);
        }
    } else {
        $resposta = array("msg" => "ID inválido", "status" => "ERRO");
        echo json_encode($resposta);
    }
} else {
    $resposta = array("msg" => "ID não informado", "status" => "ERRO");
    echo json_encode($resposta);
} 
?>