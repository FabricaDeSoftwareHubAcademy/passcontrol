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
    <link rel="stylesheet" href="../../public/css/tela_autoatendimentoPage1.css">
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    
    <!-- JS -->
    <script src="../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../public/js/monitor-modal.js" defer></script>
    <script src="../../public/js/modal_cadastro_guiche_adm.js" defer></script>
    <script src="../../public/js/tela_autoatendimentoPaginação_teste.js" defer></script> <!-- NOVO JS -->

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php include "./navegacao.php"; ?>
    
    <section class="Area-Util-Projeto">
        <!-- navmenu -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php">Serviços</a>
                <a href="#" class="btn outline active" onclick="carregarAutoatendimento(event)">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>

            <div class="menu-mobile" id="mobileMenu">
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php" >Serviços</a>
                <a href="#" class="btn outline active" onclick="carregarAutoatendimento(event)">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
        </div>

        <!-- área dos cards -->
        <main class="area-cards" id="areaCards">
            <!-- Conteúdo inicial dos cards vem aqui -->
            <?php include "./tela_autoatendimento_conteudo.php"; ?>
        </main>
    </section>

    <?php include "./monitor_modal.php"; ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>
