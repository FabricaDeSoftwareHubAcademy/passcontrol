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
<main class="modal-container" id="modalCadastro">
    <section class="modal">
        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <h1 class="titulo">Cadastrar Guichê</h1>
        <hr class="linha">
        
        <form id="formCadastroGuiche" action="cadastrar_guiche.php" method="POST">
            <div>
                <label for="num_guiche">Número do Guichê:</label>
                <input type="text" id="num_guiche" name="num_guiche" required>
            </div>
            <div>
                <label for="nome_guiche">Nome do Guichê:</label>
                <input type="text" id="nome_guiche" name="nome_guiche" required>
            </div>
            <div class="button-group">
                <button type="button" class="botao-modal cancel" onclick="fecharModal()">Cancelar</button>
                <button type="submit" class="botao-modal save">Cadastrar</button>
            </div>
        </form>
    </section>
</main>
