<?php
include_once "../actions/carregar_navegacao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/astyle_global.css">

    <!-- JS Geral -->
    <script src="../../public/js/modal_confirmacao_deslogar.js" defer></script>
    <script src="../../public/js/modal_alterar_senha.js" defer></script>
    <script src="../../public/js/modal_alterar_dados_login.js" defer></script>
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../js/bloquea_navegacao.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/icons/logo_control.svg">
</head>
<body>
    <header class="cabeca-navegacao-control">
        <div class="navegacao-cabeca">
            <div class="logo-control-navegacao">
                <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL" id="img-logo">
                <h1 class="titulo-projeto-navegacao">PassControl</h1>
            </div>
            <p class="usu-nome">
                <?= isset($_SESSION['nome_usuario']) ? htmlspecialchars($_SESSION['nome_usuario']) : 'Nome do Usuário' ?>
            </p>
        </div>
        <div class="dark-area-navegacao"></div>
    </header>

    <!-- INFO DO USUARIO -->
    <div class="menu-usuario">
    <?php
        $nomeImagem = $_SESSION['url_foto_usuario'] ?? 'default_user.jpeg';
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
            <?php foreach ($menus as $arquivo): 
                $nome = $nomeExibicao[$arquivo] ?? ucfirst(pathinfo($arquivo, PATHINFO_FILENAME));
                $icone = $icones[$nome] ?? '../../public/img/icons/default.svg';

                if ($nome === 'Monitor'): ?>
                    <a class="botao-lateal-navegacao" id="openMonitorModal" href="javascript:void(0);">
                        <img class="icone-menu-lateral" src="<?= $icone ?>" alt="ICONE-MONITOR">
                        <p class="texto-bott"><?= htmlspecialchars($nome) ?></p>
                    </a>
                <?php else: ?>
                    <a class="botao-lateal-navegacao" href="./<?= $arquivo ?>">
                        <img class="icone-menu-lateral" src="<?= $icone ?>" alt="Icone <?= htmlspecialchars($nome) ?>">
                        <p class="texto-bott"><?= htmlspecialchars($nome) ?></p>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Botão sair fixo -->
            <div class="sair-navegacao">
                <button class="botao-lateal-navegacao btn_sair">
                    <img class="icone-menu-lateral" src="../../public/img/icons/sair.svg" alt="Icone Sair">
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
            <?php
            if (!isset($pagesNavigation) || !is_array($pagesNavigation)) {
                $pagesNavigation = [];
            }

            if (!empty($pagesNavigation)) {
                foreach ($pagesNavigation as $pageNavigation) {
                    echo "
                    <a href='$pageNavigation' class='botao-lateral-navegacao-mobile recolher-m-menu'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/Cross.svg' alt='ICONE-ATEND'>
                    </a>
                    ";
                }
            }

            // Esses links são fixos e não dependem de $pagesNavigation
            ?>
            <a class='botao-lateral-navegacao-mobile' href='./atendimento.php'>
                <img class='icone-menu-lateral-mobile' src='../../public/img/icons/atend.svg' alt='ICONE-ATEND'>
                <p class='texto-bott-mobile'>Atendimento</p>
            </a>

            <a class='botao-lateral-navegacao-mobile btnMonitorModal' id='openModalBtn'>
                <img class='icone-menu-lateral-mobile' src='../../public/img/icons/monitor.svg' alt='ICONE-MONITOR'>
                <p class='texto-bott-mobile'>Monitor</p>
            </a>

            <a class='botao-lateral-navegacao-mobile' href='./menu_gestao_usuario.php'>
                <img class='icone-menu-lateral-mobile' src='../../public/img/icons/gestao.svg' alt='ICONE-GESTAO'>
                <p class='texto-bott-mobile'>Gestão</p>
            </a>

            <a class='botao-lateral-navegacao-mobile' href='./relatorio_diario.php'>
                <img class='icone-menu-lateral-mobile' src='../../public/img/icons/nota.svg' alt='ICONE-RELATORIOS'>
                <p class='texto-bott-mobile'>Relatórios</p>
            </a>
                <div class="sair-mobile">
                    <button class="botao-lateral-navegacao-mobile btn_sair">
                        <img class="icone-menu-lateral-mobile" src="../../public/img/icons/sair.svg" alt="ICONE-SAIR">
                        <p class="texto-bott-mobile">Sair</p>
                    </button>
                </div>
            </nav>
        </div>
        <div class="areatransp"></div>
    </div>

    <?php
        include_once "../../public/modais/modal_confirmacao_saida.php";
        include_once "../../public/modais/modal_alterar_dados_login.php";
        include_once "../../public/modais/modal_confirmacao_dados.php";
        include_once "../../public/modais/modal_alterar_senha.php";
    ?>
</body>
</html>