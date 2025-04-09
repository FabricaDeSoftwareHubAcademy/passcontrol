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
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/menu_eli.css">
    <link rel="stylesheet" href="../../../public/css/atendimento_tempo_real.css">
    <link rel="stylesheet" href="../../../public/css/style_atendimento_tempo_real.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- SUBMENU ATENDIMENTO -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="../../../app/admin/view/atendimento_tempo_real.php" class="active">Guichês</a>
                <a href="../../../app/admin/view/atendimento.php">Atendimento</a>
            </div>
            <div class="menu-mobile" id="mobileMenu">
                <a href="../../../app/admin/view/atendimento_tempo_real.php" class="active">Guichês</a>
                <a href="../../../app/admin/view/atendimento.php">Atendimento</a>
            </div>
        </div>

        <!-- ACOMPANHAMENTO EM TEMPO REAL -->
        <div class="area-atendimento-tempo-real">
            <div class="container-atendimento-tempo-real">
                <h1 class="title-atendimento-tempo-real title-atendimento-tempo-real-bt">Atendimento em Tempo Real</h1>
                <h1 class="title-atendimento-tempo-real">Senhas na Fila: 000</h1>
            </div>
            <div class="line-atendimento-tempo-real"></div>
            <div class="container-atendimento-tempo-real">
                <table class="table-atendimento-tempo-real">
                    <thead>
                        <tr>
                            <th>Perfil</th>
                            <th>Serviço</th>
                            <th>Senha</th>
                            <th>Guichê</th>
                            <th class="status-atendimento-tempo-real">
                                <div class="status-flex-atendimento-tempo-real">
                                    Status <span class="circle-atendimento-tempo-real"><i class="fa-solid fa-question"></i></span>
                                </div>
                            </th>
                            <th>Duração do Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paula Fernanda de Pauli</td>
                            <td>IPTU</td>
                            <td>CM 026</td>
                            <td>03</td>
                            <td class="disponivel-atendimento-tempo-real">Disponível</td>
                            <td>20 MINUTOS E 15 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>João Silva</td>
                            <td>Serviços Públicos</td>
                            <td>CM 027</td>
                            <td>04</td>
                            <td class="em-atendimento-atendimento-tempo-real">Em Atendimento</td>
                            <td>17 MINUTOS E 35 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr><tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr><tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>

                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr><tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr><tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 028</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                        <tr>
                            <td>Mario Oliveira</td>
                            <td>IPTU</td>
                            <td>CM 030</td>
                            <td>05</td>
                            <td class="intervalo-atendimento-tempo-real">Intervalo</td>
                            <td>04 MINUTOS E 55 SEGUNDOS</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
    include "./monitor-modal.php";
    ?>
    
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>