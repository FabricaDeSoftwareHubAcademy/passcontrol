<?php
require '../classes/Servico.php';

$novo_servico = new Servico();
$servicos_cadastrados = $novo_servico->buscar();

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
                            <th class="indentificador-menor"  class="cabecalho-tabela2">Nome do Serviço</th>
                            <th class="editar-menor"  class="cabecalho-tabela3">Editar</th>
                            <th class="inativar-menor"  class="cabecalho-tabela1">Status</th>
                        </tr>
                    </thead>
                    <tbody class="resto-tabela-Ponto-atendimento">
                        <?php foreach($servicos_cadastrados as $servico): ?>
                            <?php $classeStatus = ($servico->status_servico == 1) ? 'active' : ''; ?>
                            <tr>
                                <td><?= $servico->nome_servico ?></td>
                                <td class="indentificador-menor"><?= $servico->codigo_servico ?></td>
                                <td class="editar-menor">
                                    <div class="editar">
                                        <button class="bot-editar chamamodal" id_value="<?= $servico->id_servico ?>" data-btn-modal="editar-servico">
                                            <img id="icone-editar" src="../../public/img/icons/editar.png" alt="Editar">
                                        </button>
                                    </div>
                                </td>
                                <td class="inativar-menor">
                                    <button class="switch_status toggle-btn <?= $classeStatus ?>" 
                                            id_value_switch="<?= $servico->id_servico ?>" 
                                            data-btn-modal="status-servico">
                                        <div class="circulo"></div>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- </div> <button id="" id_value_switch="1"  class="switch_status toggle-btn '.$estadoAtivo.'" data-btn-modal="status-servico"></button> -->
        <div class="botoesVoltar-Cadastrar">
            <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
            <!-- <button type="button" id="abrirModal" class="botao-cadastro">Cadastrar</button> -->
            <button type="button" id="btn_cadastrar_servico" class="botao-cadastro" data-btn-modal="cadastrar">Cadastrar</button>

        <?php
            include_once "./monitor_modal.php";
            include_once "../../public/modais/modal_cadastro_servico.php";
            include_once "../../public/modais/modal_confirmacao_dados_servicos.php";
            include_once "../../public/modais/modal_edicao_servico.php";
            include_once "../../public/modais/modal_confirmacao_edicao_servico.php";
            include_once "../../public/modais/modal_satus_servico.php";
            include_once "../../public/modais/modal_sucesso.php";
        ?>
</section>

</body>

<!-- '.$servico->id_servico.' -->