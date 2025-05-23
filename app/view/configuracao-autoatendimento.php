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
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/configuracao-autoatendimento.css">
    <link rel="stylesheet" href="../../../public/css/style-configuracao-autoatendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    
    <!-- <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Dados Registrados/confirmacao_dados_registrados.css"> -->
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <script src="../../../public/js/configuracao-autoatendimento.js" defer></script>
    <script src="../../../public/js/modal-configuracao-autoatendimento.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>
    
    <section class="Area-Util-Projeto">
        <h1>Autoatendimento</h1>
        <div class="area-configuracao-autoatendimento">
            <h2>Selecione serviços do autoatendimento:</h2>
            <div class="lista-servicos-configuracao-autoatendimento">
                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="conselho-municipal">
                    <label for="conselho-municipal">Conselho Municipal</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="fiscalizacao">
                    <label for="fiscalizacao">Fiscalização</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="iluminacao-publica">
                    <label for="iluminacao-publica">Iluminação Pública</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="iptu">
                    <label for="iptu">IPTU</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="licencas">
                    <label for="licencas">Licenças</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="ouvidoria">
                    <label for="ouvidoria">Ouvidoria</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="poda-de-arvores">
                    <label for="poda-de-arvores">Poda de Árvores</label>
                </div>

                <div class="item-servico-configuracao-autoatendimento">
                    <input type="checkbox" id="selecionar-todos">
                    <label for="selecionar-todos">Selecionar Todos</label>
                </div>
            </div>
            <div class="btn-configuracao-autoatendimento">
                <button>Novo Serviço</button>
                <button>Visualizar</button>
                <button class="salvar">Salvar</button>
            </div>
        </div>
    </section>

    <?php
    include "./monitor-modal.php";
    ?>
    
</body>
</html>