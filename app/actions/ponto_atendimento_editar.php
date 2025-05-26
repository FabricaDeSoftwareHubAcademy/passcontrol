<?php
require_once '../classes/PontoAtendimento.php';

if (isset($_GET['id_ponto_atendimento'])) {
    $id_ponto_atendimento = $_GET['id_ponto_atendimento'];
    $guiche = new Ponto_Atendimento();
    $dadosGuiche = $guiche->buscar_por_id($id_ponto_atendimento);

    echo json_encode($dadosGuiche);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $guiche = new Ponto_Atendimento();
    $guiche->id_ponto_atendimento = $_POST['id_ponto_atendimento'];
    $guiche->nome_ponto_atendimento = $_POST['nome_ponto_atendimento'];
    $guiche->num_ponto_atendimento = $_POST['num_ponto_atendimento'];
    $resultado = $guiche->editar();

    
    if ($resultado) {
       
        $resposta = array("status"=>"OK");

        echo json_encode($resposta);

    } else {
        echo '<div class="alert alert-danger">Erro ao atualizar guichê. Tente novamente.</div>';
    }
}
?>