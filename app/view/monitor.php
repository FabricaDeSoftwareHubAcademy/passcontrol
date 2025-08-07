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
                <div class="caixa-das-senhas">
                    <h2>NOME SENHA</h2>
                    <div class="conjunto-senhas">
                        <div class="senha">
                            <h3>SENHA:</h3>
                            <h4>prioridade - numero</h4>
                        </div><br>
                        <div class="guiche">
                            <h3>GUICHÊ:</h3>
                            <h4>nome guiche</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fundo-senha-principal">
            <div class="fundo-senha-principal-wrap">
                <div class="nome-pessoa">
                    <h1>Nome</h1>
                </div>
                <div class="infos-senha-principal">
                    <li>
                        <h2>SENHA:</h2>
                        <span>prioridade - numero</span>
                    </li>
                    <li>
                        <h2>GUICHÊ:</h2>
                        <span>nome guiche</span>
                    </li>
                </div>
                <div class="nome-servico">
                    <li>
                        <h2>SERVIÇO:</h2>
                        <span>nome servico</span>
                    </li>
                </div>
            </div>
        </div>
    </section>
</body>

</html>