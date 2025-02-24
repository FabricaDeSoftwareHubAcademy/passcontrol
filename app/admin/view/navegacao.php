<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PassControl</title>         
        
        <!-- IMPORT DA FONTE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        
        <!-- IMPORT DO CSS -->
        <link rel="stylesheet" href="../../../public/css/navegacao.css">

        <!-- IMPORT DO JS -->
        <script src="../../../public/js/navegacao-menu-lateral-mobile.js" defer></script>

        <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <header class="cabeca-navegacao-control">
        <div class="nav-cabeca">
            <div class="logo-control">
                <img src="../../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo">
                <h1 class="titulo-projeto">PassControl</h1>
            </div>
            <p class="usu-nome">Nome do Usuário</p>
        </div>
        <div class="dark-area"></div>
    </header>

    <!-- INFO DO USUARIO -->
    <div class="menu-usuario">
        <img class="icone-usuario" src="../../../public/img/icons/image 33.svg" alt="">
        <nav class="usu-detalhes"> 
            <ul class="texto-usu">
                <li class="nome-usu">Gabriel Alvin dos Santos Moraes</li>
                <li class="email-usu">funcionario123@fun.br</li>
                <li><a class="usu-util" href="../../../app/admin/view/adm-logado.php">Editar Informações</a></li>
                <li><a class="usu-util" id="ACESSO-A0-MODAL-DE-ALTERACAO-DE-SENHA">Alterar Senha</a></li>
                <li><a class="usu-util usu-sair" href="../../../index.php">Sair</a></li>
            </ul>
        </nav>
    </div>
    
    <!-- MENU LATERAL -->

    <div class="area-lateral-navegacao">
        <nav class="menu-lateral-navegacao">

            <a class="botao-lateal-navegacao" href="../../../app/admin/view/atendimento.php">
                <img class="icone-menu-lateral" src="../../../public/img/icons/atend.svg" alt="ICONE-ATENDIMENTO">
                <p class="texto-bott">Atendimento</p>
            </a>

            <a class="botao-lateal-navegacao" id="openModalBtn">
                <img class="icone-menu-lateral" src="../../../public/img/icons/monitor.svg" alt="ICONE-MONITOR">
                <p class="texto-bott">Monitor</p>
            </a>

            <a class="botao-lateal-navegacao" href="../../../app/admin/view/menuadm_usuario.php">
                <img class="icone-menu-lateral" src="../../../public/img/icons/gestao.svg" alt="ICONE-GESTAO">
                <p class="texto-bott">Gestão</p>
            </a>

            <a class="botao-lateal-navegacao" href="">
                <img class="icone-menu-lateral" src="../../../public/img/icons/nota.svg" alt="ICONE-RELATORIOS">
                <p class="texto-bott">Relatórios</p>
            </a>
            <div class="sair-navegacao">
                <a class="botao-lateal-navegacao" href="../../../index.php">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/sair.svg" alt="ICONE-SAIR">
                    <p class="texto-bott">Sair</p>
                </a>
            </div>
            
        </nav>
    </div>

    <button class="botao-menu-mobile abrirMenuLateral" id="botao-menu-mobile"> <!-- Botão ainda inativo -->
        <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/DropDownIcon.svg" alt="MENU">
    </button>
    
    <div class="background-m-mobile">
        <div class="menu-navegacao-mobile">
            <nav class="area-botao-navegacao-mobile">

                <a class="botao-lateral-navegacao-mobile recolher-m-menu">
                    <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/Cross.svg" alt="ICONE-ATEND">
                </a>

                <a class="botao-lateral-navegacao-mobile" href="../../../app/admin/view/atendimento.php">
                    <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/atend.svg" alt="ICONE-ATEND">
                    <p class="texto-bott-mobile">Atendimento</p>
                </a>

                <a class="botao-lateral-navegacao-mobile btnMonitorModal" id="openModalBtn">
                    <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/monitor.svg" alt="ICONE-MONITOR">
                    <p class="texto-bott-mobile">Monitor</p>
                </a>

                <a class="botao-lateral-navegacao-mobile" href="../../../app/admin/view/menuadm_usuario.php">
                    <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/gestao.svg" alt="ICONE-GESTAO">
                    <p class="texto-bott-mobile">Gestão</p>
                </a>

                <a class="botao-lateral-navegacao-mobile" href="">
                    <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/nota.svg" alt="ICONE-RELATORIOS">
                    <p class="texto-bott-mobile">Relatórios</p>
                </a>

                <div class="sair-mobile">
                    <a class="botao-lateral-navegacao-mobile" href="../../../index.php">
                        <img class="icone-menu-lateral-mobile" src="../../../public/img/icons/sair.svg" alt="ICONE-SAIR">
                        <p class="texto-bott-mobile">Sair</p>
                    </a>
                </div>
            </nav>
        </div>
        <div class="areatransp"></div>
    </div>
    <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
