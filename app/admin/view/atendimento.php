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
    <link rel="stylesheet" href="../../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../../public/css/atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Iniciar Intervalo/iniciar_intervalo.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação de Presença/confirmacao_presenca.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação Deslogar/confirmacao_deslogar.css">

    <!-- IMPORT DO JS -->
    <script src="../../../public/js/modal-teladelogin.js"></script>
    <script src="../../../public/js/modal-proxima-senha.js"></script>
    <script src="../../../public/js/modal_conf_saida.js"></script>
    <!-- <script src="../../../public/js/modal_saida_principal.js"></script> -->

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

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
                                    <p class="pessoa-tela-atendimento">Juliana Barbosa Martins Gomes</p>
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
    <!-- <main-sair-sistema></main-sair-sistema> -->
    <!-- <main-saida-principal></main-saida-principal> -->

    <?php
    //MONITOR MODAL
    include "../../../public/modais/Modal Consultar Fila/index.php";
    include "./monitor-modal.php";
    //MODAL CONSULTAR FILA
    ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>