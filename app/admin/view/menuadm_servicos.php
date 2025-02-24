<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 
    

    <!-- IMPORT DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Cadastro Ponto Atendimento/estilo.css">
    <script src="../../../public/js/modal_cadastro_guiche_adm.js"></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>
    <section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->

        <!-- CODIGO DO ELIANDRO -->
        <!-- navmenu -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php" class="active">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
            
            <div class="menu-mobile" id="mobileMenu">
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php" class="active">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
        </div>

            <!-- área da descrição da página de navegação  -->
            <div class="descricao">
                <!-- <h2>Menu de Gestão</h2> -->
                <!-- <hr> -->
                <!-- <p>Área de Gestão do Admimistrador.</p> -->
            </div>
            <!-- área dos cards de nevegação  -->
            <main class="area-cards">
                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/pontodeatendimento.png" alt="">
                        </div>

                        <!-- <h3 class="titulo-card">Atendimento</h3> -->
                        <!-- <p>Pontos de Atendimento.</p> -->

                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='atendimentocadastrados.php';">Lista de Guichês</button>
                    </div>
                </div>

                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/pontodeatendimento.png" alt="">
                        </div>

                        <!-- <h3 class="titulo-card">Atendimento</h3> -->
                        <!-- <p>Pontos de Atendimento.</p> -->

                    </div>
                    <div class="button-wrapper">
                        <button id="btn_cadastrar_adm" class="btn outline">Cadastro de Guichês</button>
                    </div>
                </div>
                
                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/serviços.png" alt="">
                    </div>

                        <!-- <h3 class="titulo-produto">Serviços</h3> -->
                        <!-- <p>Gestão dos serviços</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='servicos.php';">Lista de Serviços</button>
                    </div>
                </div>    

                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/serviços.png" alt="">
                    </div>

                        <!-- <h3 class="titulo-produto">Serviços</h3> -->
                        <!-- <p>Gestão dos serviços</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='servicos.php';">Cadastrar Serviços</button>
                    </div>
                </div> 

                
            </main>
        </div>
    </section>
    <main-cadastro-cadastro-adm></main-cadastro-cadastro-adm>
    
    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>
    
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>