<?php
require_once '../classes/PontoAtendimento.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_ponto_atendimento'])) {
    $id_ponto_atendimento = intval($_GET['id_ponto_atendimento']);
    if ($id_ponto_atendimento <= 0) {
        echo json_encode(["error" => "ID inválido"]);
        exit;
    }

    $guiche = new Ponto_Atendimento();
    $dadosGuiche = $guiche->buscar_por_id($id_ponto_atendimento);

    if ($dadosGuiche) {
        echo json_encode($dadosGuiche);
    } else {
        echo json_encode(["error" => "Registro não encontrado"]);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar os dados recebidos
    if (
        empty($_POST['id_ponto_atendimento']) ||
        empty($_POST['nome_ponto_atendimento']) ||
        empty($_POST['identificador_ponto_atendimento'])
    ) {
        echo json_encode(["status" => "error", "message" => "Campos obrigatórios faltando"]);
        exit;
    }

    $guiche = new Ponto_Atendimento();
    $guiche->id_ponto_atendimento = intval($_POST['id_ponto_atendimento']);
    $guiche->nome_ponto_atendimento = trim($_POST['nome_ponto_atendimento']);
    $guiche->identificador_ponto_atendimento = trim($_POST['identificador_ponto_atendimento']);
    
    $resultado = $guiche->editar();

    if ($resultado) {
        echo json_encode(["status" => "OK"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao atualizar guichê. Tente novamente."]);
    }
    exit;
}

// Mensagem método não suportado
echo json_encode(["error" => "Método HTTP não suportado"]);
exit;
?>