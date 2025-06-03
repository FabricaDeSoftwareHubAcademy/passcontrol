<?php
require '../classes/Servico.php';

$novo_servico = new Servico();
$servicos_cadastrados = $novo_servico->buscar();
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/monitor_modal.css">
    <link rel="stylesheet" href="../../public/css/cadastro_usuario.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">

    <link rel="stylesheet" href="../../public/css/servico.css">
    <link rel="stylesheet" href="../../public/css/modal_cadastro_servico.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_servico.css">

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>

    <script src="../../js/modal_cadastro_confirmacao_servico.js" defer></script>
    <script src="../../js/modal_edicao_confirmar_servico.js" defer></script>
    <script src="../../js/modal_inativacao_servicos.js" defer></script>
   


    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    include "../actions/servico_listar.php";
    include "../actions/servico_editar.php";
    ?>

<section class="Area-Util-Projeto">
    <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
    <div id="PontoAtendimentoCad">
        <div class="topo-tela-PontoAtendimentoCad">
            <div class="campo-busca">
                <input id="buscar-Ponto-atendimento" type="text" placeholder="Buscar Registro">
            </div>
            <div class="sev"><p id="Ponto-atendimento">Serviços</p></div>
            <div class="linha-divisoria-Ponto-atendimento"></div>
        </div>
        <div id="tela-branca-Ponto-atendimento"> 
            <div class="tabela-responsiva-Ponto-atendimento">
                <table id="table table-striped" class="tabela-Ponto-atendimento">
                    <thead class="cabecaTabelaPonto-atendimento">
                        <tr class="topo-tabela-servicos">
                            <th  class="cabecalho-tabela1">Código</th>
                            <th class="indentificador-menor"  class="cabecalho-tabela2">Serviço</th>
                            <th class="editar-menor"  class="cabecalho-tabela3">Editar</th>
                            <th class="inativar-menor"  class="cabecalho-tabela1">Status</th>
                        </tr>
                    </thead>
                    <tbody class="resto-tabela-Ponto-atendimento">
                            <?php
                                foreach($servicos_cadastrados as $servico) {
                                    $estadoAtivo = ($servico->status_servico == 'ATIVO') ? 'active' : '';
                                    echo '
                                    <tr>
                                        <td>'.$servico->nome_servico.'</td>
                                        <td class="indentificador-menor">'.$servico->codigo_servico.'</td>
                                        <td class="editar-menor">
                                            <div class="editar">
                                                <button class="bot-editar" id="chamamodal" id_value ='.$servico->id_servico.'>
                                                    <img id="icone-editar" src="../../public/img/icons/editar.png" alt="Editar">
                                                </button>
                                            </div>
                                        </td>
                                        <td class="inativar-menor">
                                            <button id="switch_status" id_value_switch="'.$servico->id_servico.'"  class="toggle-btn '.$estadoAtivo.'">
                                                <div class="circulo"></div>
                                            </button>
                                        </td>
    
                                    </tr>';
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
        <div class="botoesVoltar-Cadastrar">
            <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
            <!-- <button type="button" id="abrirModal" class="botao-cadastro">Cadastrar</button> -->
            <button type="button" id="btn_cadastrar_servico" class="botao-cadastro">Cadastrar</button>

        <?php
        include "./monitor_modal.php";
        include "../../public/modais/modal_cadastro_servico.php";
        include "../../public/modais/modal_confirmacao_cadastro_servico.php";
        include "../../public/modais/modal_confirmacao_edicao_servico.php";
        include "../../public/modais/modal_satus_servico.php";
        ?>
</section>

</body>