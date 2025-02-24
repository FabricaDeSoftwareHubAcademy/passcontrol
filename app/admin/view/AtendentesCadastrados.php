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
        <link rel="stylesheet" href="../../../public/css/AtendentesCadastrados.css">
        <link rel="stylesheet" href="../../../public/modais/Modal Inativação Usuário/estilo.css">
        <link rel="stylesheet" href="../../../public/modais/Modal Ativação Usuário/estilo.css">

        <!-- IMPORT DO JS -->
        <script src="../../../public/js/navegacao-menu-lateral-teste.js" defer></script>
        <script src="../../../public/js/modal-atendentes-cadastrados.js"></script>

        <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <header class="cabeca-navegacao-control">
        <nav class="nav-cabeca">
            <div class="logo-control">
                <img src="../../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo">
            </div>
            <H3>PassControl</H3>
            <div class="usu">                
                <!-- INFO DO USUARIO -->
                <div class="menu-usuario">
                    <a class="usu">Nome do Usuário</a>
                    <nav class="usu-detalhes"> 
                        <img src="../../../public/img/icons/image 33.svg" alt="">
                        <ul class="texto-usu">
                            <li class="nome-usu">Nome do Usuário</li>
                            <li class="email-usu">funcionario123@fun.br</li>
                            <li><a href="../../../app/admin/view/adm-logado.php">Editar Informações</a></li>
                            <li><a class="sair" href="../../../index.php">Sair</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
        <div class="dark-area"></div>
    </header>

    <!-- MENU LATERAL -->
    <button class="botao-menu-mobile"> <!-- Botão ainda inativo -->
        <img class="icone-menu-lateral" src="../../../public/img/icons/DropDownIcon.svg" alt="MENU">
    </button>

    <div class="area-lateral-navegacao">
        <nav class="menu-lateral-navegacao">

            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" href="../../../app/admin/view/atendimento.php">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/atend.svg" alt="ICONE ATENDIMENTO">
                    <div class="texto-bott">Atendimento</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" id="openModalBtn">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/monitor.svg" alt="ICONE MONITOR">
                    <div class="texto-bott">Monitor</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" href="">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/nota.svg" alt="ICONE RELATORIOS">
                    <div class="texto-bott">Relatórios</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao ativo-estacionario" href="../../../app/admin/view/menuadm_usuario.php">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/gestao.svg" alt="ICONE GESTAO">
                    <div class="texto-bott">Gestão</div>
                </a>
            </div>
        </nav>
        <div class="sair-navegacao">
            <a class="botao-lateal-navegacao" href="../../../index.php">
                <img class="icone-menu-lateral" src="../../../public/img/icons/sair.svg" alt="ICONE SAIR">
                <div class="texto-bott">Sair</div>
            </a>
        </div>
    </div>

    <section class="Area-Util-Projeto">

    <div class="area-info">
        <div class="header-area">
            <div class="titulo-area">
                <span>Usuarios Cadastrados</span>
            </div>
            <div class="input-search">
                <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente">
            </div>
        </div>
        <div class="linha-in">
            <span></span>
        </div>
        <div class="area-tabela">
            <div class="sub-area-tabela">
                    <table class="tabela">
                            <tr>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Perfil</th>
                                <th>Serviços</th>
                                <th>Editar</th>
                                <th>Ativar/Desativar</th>
                            </tr>
                            <tr>
                                <td>Guilherme F. Machado</td>
                                <td>guilermeaxe@gmail.com</td>
                                <td>Administrador</td>
                                <td>Nota Fiscal</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Joao Pedro Sampaio</td>
                                <td>joaozinhodelasedeles@gmail.com</td>
                                <td>Atendente</td>
                                <td>IPTU</td>
                                <td>
                                    <div class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                                </td>
                                <td>
                                    <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                                </td>
                            </tr>
                       
                    </table>
            </div>
        </div>
        <div class="div-botao-info">
            <button class="add-func" type="submit" onclick="window.location.href='../../../app/admin/view/telacadastro.php';">Novo Funcionario</button>
        </div>
    </section>
    <!-- <main-atendentes-cadastrados></main-atendentes-cadastrados> -->
    
    <!--MONITOR MODAL-->
    <div class="area-monitor-modal">
        <div class="area-modal" id="modal">
            <div class="modal-fundo">
                <div class="fundo-lateral">
                    <h1>Últimas Chamadas</h1>
                    <div class="area-das-senhas">
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                                <div class="senha">
                                    <h3>SENHA</h3>
                                    <h4>CM 001</h4>
                                </div>
                                <div class="guiche">
                                    <h5>GUICHE</h5>
                                    <h6>1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                                <div class="senha">
                                    <h3>SENHA</h3>
                                    <h4>CM 001</h4>
                                </div>
                                <div class="guiche">
                                    <h5>GUICHE</h5>
                                    <h6>1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA</h3>
                                <h4>CM 001</h4>
                            </div>
                            <div class="guiche">
                                <h5>GUICHE</h5>
                                <h6>1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="caixa-das-senhas">
                        <h2>NOME DA PESSOA</h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA</h3>
                                <h4>CM 001</h4>
                            </div>
                            <div class="guiche">
                                <h5>GUICHE</h5>
                                <h6>1</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fundo-principal">
                <div class="area-botao-fechar-monitor">
                    <div class="botao-fechar-monitor">
                        <h2>X</h2> 
                    </div>
                </div>
            <div class="fundo-senha-principal">
                <div class="caixa-senha-principal">
                    <div class="conjunto-senha-principal">
                        <div class="nome-pessoa">
                            <h1>NOME DA PESSOA</h1>
                        </div>
                        <div class="infos-senha-principal">
                            <h2>SERVIÇO:<span>IPTU</span></h2>
                            <h2>SENHA:<span>CM 001</span></h2>
                            <h2>GUICHÊ:<span>1</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../public/js/monitor-modal.js" defer></script>
</body>
</html>