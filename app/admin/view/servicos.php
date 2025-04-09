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
    <link rel="stylesheet" href="../../../public/css/servicos.css">
    <link rel="stylesheet" href="../../../public/modais/ModalCadastrodosServicos/cadastro_servicos.css">
    <link rel="stylesheet" href="../../../public/modais/ModalInativacaoServico/inativacao_servico.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <script src="../../../public/modais/ModalCadastrodosServicos/cadastro_servicos.js" defer></script>
    <script src="../../../public/js/TesteInativar.js" defer></script>


    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";

    include "../../../public/modais/ModalCadastrodosServicos/cadastro_servicos.php";

    include "../../../public/modais/ModalInativacaoServico/inativacao_servico.php";

    include "../../../public/modais/ModalAtivacaoServico/ativacao_servico.php";

    include '../../../public/modais/ModalCadastrodosServicos/confirmacao_dados_registrados.php'; 

    include '../../../public/modais/ModalCadastrodosServicos/confirmacao_dados.php'; 
    
    ?>
    <section class="Area-Util-Projeto">
        <div id="servico">
            <div class="topo-tela-servico">
                <div class="campo-busca">
                    <input id="buscar-servico" type="text" placeholder="Buscar Registro">
                </div>
                <div class="sev"><p id="servicos-cadastrados">Serviços Cadastrados</p></div>
                <div class="linha-divisoria-servico"></div>
            </div>
            
            <div id="tela-branca-servico">
                <div class="tabela-responsiva-servico">
                    <?php
                    require_once '../../model/Servico.php';

                    $servico = new Servico();
                    $servicos = $servico->buscar();


                    ?>

                    <table class="tabela-servicos">
                        <thead class="cabecaTabelaServicos">
                            <tr class="topo-tabela-servicos">
                                <th class="cabecalho-tabela1">Código do Serviço</th>
                                <th class="cabecalho-tabela2">Serviços</th>
                                <th class="cabecalho-tabela3">Editar</th>
                                <th class="cabecalho-tabela1">Ativar/ Desativar</th>
                            </tr>
                        </thead>
                        <tbody class="resto-tabela-servicos">
                        <?php foreach ($servicos as $serv) :?>
                        <?php $estadoAtivo = ($serv->ativo == 'ATIVO') ? 'active' : ''; ?>
                        <tr class="linha-tabela">
                            <td><?= $serv->codigo_servico ?></td>
                            <td><?= $serv->nome_servico ?></td>
                            <td class="colm-idit">
                            <img 
                                class="icone-editar" 
                                src="../../../public/img/icons/Group 2924.png" 
                                alt="Editar"
                                data-id="<?= $serv->id_servico ?>"
                                data-codigo="<?= $serv->codigo_servico ?>"
                                data-nome="<?= $serv->nome_servico ?>"
                                onclick="abrirModalEdicao(this)">
                            </td>
                            <td>
                                <a href="#" class="openInativarAtivar" data-id="<?= $serv->id_servico ?>">
                                    <div class="toggle-btn <?= $estadoAtivo; ?>">
                                        <div class="circulo"></div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="botoesVoltar-Cadastrar">
                <button type="button" class="botao-voltar " onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
                <button type="submit" class="botao-cadastro" id="abrirModalCadastro">Cadastrar</button>
            </div>
        </div>
    </section>


    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>
