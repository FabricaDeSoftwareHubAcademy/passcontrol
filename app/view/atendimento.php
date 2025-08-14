<?php
require_once '../classes/PontoAtendimento.php';

$guiche = new Ponto_Atendimento();
$guiches = $guiche->buscar(null, " status_ponto_atendimento DESC");

$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;

include_once 'navegacao.php';
?>

<!-- JS Local -->
<script src="../../public/js/modal_teladelogin.js" defer></script>
<script src="../../public/js/insere_dados_atendimento_atual.js" defer></script>
<script src="../../public/js/modal_proxima_senha.js" defer></script>
<script src="../../public/js/consultar_fila_modal.js" defer></script>
<script src="../../public/js/modal_chamar_prox_senha.js" defer></script>
<script src="../../public/js/controle_botoes_atendimento.js" defer></script>
<script src="../../public/js/modal_iniciar_intervalo.js" defer></script>
<script src="../../public/js/modal_encerrar_atendimento.js" defer></script>
<!-- <script src="../../public/js/modal_ler_prox_senha.js" defer></script> -->
<script src="../../public/js/modal_intervalo_retornar.js" defer></script>
<script src="../../public/js/senhas_atendidas.js" defer></script>
<script src="../js/modal_selecao_guiche_inicial.js"></script>

<body class="control-body-navegacao">

    <section class="Area-Util-Projeto tela-atendimento">
        <?php
        include_once "../../public/modais/modal_selecao_guiche.php";
        ?>

        <!-- SUBMENU ATENDIMENTO -->
        <div class="sub-menu-container-control">
            <div class="sub-menu-control">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <?php if ($id_perfil != 7): ?>
                    <a href="../view/atendimento_do_dia.php">Guichês</a>
                <?php endif; ?>
                <a href="../view/atendimento.php" class="active">Atendimento</a>
            </div>
            <div class="sub-menu-mobile-control" id="mobileMenu">
                <?php if ($id_perfil != 7): ?>
                    <a href="../view/atendimento_do_dia.php">Guichês</a>
                <?php endif; ?>
                <a href="../view/atendimento.php" class="active">Atendimento</a>
            </div>
        </div>
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <div class="area-chamada-atendimento">
            <nav class="topo-area-chamada">
                <ul class="esquerda-area-chamada">
                    <div class="atendimento-atual-atendimento">
                        <div class="informacoes-area-chamada">
                            <p class="titulo-informacoes-area-chamada">Atendimento em Andamento:</p>
                            <span class="nome-area-chamada">
                                Nome:
                                <span class="dado-area-chamada-atual" id="nome-atendido-atual">...</span>
                            </span>
                            <!-- <div class="info-area-chamada"> -->
                            <span class="senha-area-chamada">
                                Senha:
                                <span class="dado-area-chamada-atual" id="senha-atendido-atual">...</span>
                                <!-- <p></p> -->
                            </span>
                            <span class="servico-area-chamada">
                                Serviço:
                                <span class="dado-area-chamada-atual" id="servico-atendido-atual">...</span>
                                <!-- <p></p> -->
                            </span>
                            <!-- </div> -->
                        </div>
                        <div class="numero-guiche-atendimento">
                            <p id="guiche-exibir" class="numero--atendimento">...</p>
                            <!-- <p class="texto-info-atendimento">Guichê</p> -->
                        </div>
                    </div>
                    <div class="info-atendimento-inicio">
                        <div class="senhas-na-fila-atendimento-vermelho">
                            <p class="numero--atendimento senhas-vermelhas" id="contador_fila">0</p>
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

                            <button class="botao-proxima-senha-atendimento abrirChamarProxSenha" id="chamar-proxima-senha">
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
            <div class="fundo-guiche-area-chamada">
                <table class="tabela_atendimento-guiche-area-chamada">

                    <thead class="thead-atendimento">
                        
                        <tr>
                            <th>Ordem</th>
                            <th>Nome</th>
                            <th>Serviço</th>
                            <th>Senha</th>
                            <th>Início</th>
                            <th>Término</th>
                            <th>Prioridade</th>
                        </tr>
                    </thead>

                    <tbody class="tbody-atendimento" id="lista-senhas-atendidas-no-dia">

                    <!-- Dados serão inseridos via JS -->

                    </tbody>

                   
                </table>
            </div>
        </div>
        <?php
        include_once "../../public/modais/modal_selecao_guiche.php";
        ?>
    </section>

    <?php
    include_once "./monitor_modal.php";
    include_once "../../public/modais/modal_consultar_fila.php";
    include_once "../../public/modais/modal_chamar_prox_senha.php";
    include_once "../../public/modais/modal_iniciar_intervalo.php";
    include_once "../../public/modais/modal_encerrar_atendimento.php";
    include_once "../../public/modais/modal_intervalo_retornar.php";
    ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>


</body>

</html>