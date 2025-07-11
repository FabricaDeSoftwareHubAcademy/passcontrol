<?php
    require '../classes/Servico.php';

    $novo_servico = new Servico();
    $servicos_cadastrados = $novo_servico->buscar(null, " status_servico DESC ");

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

    <link rel="stylesheet" href="../../public/css/tabela_teste.css">

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">

        <div class="fundo-area-tabela-ponto-atendimento">
            <table class="tabela-ponto-atendimento">
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