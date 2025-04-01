<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PassControl</title> 

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/editar_pont_de_atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <div class="cubo-branco">
            <h2 class="titulo">Editar - Pontos de Atendimento</h2>
            <h3 class="sub-titulo">Local de Atendimento</h3>
            
            <!-- Campo de Local de Atendimento -->
            <div class="barra-pesquisa">
                <input type="text" class="input-pesquisa" placeholder="EX: GUICHÊ">
            </div>

            <h4 class="sub-titulo2">Número/Letra</h4>

            <!-- Campo de Número/Letra -->
            <div class="barra-pesquisa1">
                <input type="text" class="input-pesquisa" placeholder="EX: 01">
            </div>

            <!-- Botões de ação -->
            <div class="botoes">
                <a href="../../../app/admin/view/atendimentocadastrados.php">
                    <button class="btn voltar">Voltar</button>
                </a>
                <button class="btn salvar" id="btnSalvar">Salvar</button>
            </div>
        </div>

        <!-- Modal de Salvo com Sucesso -->
        <div id="modalSucesso" class="modal hidden">
            <div class="modal-content">
                <span class="close-btn" id="closeModal">&times;</span>
                <p>Salvo com sucesso!</p>
            </div>
        </div>
    </section>

    <!-- Script JavaScript -->
    <script>
        // Selecionar os elementos do modal e botão
        const btnSalvar = document.getElementById('btnSalvar');
        const modalSucesso = document.getElementById('modalSucesso');
        const closeModal = document.getElementById('closeModal');

        // Evento para exibir o modal ao clicar em "Salvar"
        btnSalvar.addEventListener('click', () => {
            modalSucesso.style.display = 'block'; // Mostrar modal
        });

        // Evento para fechar o modal ao clicar no "X"
        closeModal.addEventListener('click', () => {
            modalSucesso.style.display = 'none'; // Ocultar modal
        });

        // Fechar o modal ao clicar fora da área do conteúdo
        window.addEventListener('click', (event) => {
            if (event.target === modalSucesso) {
                modalSucesso.style.display = 'none';
            }
        });
    </script>

    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>