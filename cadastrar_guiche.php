<?php
require_once './app/CLASSE/guiche.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega os dados do formulário
    $num_guiche = $_POST['num_guiche'];
    $nome_guiche = $_POST['nome_guiche'];

    // Cria uma nova instância de Guiche
    $guiche = new Guiche();
    $guiche->num_guiche = $num_guiche;
    $guiche->nome_guiche = $nome_guiche;

    // Tenta criar o guichê no banco
    if ($guiche->criar()) {
        // Redireciona para uma página de sucesso ou de listagem dos guichês
        header('Location: ../app/admin/view/PontoAtendimentoCad.php'); 
        exit;
    } else {
        echo "Erro ao cadastrar o guichê. Tente novamente.";
    }
}

?>
