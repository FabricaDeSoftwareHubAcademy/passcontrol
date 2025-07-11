<?php
require '../classes/PontoAtendimento.php';

$guiche = new Ponto_Atendimento();
$guiches = $guiche->buscar(null, " status_ponto_atendimento DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- IMPORT DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/ponto_atendimento.css">
    <!-- <link rel="stylesheet" href="../../public/css/servico.css"> -->
    <!-- <link rel="stylesheet" href="../../public/modais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/alterar_senha.css"> -->
    <link rel="stylesheet" href="../../public/css/modal_cadastro_ponto_atendimento.css">
    <link rel="stylesheet" href="../../public/css/modal_edicao_ponto_atendimento.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_status.css">

    <!-- IMPORT DO JS -->
    <script src="../../public/js/modal_edicao_ponto_atendimento.js" defer></script>
    <script src="../js/ponto_atendimento_cadastrar.js" defer></script>
    <script src="../js/ponto_atendimento_status.js" defer></script>
    <script src="../../app/js/barra_pesquisa_ponto_atendimento.js" defer></script>
    <!-- <script src="../../public/js/modal_confirmacao_dados.js" defer></script> -->
    <!-- <script src="../../public/js/modal_status_ponto_atendimento.js"></script> -->

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- <div id="PontoAtendimentoCad"> -->
        <div class="topo-tela-PontoAtendimentoCad">
            <div class="sev">
                <p id="Ponto-atendimento">Ponto de Atendimento</p>
                <div class="campo-busca">
                    <input id="buscar" type="text" placeholder="Buscar Registro">
                </div>

            </div>
            <span class="linha-divisoria"></span>
        </div>

        <div class="fundo-area-tabela">
            <table class="tabela">
                <thead>
                    <tr>
                        <th class="tipo-ponto-atendimento">Tipo</th>
                        <th class="identificador-ponto-atendimento">Identificador</th>
                        <th class="alterar-status-editar-ponto-atendimento">Editar</th>
                        <th class="alterar-status-editar-ponto-atendimento">Status</th>
                    </tr>
                </thead>
                <tbody class="tbody-atendimento">
                    <?php
                    foreach ($guiches as $guiche) {
                        $estadoAtivo = ($guiche->status_ponto_atendimento == 1) ? 'active' : '';
                        echo '
                            <tr>
                                <td class="tipo-ponto-atendimento">' . $guiche->nome_ponto_atendimento . '</td>
                                <td class="identificador-ponto-atendimento">' . $guiche->identificador_ponto_atendimento . '</td>
                                <td class="alterar-status-editar-ponto-atendimento">
                                    <div class="status-editar-center">
                                        <button class="bot-editar" data-id="' . $guiche->id_ponto_atendimento . '">
                                            <img id="icone-editar" src="../../public/img/icons/editar.png" alt="Editar">
                                        </button>
                                    </div>
                                </td>
                                <td class="alterar-status-editar-ponto-atendimento">
                                    
                                        <button id="switch_status" id_value_switch="' . $guiche->id_ponto_atendimento . '"  class="switch_status toggle-btn ' . $estadoAtivo . '">
                                        <div class="circulo"></div>
                                        </button>
                                    </div>
                                </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="botoesVoltar-Cadastrar">
            <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
            <button type="button" id="btn_cadastrar_adm" class="botao-cadastro">Cadastrar</button>
        </div>

    </section>

    <?php
    include_once "./monitor_modal.php";
    include_once "../../public/modais/modal_edicao_ponto_atendimento.php";
    include_once "../../public/modais/modal_cadastro_ponto_atendimento.php";
    include_once "../../public/modais/modal_confirmacao_dados_registrados.php";
    include_once "../../public/modais/modal_confirmacao_dados.php";
    include_once "../../public/modais/modal_alterar_status.php"
    // include_once "../../public/modais/modal_status_ponto_atendimento.php";
    // include_once "../../public/modais/modal_cadastro_ponto_atendimento.php";
    // include_once "../../public/modais/modal_alterar_status_ponto_atendimento.php";
    ?>

</body>

</html>