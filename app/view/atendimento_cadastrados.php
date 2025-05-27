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
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/atendimentocadastrados.css">
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- JS -->
    <script src="../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../public/js/modal-atendimentocadastrados.js"></script>
    <script src="../../public/js/modal-inativacao-atendimentocadastrado.js"></script>
    <script src="../../public/js/modal-cadastro-atendimento.js"></script>
    <script src="../../public/js/monitor-modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

<section class="Area-Util-Projeto">

<div class="area-info">
    <div class="header-area">
        <div class="titulo-area">
            <span>Pontos de Atendimento</span>
        </div>
        <div class="input-search">
            <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente">
        </div>
    </div>
    <div class="linha-in">
        <span></span>
    </div>
    <div class="area-tabela">
        <div class="sub-area-tabela">
            <table class="tabela">
                <tr>
                    <th>Tipo</th>
                    <th>Identificador</th>
                    <th>Editar</th>
                    <th>Ativar/Desativar</th>
                </tr>
                <tr>
                    <td>Guichê</td>
                    <td>1</td>
                    <td>
                        <div class="editar"><a id="open_editar_dados" href="#"><img src="../../public/img/icons/Group 2924.png" alt=""></a></div>
                    </td>
                    <td>
                        <div class="ativarswitch"><label class="switch">
                                <input type="checkbox">
                                <span class="slider"></span>
                            </label></div>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
    <div class="div-botao-info">
        <button class="add-func" type="submit" onclick="window.location.href='#';">Novo Funcionario</button>
    </div>
</div>
</section>

    <?php
    include "./monitor-modal.php";
    ?>

    <script>
        // Script para alternar o estado dos botões toggle
        const toggleButtons = document.querySelectorAll('.toggle-btn');
        toggleButtons.forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
            });
        });
    </script>
</body>

</html>