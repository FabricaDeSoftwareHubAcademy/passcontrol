<?php
require_once '../classes/Perfil.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_servico = $_POST['nome_servico'];
    $codigo_servico = $_POST['codigo_servico'];
    $url_img = $_POST['url_imagem_servico'];
    $servico = new Servico();

    $servico->nome_servico = $nome_servico;
    $servico->codigo_servico = $codigo_servico;
    $servico->url_imagem_servico = $url_img;


    if ($servico->cadastrar()) {
        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o guichê.']);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
}
?>