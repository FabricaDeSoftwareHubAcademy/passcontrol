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
    <link rel="stylesheet" href="../../../public/css/tela_autoatendimentoPage3.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <header class="head">
        <nav class="nav-head">
            <div class="logo-control">
                <img src="../../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo">
            </div>
            <H3>PassControl</H3>
    </header>

    <div class="border-line"></div>

    <main class="workspace">

        <div class="area-cinza">

            <h4 class="page-title">
                Informe seus dados para atendimento:
            </h4>


            <div class="box-inputs">
                <div class="input-group">
                    <h3 for="nome">Nome*</h3>
                    <br>
                    <input type="text" class="input-infos" id="nome" name="nome" placeholder="Nome">
                </div>
                <div class="input-group">
                    <h3 for="sobrenome">Sobrenome*</h3>
                    <br>
                    <input type="text" class="input-infos" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
                </div>
                <div class="input-group">
                    <h3 for="telefone">Telefone</h3>
                    <br>
                    <input type="text" class="input-infos" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                </div>
                <div class="input-group">
                    <div class="information">
                        * A SENHA NÃO SERÁ IMPRESSA <br><br>
                        * INSIRA SEU NÚMERO DE TELEFONE PARA RECEBER AS INFORMAÇÕES DO SEU ATENDIMENTO VIA SMS
                    </div>
                </div>

            </div>


            <div class="footer">
                <button class="button">
                    <a href="../../usuario/view/tela_autoatendimentoPage2.php" class="btn-voltar">VOLTAR</a>
                </button>
                <button class="button">
                    <a href="../../usuario/view/tela_autoatendimentoPage4.php" class="btn-confirmar">CONFIRMAR</a>
                </button>
            </div>

        </div>

        </div>
        </div>
    </main>
</body>
</html>