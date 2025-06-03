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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page4.css"> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico"> <!-- ( Atualização de caminho ) -->
</head>

<body>
    <header class="head">
        <nav class="nav-head">
            <div class="logo-control">
                <img src="../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo"> <!-- ( Atualização de caminho ) -->
            </div>
            <H3>PassControl</H3>
    </header>

    <div class="border-line"></div>

    <main class="workspace">

        <div class="area-cinza">

            <div class="container">

                <section class="info-area">
                    <div class="fixed-text">VERIFIQUE SEU NOME E SENHA<br>AGUARDE SER CHAMADO NO PAINEL!</div>
                    <div class="variable-text">
                        <div><strong>SENHA:</strong> CM 001</div>
                        <div><strong>NOME:</strong> SUELEN</div>
                        <div><strong>SERVIÇO:</strong> IPTU</div>
                    </div>
                </section>

            </div>

            <div class="footer">
                <button class="button">
                    <a href="../../app/view/tela_autoatendimento_page1.php" class="btn-finalizar">FINALIZAR</a> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->
                </button>
            </div>

        </div>

    </main>

    <script src="../../public/js/tela_autoatendimento_page4.js"></script> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->
    <script src="../../public/js/enviarDadosFilaSenha.js"></script> <!-- ( Atualização de caminho ) -->
</body>
</html>