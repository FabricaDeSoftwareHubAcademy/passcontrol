<?php
require_once '../classes/Usuario.php';
session_start();
require_once '../actions/verificar_permissao.php';
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
    exit();
}

$pagesNavigation = Usuario::getPagesNavigation($_SESSION['id_perfil_usuario_fk']);

$nomeExibicao = [
    'atendimento.php' => 'Atendimento',
    'monitor_modal.php' => 'Monitor',
    'menuadm_usuario.php' => 'Gestão',
    'menusup_usuario.php' => 'Gestão',
    'relatorio_diario.php' => 'Relatórios',
];

$icones = [
    'Atendimento' => '../../public/img/icons/atend.svg',
    'Monitor' => '../../public/img/icons/monitor.svg',
    'Gestão' => '../../public/img/icons/gestao.svg',
    'Relatórios' => '../../public/img/icons/nota.svg',
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/menu_eli.css">
    
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_saida.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_login.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
    
    <!-- JS -->
    <script src="../../app/js/modal_selecao_guiche_inicial.js" defer></script>
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
                        <img class="icone-menu-lateral" src="<?= $icone ?>" alt="Ícone <?= htmlspecialchars($nome) ?>">
                        <p class="texto-bott"><?= htmlspecialchars($nome) ?></p>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Botão sair fixo -->
            <div class="sair-navegacao">
                <button class="botao-lateal-navegacao btn_sair">
                    <img class="icone-menu-lateral" src="../../public/img/icons/sair.svg" alt="Ícone Sair">
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

                <?php foreach ($pagesNavigation as $pageNavigation){
                    echo "
                    <a href='$pageNavigation' class='botao-lateral-navegacao-mobile recolher-m-menu'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/Cross.svg' alt='ICONE-ATEND'>
                    </a>
    
                    <a class='botao-lateral-navegacao-mobile' href='./atendimento.php'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/atend.svg' alt='ICONE-ATEND'>
                        <p class='texto-bott-mobile'>Atendimento</p>
                    </a>
    
                    <a class='botao-lateral-navegacao-mobile btnMonitorModal' id='openModalBtn'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/monitor.svg' alt='ICONE-MONITOR'>
                        <p class='texto-bott-mobile'>Monitor</p>
                    </a>
    
                    <a class='botao-lateral-navegacao-mobile' href='./menuadm_usuario.php'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/gestao.svg' alt='ICONE-GESTAO'>
                        <p class='texto-bott-mobile'>Gestão</p>
                    </a>
    
                    <a class='botao-lateral-navegacao-mobile' href='./relatorio_diario.php'>
                        <img class='icone-menu-lateral-mobile' src='../../public/img/icons/nota.svg' alt='ICONE-RELATORIOS'>
                        <p class='texto-bott-mobile'>Relatórios</p>
                    </a>";
                } 
                ?>

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