<?php
    include_once '../actions/verifica_permissao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PassControl</title>

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../public/css/atendimento.css">
    <link rel="stylesheet" href="../../public/css/monitor_modal.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Consultar_Fila/modal_consultar_fila.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Chamar_prox_senha/chamar_prox_senha.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Iniciar_Intervalo/iniciar_intervalo.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Encerrar_Atendimento/encerrar-atendimento.css">

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/modal_teladelogin.js" defer></script>
    <script src="../../public/js/modal_proxima_senha.js" defer></script>
    <script src="../../public/js/modal_conf_saida.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../../public/modais/Modal_Consultar_Fila/modal_consultar_fila.js" defer></script>
    <script src="../../public/modais/Modal_Chamar_prox_senha/chamar_prox_senha.js" defer></script>
    <script src="../../public/modais/Modal_Iniciar_Intervalo/iniciar_intervalo.js" defer></script>
    <script src="../../public/modais/Modal_Encerrar_Atendimento/encerrar_atendimento.js" defer></script>
    <script src="../../public/modais/Modal_Chamar_prox_senha/ler_prox_senha.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./supervisor_session.php";
    ?>

    <section class="Area-Util-Projeto">

        <!-- SUBMENU ATENDIMENTO -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="../view/atendimento_tempo_real.php">Guichês</a>
                <a href="../view/atendimento.php" class="active">Atendimento</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="../view/atendimento_tempo_real.php">Guichês</a>
                <a href="../view/atendimento.php" class="active">Atendimento</a>
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
                            <p class="texto-info-atendimento senhas-vermelhas">Senhas na Fila</p>
                        </div>
                        <div class="senhas-na-fila-atendimento">
                            <p class="numero--atendimento">0</p>
                            <p class="texto-info-atendimento">Senhas Ausentes</p>
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
                            <button class="botao-proxima-senha-atendimento abrirChamarProxSenha">
                                <a class="texto-botao-atendimento">
                                    <img class="img-proxima-senha-atendimento" src="../../public/img/icons/proxima-senha.svg" alt="ampulheta">
                                    <h4>Próxima Senha</h4>
                                </a>
                            </button>
                            <button class="botao-encerrar-atendimento open-encerrar-atendimento">
                                <a class="texto-botao-atendimento vermelho-botao">
                                    <img class="img-encerrar-atendimento-tela" src="../../public/img/icons/cancelar.svg" alt="ampulheta">
                                    <h4>Encerrar Atendimento</h4>
                                </a>
                            </button>
                        </div>
                        <div class="area-botao-atendimento">
                            <button class="botao-consultar-fila-atendimento abrirConsultarFila">
                                <a class="texto-botao-atendimento">
                                    <img class="img-consultar-fila-atendimento" src="../../public/img/icons/consultar-fila.svg" alt="ampulheta">
                                    <h4>Consultar Fila</h4>
                                </a>
                            </button>
                            <button class="botao-intervalo-atendimento open-iniciar-intervalo">
                                <a class="texto-botao-atendimento">
                                    <img class="img-intervalo-atendimento" src="../../public/img/icons/ampulheta.svg" alt="ampulheta">
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
                    <tbody class="tbody-atendimento">
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
    </section>

    <?php
     include "./monitor_modal.php"; 
    /*include "../../public/modais/Modal_Consultar_Fila/modal_consultar_fila.php";
    include "../../public/modais/Modal_Chamar_prox_senha/chamar_prox_senha.php"; 
    include "../../public/modais/Modal_Iniciar_Intervalo/iniciar_intervalo.php";
    include "../../public/modais/Modal_Encerrar_Atendimento/encerrar-atendimento.php"; */
    ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>