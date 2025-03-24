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
    <link rel="stylesheet" href="../../../public/css/AtendentesCadastrados.css">
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Inativação Usuário/inativacao_usuario.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Ativação Usuário/ativacao_usuario.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Alterar Dados Pessoais/alterar_dados_pessoais.css">

    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <script src="../../../public/js/modal-atendentes-cadastrados.js" defer></script>
    <script src="../../../public/modais/Modal Alterar Dados Pessoais/alterar_dados_pessoais.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">

        <div class="area-info">
            <div class="header-area">
                <div class="titulo-area">
                    <span>Usuarios Cadastrados</span>
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
                            <th>Nome</th>
                            <th>Matricula</th>
                            <th>Perfil</th>
                            <th>Serviços</th>
                            <th>Editar</th>
                            <th>Ativar/Desativar</th>
                        </tr>
                        <tr>
                            <td>Guilherme F. Machado</td>
                            <td>guilermeaxe@gmail.com</td>
                            <td>Administrador</td>
                            <td>Nota Fiscal</td>
                            <td>
                                <div class="editar"><a id="open_editar_dados" href="#"><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
                            </td>
                            <td>
                                <div class="ativarswitch"><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Joao Pedro Sampaio</td>
                            <td>joaozinhodelasedeles@gmail.com</td>
                            <td>Atendente</td>
                            <td>IPTU</td>
                            <td>
                                <div class="editar"><a id="open_editar_dados" href="#"><img src="../../../public/img/icons/Group 2924.png" alt=""></a></div>
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
                <button class="add-func" type="submit" onclick="window.location.href='../../../app/admin/view/telacadastro.php';">Novo Funcionario</button>
            </div>
        </div>
    </section>
    <!-- <main-atendentes-cadastrados></main-atendentes-cadastrados> -->

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";

    include '../../../public/modais/Modal Alterar Dados Pessoais/alterar_dados_pessoais.html'
    ?>
</body>
</html>