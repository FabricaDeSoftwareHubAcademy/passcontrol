<?php
require_once './navegacao.php';
?>

<!-- JS -->
<script src="../js/ponto_atendimento_cadastrar.js" defer></script>
<script src="../js/servico_cadastrar.js" defer></script>

<body class="control-body-navegacao">
    <section class="Area-Util-Projeto">
        <?php
        include_once "./submenu_gestao.php";
        ?>

        <main class="area-cards">
            <div class="container_menu">
                <div class="wrapper">
                    <a href="ponto_atendimento.php">
                        <div class="banner-img">
                            <img src="../../public/img/img-menu/pontodeatendimento.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='ponto_atendimento.php';">Listar Ponto de Atendimento</button>
                </div>
            </div>

            <div id="btn_cadastrar_adm" class="container_menu">
                <div class="wrapper">
                    <div class="banner-img">
                        <img src="../../public/img/img-menu/listar-giche.png" alt="">
                    </div>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline">Cadastrar Ponto de Atendimento</button>
                </div>
            </div>

            <div class="container_menu">
                <div class="wrapper">
                    <a href="servicos.php">
                        <div class="banner-img">
                            <img src="../../public/img/img-menu/listar-sevico.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='servicos.php';">Listar de Serviços</button>
                </div>
            </div>

            <div class="container_menu" id="btn_cadastrar_servico">
                <div class="wrapper">
                    <div class="banner-img">
                        <img src="../../public/img/img-menu/serviços.png" alt="">
                    </div>
                </div>
                <div class="button-wrapper">
                    <button id="btn_cadastrar_servico" class="btn outline">Cadastrar Serviços</button>
                </div>
            </div>
        </main>
        </div>
    </section>

    <?php
    include_once "./monitor_modal.php";
    include_once "../../public/modais/modal_cadastro_servico.php";
    include_once "../../public/modais/modal_cadastro_ponto_atendimento.php";
    include_once "../../public/modais/modal_confirmacao_dados_registrados.php";
    include_once "../../public/modais/modal_confirmacao_dados.php";
    include_once "../../public/modais/modal_aviso_erro.php";
    ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>

</body>

</html>