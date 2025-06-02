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
                <a href="./menusup_usuario.php" class="active">Usuários</a>
                <a href="./menusup_servicos.php">Serviços</a>
                <!-- <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a> -->
                <a href="./menuadm_usuario.php">ADM</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="./menusup_usuario.php" class="active">Usuários</a>
                <a href="./menusup_servicos.php">Serviços</a>
                <!-- <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a> -->
                <a href="./menuadm_usuario.php">ADM</a>
            </div>
        </div>
        <script>
            function toggleMenu() {
                document.getElementById("mobileMenu").classList.toggle("active");
            }
        </script>
        <!-- área da descrição da página de navegação  -->
        <div class="descricao">
            <!-- <h2>Menu de Gestão</h2> -->
            
            <!-- <p>Área de Gestão do Supervisor.</p> -->
        </div>
            <!-- área dos cards de nevegação  -->
            <main class="area-cards">
                <div class="container_menu">
                    <div class="wrapper">
                        <a href="./atendentes_cadastrados.php">
                        <div class="banner-img">
                            <img src="../../public/img/Menus/3.png" alt="">
                        </div>
                        </a>
                        <!-- <h3 class="titulo-card">Usuários</h3> -->
                        <!-- <p>Usuários Cadastrados.</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='./atendentes_cadastrados.php';">Listar Usuários</button>
                    </div>
                </div>
                <div class="container_menu">
                    <div class="wrapper">
                        <a href="./cadastro_usuario.php">
                        <div class="banner-img">
                            <img src="../../public/img/Menus/2.png" alt="">
                        </div>
                        </a>
                        <!-- <h3 class="titulo-produto">Cadastro</h3> -->
                        <!-- <p>Cadastro de Usuário</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='./cadastro_usuario.php';">Cadastrar Usuários</button>
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