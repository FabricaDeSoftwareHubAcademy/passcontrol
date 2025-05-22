<header class="cabeca-navegacao-control">
    <div class="nav-cabeca">
        <div class="logo-control">
            <img src="../../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo">
            <h1 class="titulo-projeto">PassControl</h1>
        </div>
        <p class="usu-nome">Nome do Usuário</p>
        <!-- <a href="">
            <img class="usu-nome" src="../../../public/img/icons/image 33.svg" alt="Loading..."">
        </a> -->
    </div>
    <div class="dark-area"></div>
</header>

<!-- INFO DO USUARIO -->
<div class="menu-usuario">
    <img class="icone-usuario" src="../../../public/img/icons/image 33.svg" alt="">
    <nav class="usu-detalhes"> 
        <ul class="texto-usu">
            <li class="nome-usu">Nome do Usuário</li>
            <li class="email-usu">funcionario123@fun.br</li>
            <li><a class="usu-util open-editar-dados">Editar Informações</a></li>
            <li><a class="usu-util open-alterar-senha">Alterar Senha</a></li>
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

        <a class="botao-lateal-navegacao" id="openMonitorModal">
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

<button class="botao-menu-mobile abrirMenuLateral" id="botao-menu-mobile">
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

<?php
    include "../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.php";
    include "../../../public/modais/Modal_Alterar_Senha/alterar_senha.php";
?>