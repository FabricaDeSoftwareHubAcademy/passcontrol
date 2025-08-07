<?php
require_once './navegacao.php';
?>

<body class="control-body-navegacao">
    <section class="Area-Util-Projeto">
        <?php
        include_once "./submenu_gestao.php";
        ?>
        <main class="area-cards">
            <div class="container_menu">
                <div class="wrapper">
                    <a href="./tela_autoatendimento_page1.php">
                        <div class="banner-img">
                            <img src="../../public/img/Menus/TotemPassControl.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='./tela_autoatendimento_page1.php'">Visualizar Autoatendimento</button>
                </div>
            </div>
            <div class="container_menu">
                <div class="wrapper">
                    <a href="./monitor.php">
                        <div class="banner-img">
                            <img src="../../public/img/img-menu/monitor.png" alt="">
                        </div>
                    </a>
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" id="visualisarMonitor" onclick="window.location.href='./monitor.php'">Visualizar Monitor</button>
                </div>
            </div>
        </main>
        </div>
    </section>

    <?php
    include "./monitor_modal.php";
    ?>

</body>

</html>