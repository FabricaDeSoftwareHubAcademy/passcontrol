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
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- navmenu -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php">Serviços</a>
                <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php">Serviços</a>
                <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
        </div>
        <script>
            function toggleMenu() {
                document.getElementById("mobileMenu").classList.toggle("active");
            }
        </script>
        <!-- área da descrição da página de navegação  -->
        <!-- área dos cards de nevegação  -->
        <main class="area-cards">
            <div class="container_menu">
                <div class="wrapper">
                    <a href="">
                        <div class="banner-img">
                            <img src="../../public/img/Menus/TotemPassControl.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='../view/tela_autoatendimento_page1.php';">Visualizar Autoatendimento</button>
                </div>
            </div>
            <div class="container_menu">
                <div class="wrapper">
                    <a href="./monitor-modal.php">
                        <div class="banner-img">
                            <img src="../../public/img/img-menu/monitor.png" alt="">
                            <!-- <img src="../../../public/img/Menus/MONITOR.png" alt=""> -->

                        </div>
                    </a>
                    <!-- <h3 class="titulo-produto">Monitor</h3> -->
                    <!-- <p>Visualizar Monitor de Autoatendimento</p> -->
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" id="visualisarMonitor">Visualizar Monitor</button>
                </div>
            </div>
        </main>
        </div>
    </section>

    <?php
    include "./monitor_modal.php";
    ?>
    
</body>
</html>