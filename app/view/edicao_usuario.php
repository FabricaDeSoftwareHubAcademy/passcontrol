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
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../public/css/edit_usuario.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Dados Registrados/confirmacao_dados_registrados.css"> -->
    <!-- <link rel="stylesheet" href="../../../public/modais/modais/Modal Confirmação dos Dados/confirmacao_dados.css"> -->

    <!-- JS -->
    <script src="../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../public/js/monitor-modal.js" defer></script>
    <script src="../../public/js/modal-edicao-usuario.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <div class="titulo">
            <h1 class="cadastro_title">Edição de Usuário</h1><br>
            <hr>
        </div>
        <div class="quadrado">
            <div class="container-flex">
                <section class="forme">
                    <div class="nome">
                        <label class="labeledit" for="nome">Nome*</label>
                        <input class="borda" type="text" name="nome" placeholder="">
                    </div>
                    <div class="email">
                        <label class="labeledit" for="email">Email*</label>
                        <input class="borda" type="text" name="email">
                    </div>
                    <div class="cpf">
                        <label class="labeledit" for="cpf">CPF</label>
                        <input class="borda" type="text" name="email">
                    </div>
                </section>
            </div>
            <div class="selecionar">

                <div class="perfild">
                    <label class="labeledit" for="perfil">Perfil De Acesso</label>
                    <select class="selecao" name="plataforma" required="required">
                        <option class="pi" value="admin">Administrador</option>
                        <option class="pi" value="sup">Supervisor</option>
                        <option class="pi" value="atend">Atendente</option>
                        <option class="pi" value="auto-at">Terminal de Autoatendimento</option>
                    </select>
                </div>
                <title class="servico">Seviços</title>
                <div class="checkbox-container">
                    <div class="column">
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Conselho Muncipal</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Fiscalização</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Iluminação Pública</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">IPTU</span>
                        </label>
                    </div>
                    <div class="column">
                        <div class="caixa"></div>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Licenças</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Ouvidoria</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox">
                            <span class="teste">Poda De Àrvores</span>
                        </label>
                        <label class="customizado">
                            <input type="checkbox" id="select-all">
                            <label for="select-all">Selecionar Todos</label>
                        </label>
                    </div>
                </div>
                <div class="btn">
                    <script src="../../public/js/scripts.js"></script>
                    <button class="botao1">Voltar</button>
                    <button class="botao2">Salvar</button>
                </div>
            </div>
        </div>
    </section>

    <?php
    /* include "./monitor-modal.php"; */
    ?>

</body>
</html>