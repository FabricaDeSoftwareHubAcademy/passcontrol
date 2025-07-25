<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page2.css">

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <header class="head-tela-autoatendimento-pag2">
        <nav class="nav-head-tela-autoatendimento-pag2">
            <div class="logo-control-tela-autoatendimento-pag2">
                <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL" id="img-logo">
            </div>
            <h3>PassControl</h3>
        </nav>
    </header>

    <div class="border-line-tela-autoatendimento-pag2"></div>

    <main class="workspace-tela-autoatendimento-pag2">
        <div class="area-cinza-tela-autoatendimento-pag2">
            <h4 class="page-title-tela-autoatendimento-pag2">Selecione o tipo de atendimento:</h4>

            <div class="box-area-tela-autoatendimento-pag2">

                <a href="#" class="box" data-prioridade="0">
                    <img class="imagem-servico" src="../../public/img/icons/comum_img.svg" alt="Servico">
                    <h4>COMUM</h4>
                </a>

                <a href="#" class="box" data-prioridade="1">
                    <div class="imagem-servico-container">
                        <img class="imagem-servico" src="../../public/img/icons/idoso_pref.svg" alt="Idoso">
                        <img class="imagem-servico" src="../../public/img/icons/gestante_pref.svg" alt="Gestante">
                        <img class="imagem-servico" src="../../public/img/icons/colo_pref.svg" alt="Colo de bebê">
                        <img class="imagem-servico" src="../../public/img/icons/especial_pref.svg" alt="Deficiência">
                    </div>
                    <h4>PREFERENCIAL</h4>
                </a>

            </div>

            <div class="footer-tela-autoatendimento-pag2">
                <button class="button-tela-autoatendimento-pag2">
                    <a href="./tela_autoatendimento_page1.php" class="btn-text">VOLTAR</a>
                </button>
            </div>
        </div>
    </main>

    <script src="../../public/js/tela_autoatendimento_page2.js"></script>
</body>
</html>