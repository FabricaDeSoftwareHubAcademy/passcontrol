<?php 
require_once '../classes/PontoAtendimento.php';

$dados = json_decode(file_get_contents("php://input"), true);

if (isset($dados['guiche'])) {
    $id_guiche = (int)$dados['guiche'];

    $guiche = new Ponto_Atendimento();
    $guiche->atualizar_disponivel_atendimento($id_guiche, 1);

    echo json_encode(["status" => "liberado"]);
} else {
    http_response_code(400);
    echo json_encode(["erro" => "Guichê não informado"]);
}

}
