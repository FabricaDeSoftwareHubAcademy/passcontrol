<?php
require_once '../classes/PontoAtendimento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $identificador_ponto_atendimento = $_POST['identificador_ponto_atendimento_cadastrar'];
    $nome_ponto_atendimento = $_POST['nome_ponto_atendimento_cadastrar'];
    $guiche = new Ponto_Atendimento();
    $guiche->identificador_ponto_atendimento = $identificador_ponto_atendimento;
    $guiche->nome_ponto_atendimento = $nome_ponto_atendimento;

    if ($guiche->cadastrar()) {
        echo json_encode(['status' => 'OK']);
    } else {
        echo json_encode(['status' => 'ERRO', 'mensagem' => 'Erro ao cadastrar o guichê.']);
    }
} else {
    echo json_encode(['status' => 'ERRO', 'mensagem' => 'Requisição inválida.']);
}
?>