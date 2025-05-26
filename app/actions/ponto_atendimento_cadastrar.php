<?php
require_once '../classes/PontoAtendimento.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num_guiche = $_POST['num_guiche_cadastrar'];
    $nome_guiche = $_POST['nome_guiche_cadastrar'];
    $guiche = new Ponto_Atendimento();
    $guiche->num_ponto_atendimento = $num_guiche;
    $guiche->nome_ponto_atendimento = $nome_guiche;

    if ($guiche->cadastrar()) {
        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o guichê.']);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
}
?>