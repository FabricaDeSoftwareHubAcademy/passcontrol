<?php
require './app/CLASSE/guiche.php';

if (isset($_GET['id_guiche']) && isset($_GET['status'])) {
    $id_guiche = $_GET['id_guiche'];
    $status = $_GET['status']; 

    $guiche = new Guiche();
    $guicheInfo = $guiche->buscar_por_id($id_guiche);

   
    $result = $guiche->alternar_ativo($id_guiche, $status);

    if ($result) {
        echo "Status alterado com sucesso."; 
    } else {
        echo "Erro ao alterar o status.";
    }
} else {
    echo "Erro: Dados não enviados corretamente.";
}
?>
