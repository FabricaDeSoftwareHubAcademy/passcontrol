<?php
require './app/CLASSE/guiche.php';

if (isset($_GET['id_guiche']) && isset($_GET['status'])) {
    $id_guiche = $_GET['id_guiche'];
    $status = $_GET['status']; // Status enviado pelo modal (ATIVO ou INATIVO)

    $guiche = new Guiche();
    $guicheInfo = $guiche->buscar_por_id($id_guiche);

    // Alterna o status usando a função alternar_ativo
    $result = $guiche->alternar_ativo($id_guiche, $status);

    if ($result) {
        echo "Status alterado com sucesso."; // Mensagem de sucesso
    } else {
        echo "Erro ao alterar o status.";
    }
} else {
    echo "Erro: Dados não enviados corretamente.";
}
?>
