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

    <!-- ICON LIBR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../public/css/atendimento_do_dia.css">
    <!-- <link rel="stylesheet" href="../../public/css/style_atendimento_tempo_real.css"> -->
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    
    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../../public/js/buscar_dados_atendimento.js" defer></script>
    <script src="../../public/js/modal_orientacao_atendimento.js" defer></script>
    
    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    
    ?>

    <section class="Area-Util-Projeto atendimento-dia">
        <!-- SUBMENU ATENDIMENTO -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="../view/atendimento_do_dia.php" class="active">Guichês</a>
                <a href="../view/atendimento.php">Atendimento</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="../view/atendimento_do_dia.php" class="active">Guichês</a>
                <a href="../view/atendimento.php">Atendimento</a>
            </div>
        </div>

        <!-- ACOMPANHAMENTO EM TEMPO REAL -->
        <div class="area-atendimento-do-dia">
            <div class="cabecario-atendimento-dia">
                <div class="container-atendimento-do-dia">
                    <h1 class="title-atendimento-do-dia title-atendimento-tempo-real-bt">Atendimento do Dia</h1>
                    <!-- <h1 class="title-atendimento-tempo-real">Senhas na Fila: 000</h1> -->
                </div>
                <div class="area-botao-reloading">
                    <button class="reloading_atendimento_do_dia">
                        <img class="icone_atendimento_do_dia" src="../../public/img/icons/reloading_do_dia.png">
                        <span>Atualizar</span>
                    </button>
                </div>
            </div>
            <span class="line-atendimento-do-dia"></span>
            <div class="container-tabela-atendimento-do-dia">
                <table class="table-atendimento-do-dia">
                    <thead>
                        <tr>
                            <th>Atendente</th>
                            <th>Perfil</th>
                            <th>Serviços</th>
                            <th>Guichê</th>
                            <th class="status-atendimento-do-dia">
                                <div class="status-flex-atendimento-do-dia">
                                    Status <span class="circle-atendimento-do-dia open-status-atendimento"><i class="fa-solid fa-question"></i></span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paula Fernanda de Pauli</td>
                            <td>atendente</td>
                            <td>IPTU</td>
                            <td>03</td>
                            <td class="disponivel-atendimento-do-dia">Disponível</td>
                        </tr>
                        
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>atendente</td>
                            <td>IPTU</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-do-dia">Intervalo</td>
                        </tr>
                        <tr>
                            <td>João Silva</td>
                            <td>atendente</td>
                            <td>Serviços Públicos</td>
                            <td>04</td>
                            <td class="em-atendimento-atendimento-do-dia">Em Atendimento</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
    include "./monitor_modal.php";
    include "../../public/modais/modal_orientacao_atendimento.php";
    ?>
    
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>