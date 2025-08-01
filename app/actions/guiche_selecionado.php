<?php 
require_once '../classes/PontoAtendimento.php';

header("Access-Control-Allow-Origin: *");
header('Cache-Control: no-cache, must-revalidate'); 
header("Content-Type: text/plain; charset=UTF-8");
header("HTTP/1.1 200 OK");

$dados = json_decode(file_get_contents("php://input"), true);

if (isset($dados['guiche'])) {
    $id_guiche = (int)$dados['guiche'];

    $guiche = new Ponto_Atendimento();
    $guiche->atualizar_disponivel_atendimento($id_guiche, 1);

    echo json_encode(["status" => "ocupado"]);
} else {
    http_response_code(400);
    echo json_encode(["erro" => "Guichê não informado"]);
}
