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
    <link rel="stylesheet" href="../../public/css/cadastro_usuario.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
    <!-- <link rel="stylesheet" href="../../../public/modais/Modal_Confirmacao_dos_Dados_Registrados/confirmacao_dados_registrados.css"> -->

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../../public/js/checkbox_seleciona_todos.js" defer></script>
    <script src="../js/usuario_cadastrar.js" defer></script>
    <script src="../js/validar_cpf.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    include "../actions/perfil_listar.php";
    include "../actions/servico_listar.php";
    ?>

    <section class="Area-Util-Projeto">

        <div class="titulo_cds">
            <h1>Cadastrar Perfil</h1>
            <hr>
        </div>

        <form class="quadrado" method="POST" id="dados_cad" onkeydown="return event.key != 'Enter';">
            <div class="nome">
                <label class="labeledit" for="nome">Nome*</label>
                <input class="borda" type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite aqui o nome do usuário" required>
                <span class="erro" id="erro_nome"></span>
            </div>
            <div class="email">
                <label class="labeledit" for="email">Email*</label>
                <input class="borda" type="text" name="email_usuario" id="email_usuario" placeholder="Digite aqui o Email do usuário" required>
                <span class="erro" id="erro_email"></span>
            </div>
            <div class="cpf">
                <label class="labeledit" for="cpf">CPF*</label>
                <input class="borda" type="text" name="cpf_usuario" id="cpf_usuario" maxlength="14" placeholder="000.000.000-00" required>
                <span class="erro" id="erro_cpf"></span>
            </div>
            <div class="selecionar">
                <div class="perfild">
                    <label class="labeledit" for="perfil">Perfil De Acesso
                        <button class="icone_add_servico" id="abrirModalCadastro">
                            <img src="../../../public/img/icons/add_icon.svg" alt="(+)">
                        </button>
                    </label>
                    <select class="selecao" name="id_perfil_usuario" required>
                        <option class="pi" value="" disabled selected>Selecione</option>
                        <?php
                        // // LISTA PERFIS DE USUARIO
                        foreach ($perfis as $perfil) {
                        ?> 
                        <option class="pi" value="<?= $perfil["id_perfil_usuario"] ?>"><?= $perfil["nome_perfil_usuario"] ?></option> 
                        <?php
                        };
                        ?>
                    </select>
                    <span class="erro" id="erro_perfil"></span>
                </div>
            </div>
            
            <title class="servico">Permissões</title>
            <div class="checkbox-container">
                <div class="column-1">
                    <?php foreach ($permissoes as $permissao): ?>
                        <label class="customizado">
                            <input type="checkbox" class="item" name="permissoes_selecionadas[]" value="<?= $permissao['id_permissao'] ?>">
                            <span class="teste"></span> <?= htmlspecialchars($permissao['nome_permissao']) ?>
                        </label>
                    <?php endforeach; ?>
                    <label class="customizado">
                        <input type="checkbox" id="select-all">
                        <span class="teste"></span>Selecionar Todos
                    </label>
                </div>
            </div>
        </form>
        <div class="form-actions2">
            <button class="botao_volto" form="dados_cad" type="reset" onclick="window.location.href='./menuadm_usuario.php';">Voltar</button>
            <button class="botao_salvo cadastrar_usuario" name="cadastrar" id="save_sucess">Salvar</button>
        </div>

        <?php
        include "./monitor_modal.php";
        include "../../public/modais/modal_confirmacao_dados_registrados.php";
        include "../../public/modais/modal_confirmacao_dados.php";
        ?>
    </section>
</body>

</html>