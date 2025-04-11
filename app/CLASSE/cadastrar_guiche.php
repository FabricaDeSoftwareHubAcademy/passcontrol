<?php
require_once './guiche.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num_guiche = $_POST['num_guiche'];
    $nome_guiche = $_POST['nome_guiche'];
    $guiche = new Guiche();
    $guiche->num_guiche = $num_guiche;
    $guiche->nome_guiche = $nome_guiche;

    if ($guiche->cadastrar()) {
        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o guichê.']);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
}
?>