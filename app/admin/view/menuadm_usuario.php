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
                <a href="./menuadm_usuario.php" class="active">Usuários</a>
                <a href="./menuadm_servicos.php">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="./menuadm_usuario.php" class="active">Usuários</a>
                <a href="./menuadm_servicos.php">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
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
            
                <!-- <p>Área de Gestão do Admimistrador.</p> -->
            </div>
            <!-- área dos cards de nevegação  -->
            <main class="area-cards">
                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/usuariocadastrado.png" alt="">
                        </div>

                        <!-- <h3 class="titulo-card">Usuários</h3> -->
                        <!-- <p>Usuários Cadastrados.</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='../../../app/admin/view/AtendentesCadastrados.php';">Listar Usuários</button>
                    </div>
                </div>
                <div class="container_menu">
                    <div class="wrapper">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/cadastrodeusuario.png" alt="">
                        </div>
                        <!-- <h3 class="titulo-produto">Cadastro</h3> -->
                        <!-- <p>Cadastro de Usuário</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='../../../app/admin/view/telacadastro.php';">Cadastro Usuário</button>
                    </div>
                </div>      
            </main>
        </div>
    </section>

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>
</body>
</html>
