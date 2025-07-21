<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_saida.css">
    <link rel="stylesheet" href="../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_login.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">


    <!-- JS -->
    <script src="../../public/js/modal_alterar_senha.js" defer></script>
    <script src="../../public/js/modal_alterar_dados_login.js" defer></script>
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <!-- <script src="../../public/js/modal_confimarcao_saida.js" defer></script> -->

</head>
<body>
    <header class="cabeca-navegacao-control">
        <div class="nav-cabeca">
            <div class="logo-control">
                <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL" id="img-logo">
                <h1 class="titulo-projeto">PassControl</h1>
            </div>
            <p class="usu-nome">
                <?= isset($_SESSION['nome_usuario']) ? htmlspecialchars($_SESSION['nome_usuario']) : 'Nome do Usuário' ?>
            </p>
            <!-- <a href="">
                <img class="usu-nome" src="../../public/img/icons/image 33.svg" alt="Loading..."">
            </a> -->
        </div>
        <div class="dark-area"></div>
    </header>

    <!-- INFO DO USUARIO -->
    <div class="menu-usuario">
        <?php
            // Só o nome do arquivo guardado na sessão (exemplo: perfil_abc.avif)
            $nomeImagem = $_SESSION['url_foto_usuario'] ?? 'default_user.jpeg';
            // Caminho relativo da página para a pasta uploads
            $caminhoRelativo = '../../public/img/uploads/' . basename($nomeImagem);
        ?>
        <img class="icone-usuario" src="<?= htmlentities($caminhoRelativo) ?>" alt="erro">
        <nav class="usu-detalhes"> 
            <ul class="texto-usu">
                <li class="nome-usu"><?= htmlspecialchars($_SESSION['nome_usuario']) ?></li>
                <li class="email-usu"><?= htmlspecialchars($_SESSION['email_usuario']) ?></li>
                <li><a class="usu-util open-editar-dados">Editar Informações</a></li>
                <li><a class="usu-util open-alterar-senha">Alterar Senha</a></li>
                <li><button class="usu-util usu-sair btn_sair">Sair</button></li>
            </ul>
        </nav>
    </div>
    <!-- MENU LATERAL -->
    <div class="area-lateral-navegacao">
        <nav class="menu-lateral-navegacao">

            <a class="botao-lateal-navegacao">
                <img class="icone-menu-lateral" src="../../public/img/icons/atend.svg" alt="ICONE-ATENDIMENTO">
                <p class="texto-bott">Atendimento</p>
            </a>

            <a class="botao-lateal-navegacao" id="openMonitorModal">
                <img class="icone-menu-lateral" src="../../public/img/icons/monitor.svg" alt="ICONE-MONITOR">
                <p class="texto-bott">Monitor</p>
            </a>

            <a class="botao-lateal-navegacao" href="#">
                <img class="icone-menu-lateral" src="../../public/img/icons/nota.svg" alt="ICONE-RELATORIOS">
                <p class="texto-bott">Relatórios</p>
            </a>
            <div class="sair-navegacao">
                <!-- <button class="botao-lateal-navegacao btn_sair"> -->
                    <img class="icone-menu-lateral" src="../../public/img/icons/sair.svg" alt="ICONE-SAIR">
                    <p class="texto-bott">Sair</p>
                </button>
            </div>
        
        </nav>
    </div>

    <button class="botao-menu-mobile abrirMenuLateral" id="botao-menu-mobile">
        <img class="icone-menu-lateral-mobile" src="../../public/img/icons/DropDownIcon.svg" alt="MENU">
    </button>

    <div class="background-m-mobile">
        <div class="menu-navegacao-mobile">
            <nav class="area-botao-navegacao-mobile">

                <a class="botao-lateral-navegacao-mobile recolher-m-menu">
                    <img class="icone-menu-lateral-mobile" src="../../public/img/icons/Cross.svg" alt="ICONE-ATEND">
                </a>

                <a class="botao-lateral-navegacao-mobile">
                    <img class="icone-menu-lateral-mobile" src="../../public/img/icons/atend.svg" alt="ICONE-ATEND">
                    <p class="texto-bott-mobile">Atendimento</p>
                </a>

                <a class="botao-lateral-navegacao-mobile btnMonitorModal" id="openModalBtn">
                    <img class="icone-menu-lateral-mobile" src="../../public/img/icons/monitor.svg" alt="ICONE-MONITOR">
                    <p class="texto-bott-mobile">Monitor</p>
                </a>

                <a class="botao-lateral-navegacao-mobile" href="./relatorio_diario.php">
                    <img class="icone-menu-lateral-mobile" src="../../public/img/icons/nota.svg" alt="ICONE-RELATORIOS">
                    <p class="texto-bott-mobile">Relatórios</p>
                </a>

                <div class="sair-mobile">
                    <!-- <button class="botao-lateral-navegacao-mobile btn_sair"> -->
                        <img class="icone-menu-lateral-mobile" src="../../public/img/icons/sair.svg" alt="ICONE-SAIR">
                        <p class="texto-bott-mobile">Sair</p>
                    </button>
                </div>
            </nav>
        </div>
        <div class="areatransp"></div>
    </div>

    <?php
        include "../../public/modais/modal_alterar_dados_login.php";
        // include "../../public/modais/modal_confirmacao_saida.php";
        include "../../public/modais/modal_confirmacao_dados.php";
        // include "../../public/modais/modal_alterar_senha.php";
        include "./monitor_modal.php";
    ?>
</body>
</html>