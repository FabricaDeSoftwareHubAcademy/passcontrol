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
    <link rel="stylesheet" href="../../public/css/monitor_modal.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">


    <link rel="stylesheet" href="../../public/css/servico.css">
    <link rel="stylesheet" href="../../public/css/modal_cadastro_servico.css">
    <link rel="stylesheet" href="../../public/css/modal_edicao_servico.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
    <link rel="stylesheet" href="../../public/css/modal_aviso_erro.css">

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../../app/js/barra_pesquisa_ponto_atendimento.js" defer></script>
    <script src="../js/servico_cadastrar.js" defer></script>
    <script src="../js/servico_editar.js" defer></script>
    <script src="../js/servico_alterar_status.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <?php
    require_once '../classes/Servico.php';

    $novo_servico = new Servico();
    $servicos_cadastrados = $novo_servico->buscar(null, " status_servico DESC ");

    include_once "./navegacao.php";
    // include_once "../actions/servico_listar.php";
    ?>

    <section class="Area-Util-Projeto lista_serviço">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- <div id="PontoAtendimentoCad"> -->
            <div class="topo-tela-PontoAtendimentoCad">
                <div class="titulo-area"><p id="Ponto-atendimento">Serviços</p>
                    <div class="campo-busca">
                        <input id="buscar" type="text" placeholder="Buscar Registro">
                    </div>
                </div>
            </div>
            <div class="linha-in"></div>
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
                            foreach ($servicos_cadastrados as $servico): ?>
                                <?php $classeStatus = ($servico->status_servico == 1) ? 'active' : ''; ?>
                                <tr>
                                    <td class="tipo-ponto-atendimento"><?= $servico->codigo_servico ?></td>
                                    <td class="identificador-ponto-atendimento"><?= $servico->nome_servico ?></td>
                                    <td class="alterar-status-editar-ponto-atendimento">
                                        <div class="status-editar-center">
                                            <button class="bot-editar chamamodal" id_value="<?= $servico->id_servico ?>"
                                                data-btn-modal="editar-servico">
                                                <img id="icone-editar" src="../../public/img/icons/editar.png" alt="Editar">
                                            </button>
                                        </div>
                                    </td>
                                    <td class="alterar-status-editar-ponto-atendimento">
                                        <button class="switch_status toggle-btn <?= $classeStatus ?>"
                                            id_value_switch="<?= $servico->id_servico ?>" data-btn-modal="status-servico">
                                            <div class="circulo"></div>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
            </table>
                </div>
            <!-- </div> <button id="" id_value_switch="1"  class="switch_status toggle-btn '.$estadoAtivo.'" data-btn-modal="status-servico"></button> -->
            <div class="botoesVoltar-Cadastrar">
                <button type="button" class="botao-voltar" onclick="location.href = document.referrer">Voltar</button>
                <!-- <button type="button" id="abrirModal" class="botao-cadastro">Cadastrar</button> -->
                <button type="button" id="btn_cadastrar_servico" class="botao-cadastro"
                    data-btn-modal="cadastrar">Cadastrar</button>
            </div>
    </section>
    <?php
    // include_once "./monitor_modal.php";
    include_once "../../public/modais/modal_cadastro_servico.php";
    include_once "../../public/modais/modal_edicao_servico.php";
    include_once "../../public/modais/modal_confirmacao_dados_registrados.php";
    include_once "../../public/modais/modal_confirmacao_dados.php";
    include_once "../../public/modais/modal_aviso_erro.php";
    ?>
</body>

</html>