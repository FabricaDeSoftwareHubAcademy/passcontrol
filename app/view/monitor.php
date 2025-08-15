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
            <h1 class="titulo-azul-lateral">Últimas Chamadas</h1>
            <div class="area-das-senhas">
                Aguardando Chamadas...
            </div>
        </div>

        <div class="fundo-senha-principal">
            <div class="fundo-senha-principal-wrap">
                <div class="infos-senha-principal">
                    <h1 id="nome_senha_principal">...</h1>
                    <li>
                        <h2 class="info-senha-principal">SENHA:</h2>
                        <span class="dados-senha-principal" id="senha_principal">...</span>
                    </li>
                    <li>
                        <h2 class="info-senha-principal">PONTO DE ATENDIMENTO:</h2>
                        <span class="dados-senha-principal" id="guiche_senha_principal">...</span>
                    </li>
                    <li>
                        <h2 class="info-senha-principal">SERVIÇO:</h2>
                        <span class="dados-senha-principal" id="servico_senha_principal">...</span>
                    </li>
                </div>
            </div>
        </div>
    </section>
    <script>
function atualizarMonitor() {
    fetch('../../app/actions/get_chamadas.php')
        .then(res => res.json())
        .then(data => {
            if (data.principal) {
                document.getElementById('nome_senha_principal').textContent = data.principal.nome;
                document.getElementById('senha_principal').textContent = data.principal.senha;
                document.getElementById('guiche_senha_principal').textContent = data.principal.guiche;
                document.getElementById('servico_senha_principal').textContent = data.principal.servico;
            }

            const ultimasDiv = document.querySelector('.area-das-senhas');
            ultimasDiv.innerHTML = '';
            data.ultimas.forEach(s => {
                const div = document.createElement('div');
                div.classList.add('caixa-das-senhas');
                div.innerHTML = `<h2>${s.nome}</h2>
                                 <div class="conjunto-senhas">
                                     <div class="senha"><h3>SENHA</h3><h4>${s.senha}</h4></div>
                                     <div class="guiche"><h5>GUICHÊ</h5><h6>${s.guiche}</h6></div>
                                 </div>`;
                ultimasDiv.appendChild(div);
            });
        })
        .catch(err => console.error(err));
}

// Atualiza a cada 2 segundos
setInterval(atualizarMonitor, 2000);
atualizarMonitor();
</script>

</body>

</html>