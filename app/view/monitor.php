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
    <link rel="stylesheet" href="../../public/css/monitor_senhas.css">

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/favicon.ico">

    <!-- JS -->
    <script src="../js/monitor.js" defer></script>
</head>

<body>
    <section class="fundo-de-tudo">
        <div class="fundo-azul-lateral">
            <h1>Últimas<br>Chamadas</h1>
            <div class="area-das-senhas">
                Aguardando Chamadas...
            </div>
        </div>

        <div class="fundo-senha-principal">
            <div class="fundo-senha-principal-wrap">
                <div class="nome-pessoa">
                    <h1 id="nome_senha_principal">...</h1>
                </div>
                <div class="infos-senha-principal">
                    <li>
                        <h2>SENHA:</h2>
                        <span id="senha_principal">...</span>
                    </li>
                    <li>
                        <h2>Ponto de Atendimento:</h2>
                        <span id="guiche_senha_principal">...</span>
                    </li>
                </div>
                <div class="nome-servico">
                    <li>
                        <h2>SERVIÇO:</h2>
                        <span id="servico_senha_principal">...</span>
                    </li>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/leitorSenhas.js"></script>
 
    <script src="../js/monitor.js"></script>
</body>

</html>