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
    <link rel="stylesheet" href="../../../public/css/tabela.css">
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
            

            <div class="area-tabela">
                <div class="sub-area-tabela">
                <?php
                    require_once '../../model/Servico.php';

                    $servico = new Servico();
                    $servicos = $servico->buscar();


                    ?>
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th scope="col">Código do Serviço</th>
                                <th scope="col">Serviços</th>
                                <th class="editar-inativar-menor" scope="col">Editar</th>
                                <th class="editar-inativar-menor" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($servicos as $serv) :?>
                        <?php $estadoAtivo = ($serv->ativo == 'ATIVO') ? 'active' : ''; ?>
                            <tr>
                                <td><?= $serv->codigo_servico ?></td>
                                <td><?= $serv->nome_servico ?></td>
                                <td class="editar-inativar-menor" scope="col">
                                    <div class="editar">
                                            <img src="../../../public/img/icons/Group 2924.png" alt="" 
                                            data-id="<?= $serv->id_servico ?>"
                                            data-codigo="<?= $serv->codigo_servico ?>"
                                            data-nome="<?= $serv->nome_servico ?>"
                                            onclick="abrirModalEdicao(this)">
                                    </div>
                                </td>
                                <td class="editar-inativar-menor" scope="col">
                                    <div class="openInativarAtivar" data-id="<?= $serv->id_servico ?>">
                                        <button class="toggle-btn <?= $estadoAtivo; ?>">
                                            <div class="circulo"> </div>
                                        </button>
                                    </div>
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
