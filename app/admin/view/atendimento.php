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
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../../public/css/atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Iniciar Intervalo/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação de Presença/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Consultar Fila/estilo.css">

    <!-- IMPORT DO JS -->
    <script src="../../../public/js/modal-teladelogin.js"></script>
    <script src="../../../public/js/modal-proxima-senha.js"></script>
    <script src="../../../public/modais/Modal Consultar Fila/modal.js" defer></script>

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
                <a class="botao-lateal-navegacao ativo-estacionario" href="../../../app/admin/view/atendimento.php">
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
                <a class="botao-lateal-navegacao" href="../../../app/admin/view/menuadm_usuario.php">
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
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->

        <!-- <div class="principal-chamar-senha"> -->
            <!-- SUBMENU ATENDIMENTO -->
            <div class="menu-container">
                <div class="menu">
                    <button class="hamburger" onclick="toggleMenu()">☰</button>
                    <a href="../../../app/admin/view/atendimento_tempo_real.php">Guichês</a>
                    <a href="../../../app/admin/view/atendimento.php" class="active">Atendimento</a>
                </div>
                <div class="menu-mobile" id="mobileMenu">
                    <a href="../../../app/admin/view/atendimento_tempo_real.php">Guichês</a>
                    <a href="../../../app/admin/view/atendimento.php" class="active">Atendimento</a>
                </div>
            </div>
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
            <nav class="area-chamada-atendimento">
                <nav class="topo-area-chamada">
                    <ul class="esquerda-area-chamada">
                        <div class="atendimento-atual-atendimento">
                            <div class="informacoes-area-chamada">
                                <div class="nome-area-chamada">
                                    <p class="nome-tela-atendimento">Nome:</p>
                                    <p class="pessoa-tela-atendimento">Juliana Barbosa Martins Nogueira Rodrigues Gomes</p>
                                </div>
                                <div class="info-area-chamada">
                                    <div class="senha-area-chamada">
                                        <p>Senha:</p>
                                        <p>CM005</p>
                                    </div>
                                    <div class="servico-area-chamada">
                                        <p>Serviço:</p>
                                        <p>Poda de Árvore</p>
                                    </div>
                                </div>
                            </div>
                            <div class="numero-guiche-atendimento">
                                <p class="numero--atendimento">1</p>
                                <p class="texto-info-atendimento">Guichê</p>
                            </div>
                        </div>
                        <div class="info-atendimento-inicio">
                            <div class="senhas-na-fila-atendimento-vermelho">
                                <p class="numero--atendimento senhas-vermelhas">0</p>
                                <p class="texto-info-atendimento senhas-vermelhas">Senhas Na Fila</p>
                            </div>
                            <div class="senhas-na-fila-atendimento">
                                <p class="numero--atendimento">0</p>
                                <p class="texto-info-atendimento">Senhas Ausente</p>
                            </div>
                            <div class="senhas-na-fila-atendimento">
                                <p class="numero--atendimento">0</p>
                                <p class="texto-info-atendimento">Senhas Atendidas
                        </div>
                            
                        </div>
                        </button>
                    </ul>
                    <ul class="direita-guiche-area-chamada">
                        <div class="area-botao--guiche-area-chamada">
                            <div class="area-botao-atendimento">
                                <button class="botao-proxima-senha-atendimento" id="chm-senha">
                                    <a href="" class="texto-botao-atendimento">
                                        <img class="img-proxima-senha-atendimento" src="../../../public/img/icons/proxima-senha.svg" alt="ampulheta">
                                        <h4>Próxima Senha</h4>
                                    </a>
                            </button>
                            <button class="botao-encerrar-atendimento">
                                <a href="" class="texto-botao-atendimento vermelho-botao">
                                    <img class="img-encerrar-atendimento-tela" src="../../../public/img/icons/cancelar.svg" alt="ampulheta">
                                    <h4>Encerrar Atendimento</h4>
                                </a>
                            </button>
                            </div>
                            <div class="area-botao-atendimento">
                                <button class="botao-consultar-fila-atendimento abrirConsultarFila">
                                    <a href="" class="texto-botao-atendimento">
                                        <img class="img-consultar-fila-atendimento" src="../../../public/img/icons/consultar-fila.svg" alt="ampulheta">
                                        <h4>Consultar Fila</h4>
                                    </a>
                                </button>
                                <button class="botao-intervalo-atendimento" id="chm-intervalo">
                                    <a href="" class="texto-botao-atendimento">
                                        <img class="img-intervalo-atendimento" src="../../../public/img/icons/ampulheta.svg" alt="ampulheta">
                                        <h4>Intervalo</h4>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </ul>
                </nav>
                <div class="meio-guiche-area-chamada">
                    <h3>Senhas Atendidas No Dia</h3>
                    </div>
                </div>
                <div class="fundo-guiche-area-chamada">
                    <table class="tabela_atendimento-guiche-area-chamada">
                        <thead>
                            <tr>
                                <th>Ordem</th>
                                <th>Nome</th>
                                <th>Serviço</th>
                                <th>Senha</th>
                                <th>Início</th>
                                <th>Término</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>#01</td>
                            <td>Guilherme Machado</td>
                            <td>IPTU</td>
                            <td>CM002</td>
                            <td>07:30</td>
                            <td>07:46</td>
                            <td>Comum</td>
                        </tr>
                        <tr>
                            <td>#02</td>
                            <td>Juliana Barbosa</td>
                            <td>Fiscalização</td>
                            <td>CM005</td>
                            <td>07:48</td>
                            <td>08:04</td>
                            <td>Preferencial</td>
                        </tr>
                        <tr>
                            <td>#03</td>
                            <td>Gabriel Alvin</td>
                            <td>Licenças</td>
                            <td>CM008</td>
                            <td>08:08</td>
                            <td>08:29</td>
                            <td>Preferencial</td>
                        </tr>
                    <tr>
                        <td>#04</td>
                        <td>Suelen Cabral</td>
                        <td>Ouvidoria</td>
                        <td>CM014</td>
                        <td>08:32</td>
                        <td>08:58</td>
                        <td>Comum</td>
                    </tr>
                    <tr>
                        <td>#05</td>
                        <td>Fred Lopes</td>
                        <td>Concelho Municipal</td>
                        <td>CM019</td>
                        <td>09:01</td>
                        <td>09:23</td>
                        <td>Comum</td>
                    </tr>
                    <tr>
                        <td>#06</td>
                        <td>Luan Rech</td>
                        <td>Licenças</td>
                        <td>CM023</td>
                        <td>09:24</td>
                        <td>09:46</td>
                        <td>Preferencial</td>
                    </tr>
                    <tr>
                        <td>#07</td>
                        <td>João Guilherme</td>
                        <td>Licenças</td>
                        <td>CM028</td>
                        <td>09:47</td>
                        <td>09:58</td>
                        <td>Comum</td>
                    </tr>
                    <tr>
                        <td>#08</td>
                        <td>Eliandro</td>
                        <td>Ouvidoria</td>
                        <td>CM030</td>
                        <td>10:00</td>
                        <td>10:23</td>
                        <td>Comum</td>
                    </tr>
                    <tr>
                        <td>#09</td>
                        <td>Thiago Almeida</td>
                        <td>Concelho Municipal</td>
                        <td>CM034</td>
                        <td>10:24</td>
                        <td>10:37</td>
                        <td>Comum</td>
                    </tr>
                    <tr>
                        <td>#10</td>
                        <td>Lucas Sesper</td>
                        <td>Fiscalização</td>
                        <td>CM037</td>
                        <td>10:40</td>
                        <td>10:53</td>
                        <td>Preferencial</td>
                    </tr>
                    </table>
                </div>
            </nav>            
        </div>
        <!-- FIM DA ÁREA ÚTIL DA PÁGINA -->
    </section> 
    <main-tela-de-login></main-tela-de-login>
    <main-proxima-senha></main-proxima-senha>

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

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>