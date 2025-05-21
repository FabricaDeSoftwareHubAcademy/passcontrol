<?php
require_once './guiche.php';

if (isset($_GET['id_guiche'])) {
    $id_guiche = $_GET['id_guiche'];
    $guiche = new Guiche();
    $dadosGuiche = $guiche->buscar_por_id($id_guiche);

    echo json_encode($dadosGuiche);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $guiche = new Guiche();
    $guiche->id_guiche = $_POST['id_guiche'];
    $guiche->nome_guiche = $_POST['nome_guiche'];
    $guiche->num_guiche = $_POST['num_guiche'];
    $resultado = $guiche->editar();

    
    if ($resultado) {
       
        $resposta = array("status"=>"OK");

        echo json_encode($resposta);

    } else {
        echo '<div class="alert alert-danger">Erro ao atualizar guichê. Tente novamente.</div>';
    }
}
?>