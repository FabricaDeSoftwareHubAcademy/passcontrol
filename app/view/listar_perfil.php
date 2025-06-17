<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>PassControl</title>

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/listar_usuarios.css" />
    <link rel="stylesheet" href="../../public/css/navegacao.css" />
    <link rel="stylesheet" href="../../public/css/monitor_modal.css" />
    <link rel="stylesheet" href="../../public/css/conteudo.css" />
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css" />
    <link rel="stylesheet" href="../../public/css/modal_editar_dados_usuario.css" />
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css" />
    <link rel="stylesheet" href="../../public/css/modal_alterar_status.css" />
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css" />
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css" />
    <link rel="stylesheet" href="../../public/css/modal_aviso_erro.css" />
    <!-- <link rel="stylesheet" href="../../public/css/modal_alerta_alteracoes.css"> -->
    <link rel="stylesheet" href="../../public/css/tabela.css" />

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    <!-- <script src="../../public/js/modal_alerta_alteracoes.js" defer></script> -->
    <!-- <script src="../../public/js/modal_atendentes_cadastrados.js" defer></script> ????????-->

    <script src="../js/usuario_alterar_status.js" defer></script>
    <script src="../js/usuario_editar.js" defer></script>
    <script src="../js/validar_cpf.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico" />
</head>

<body class="control-body-navegacao">
    <?php
    include "../actions/usuario_listar.php";
    include "../actions/perfil_listar.php";
    // include "../actions/servico_listar.php";
    include "./navegacao.php";

    // Supondo que as classes estejam instanciadas:
    // $usuarios = new Usuario();
    // $perfil = new Perfil();

   
    ?>

    <section class="Area-Util-Projeto">

        <div class="area-info">
            <div class="header-area">
                <div class="titulo-area">
                    <span>Perfis Cadastrados</span>
                </div>
                <div class="input-search">
                    <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente" />
                </div>
            </div>
            <div class="linha-in">
                <span></span>
            </div>
            <div class="area-tabela">
                <div class="sub-area-tabela">
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th class="matricula-ajuste" scope="col">Nome</th>
                                <th class="matricula-ajuste" scope="col">Matricula</th>
                                <th class="perfil-ajuste" scope="col">Perfil</th>
                                <th class="perfil-ajuste">Permissões</th>
                                <th class="editar-inativar-menor" scope="col">Editar</th>
                                <th class="editar-inativar-menor" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dados as $usuario):
                                $UsuStatus = $usuario["status_usuario"] == 1 ? '' : 'active';

                                // Busca perfil pelo ID
                                $perfilUsuario = $usuarios->listar_perfil_usuario($usuario["id_perfil_usuario_fk"]);

                                // Busca permissões associadas ao perfil
                                $permissoes = $perfil->buscarNomesPermissoes($usuario["id_perfil_usuario_fk"]);

                            ?>
                                <tr>
                                    <td class="matricula-ajuste"><?= htmlspecialchars($usuario['nome_usuario']) ?></td>
                                    <td class="matricula-ajuste"><?= htmlspecialchars($usuario['email_usuario']) ?></td>
                                    <td class="perfil-ajuste"><?= htmlspecialchars($perfilUsuario['nome_perfil_usuario'] ?? 'Não encontrado') ?></td>
                                    <td class="perfil-ajuste"><?= htmlspecialchars(implode(', ', $permissoes)) ?></td>
                                    <td class="editar-inativar-menor">
                                        <div class="editar">
                                            <button class="openEditar" data-id="<?= $usuario["id_usuario"] ?>">
                                                <img src="../../public/img/icons/Group 2924.png" alt="Editar" />
                                            </button>
                                        </div>
                                    </td>
                                    <td class="editar-inativar-menor">
                                        <div class="openInativarAtivar" data-id="<?= $usuario["id_usuario"] ?>">
                                            <button class="toggle-btn <?= $UsuStatus ?>">
                                                <div class="circulo"></div>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="div-botao-info">
                <button class="add-func" type="submit" onclick="window.location.href='./cadastro_perfil.php';">Novo Perfil</button>
            </div>
        </div>
    </section>

    <?php
    include "../../public/modais/modal_editar_usuario.php";
    include "../../public/modais/modal_alterar_status.php";
    include "../../public/modais/modal_confirmacao_dados_registrados.php";
    include "../../public/modais/modal_confirmacao_dados.php";
    include "../../public/modais/modal_aviso_erro.php";
    // include "../../public/modais/modal_alerta_alteracoes.php";
    include "./monitor_modal.php";
    ?>

</body>

</html>
