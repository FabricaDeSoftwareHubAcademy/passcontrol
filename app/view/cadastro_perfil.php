<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>PassControl</title>

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css" />
    <link rel="stylesheet" href="../../public/css/monitor_modal.css" />
    <link rel="stylesheet" href="../../public/css/cadastro_usuario.css" />
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css" />
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css" />
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css" />
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css" />

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <script src="../../public/js/checkbox_seleciona_todos.js" defer></script>
    <script src="../js/usuario_cadastrar.js" defer></script>
    <script src="../js/validar_cpf.js" defer></script>
    <script src="../js/perfil_cadastro.js" defer></script>
    <script src="../../public/js/modal_cadastro_confirmacao_permissao.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="image/x-icon" href="../../public/img/Logo-Nota-Controlnt.ico" />
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    include "../actions/perfil_listar.php";      // Isso define $permissoes
    include "../actions/servico_listar.php";
    
    require_once '../classes/Permissao.php';

    $permissaoObj = new Permissao();
    $permissoes = $permissaoObj->buscar();

    ?>

    <section class="Area-Util-Projeto">
        <div class="titulo_cds">
            <h1>Cadastrar Perfil</h1>
            <hr />
        </div>

        <!--
            Ajuste importante: o formulário precisa ter o atributo action (onde enviar)
            e o botão Salvar deve estar dentro do form com type="submit".
        -->
        <form
            class="quadrado"
            method="POST"
            id="dados_cad"
            action="perfil_cadastrar.php"
            onkeydown="return event.key != 'Enter';"
        >
            <div class="nome">
                <label class="labeledit" for="nome_perfil_usuario">Novo Nome de Perfil*</label>
                <!-- Corrigido o name e id para refletir 'perfil' e não 'usuario' -->
                <input
                    class="borda"
                    type="text"
                    name="nome_perfil_usuario"
                    id="nome_perfil_usuario"
                    placeholder="Digite aqui o nome do perfil"
                    required
                />
                <span class="erro" id="erro_nome"></span>
            </div>

            <div class="titulo-permissoes">
                <label class="labeledit" for="permissoes">Permissões
                    <button
                        class="icone_add_servico"
                        id="abrirModalCadastroPermissao"
                        type="button"
                        title="Adicionar nova permissão"
                    >
                        <img src="../../public/img/icons/add_icon.svg" alt="(+)"/>
                    </button>
                </label>
            </div>

            <div class="checkbox-container">
                <div class="column-1">
                    <?php foreach ($permissoes as $permissao): ?>
                        <label class="customizado">
                            <input
                                type="checkbox"
                                class="item"
                                name="permissoes_selecionadas[]"
                                value="<?= htmlspecialchars($permissao['id_permissao']) ?>"
                            />
                            <span class="teste"></span> <?= htmlspecialchars($permissao['nome_permissao']) ?>
                        </label>
                    <?php endforeach; ?>

                    <label class="customizado">
                        <input type="checkbox" id="select-all" />
                        <span class="teste"></span> Selecionar Todos
                    </label>
                </div>
            </div>

            <div class="form-actions2">
                <button
                    class="botao_volto"
                    type="button"
                    onclick="window.location.href='./menuadm_usuario.php';"
                >
                    Voltar
                </button>

                <button class="botao_salvo" type="submit" id="save_sucess" name="cadastrar">
                    Salvar
                </button>
            </div>
        </form>
        
        <?php
        include "./monitor_modal.php";
        include "../../public/modais/modal_confirmacao_dados_registrados.php";
        include "../../public/modais/modal_cadastro_permissao.php";
        include "../../public/modais/modal_confirmacao_dados.php";
        ?>
    </section>
</body>

</html>
