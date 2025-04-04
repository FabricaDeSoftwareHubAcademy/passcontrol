<?php
require '../../../app/CLASSE/guiche.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guiche = new Guiche();
    $guiche->num_guiche = $_POST['num_guiche'];
    $guiche->nome_guiche = $_POST['nome_guiche'];
    $guiche->ativo = 'ATIVO'; 

    
    if ($guiche->criar()) {
        echo "Guichê cadastrado com sucesso!";
        header('Location: PontoAtendimentoCad.php'); 
    } else {
        echo "Erro ao cadastrar guichê.";
    }
}
?>



<!-- Modal de Cadastro -->
<body class="body">
    <button class="botao-modal open">Abrir Modal</button>
    <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Confirmação</h1>
            <hr class="linha">
            <p class="texto"><b>Deseja Inativar Esse Serviço?</b></p>
            <div class="button-group">
                <button class="botao-modal cancel">Não</button>
                <button class="botao-modal save">Sim</button>
            </div>
        </section>
    </main>
    <script src="./inativacao_servico.js"></script>
</body>
