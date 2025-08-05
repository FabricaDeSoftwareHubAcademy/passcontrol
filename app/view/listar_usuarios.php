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
    <link rel="stylesheet" href="../../public/css/listar_usuarios.css">
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/monitor_modal.css">
    <link rel="stylesheet" href="../../public/css/conteudo.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/css/modal_editar_dados_usuario.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">
    <link rel="stylesheet" href="../../public/css/modal_alterar_status.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">    
    <link rel="stylesheet" href="../../public/css/modal_aviso_erro.css">    
    <!-- <link rel="stylesheet" href="../../public/css/modal_alerta_alteracoes.css"> -->
    <!-- <link rel="stylesheet" href="../../public/css/tabela.css"> -->
    
    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>
    
    <script src="../../public/js/dropdown_select.js" defer></script>
    <script src="../js/usuario_alterar_status.js" defer></script>
    <script src="../js/usuario_editar.js" defer></script>
    <script src="../js/validar_cpf.js" defer></script>
    <script src="../js/barra_pesquisa_usuarios_cadastrados.js" defer></script>
    
    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "../actions/usuario_listar.php";
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">

        <div class="area-info-listar-usuario">
            <div class="header-area-listar-usuario">
                <div class="titulo-area-listar-usuario">
                    <span>Usuarios Cadastrados</span>
                </div>
                <div class="input-search-listar-usuario">
                    <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente">
                </div>
            </div>
            <div class="linha-in-listar-usuario">
                <span></span>
            </div>
            <div class="fundo-area-tabela-listar-usuario">
                <table class="tabela-listar-usuario">
                    <thead>
                        <tr>
                            <th class="matricula-nome-listar-usuario" scope="col">Nome</th>
                            <th class="matricula-nome-listar-usuario" scope="col">Matricula</th>
                            <th class="perfil-servico-listar-usuario" scope="col">Perfil</th>
                            <th class="perfil-servico-listar-usuario" >Serviços</th>
                            <th class="alterar-status-listar-usuario" scope="col">Editar</th>
                            <th class="alterar-status-listar-usuario" scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-atendimento">
                        <?php foreach ($dados as $usuario):
                            $UsuStatus = $usuario["status_usuario"] == 0 ? 1 : 'active';
                            
                            $id_perfil = $objperfil->buscar("id_perfil_usuario =" . $usuario['id_perfil_usuario_fk'], null );
                        ?>
                        <tr>
                            <td class="matricula-nome-listar-usuario" scope="col"> <?= $usuario['nome_usuario'] ?> </td>
                            <td class="matricula-nome-listar-usuario" scope="col"> <?= $usuario['email_usuario'] ?> </td>
                            <td class="perfil-servico-listar-usuario" scope="col"> <?= $id_perfil[0]['nome_perfil_usuario'] ?> </td>
                            <td class="perfil-servico-listar-usuario"> 
                                <?php
                                    foreach($servicos_prestados as $servico_usuario){
                                        if($servico_usuario["id_usuario"] == $usuario["id_usuario"]){
                                            echo "-". $servico_usuario["nome_servico"] . "<br>";
                                        }
                                        else{
                                            echo "";
                                        }
                                    }
                                ?>
                            </td>
                            <td class="alterar-status-listar-usuario" scope="col">
                                <div class="status-editar-center">
                                    <button class="openEditar" data-id="<?= $usuario["id_usuario"] ?>">
                                        <img src="../../public/img/icons/editar.png" alt="">
                                    </button>
                                </div>
                            </td>
                            <td class="alterar-status-listar-usuario" scope="col">
                                <div class="openInativarAtivar" data-id="<?= $usuario["id_usuario"] ?>">
                                    <button class="toggle-btn <?= $UsuStatus ?>">
                                        <div class="circulo"> </div>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="div-botao-info-listar-usuario">
                <button class="add-func" type="reset" onclick="location.href = document.referrer">Voltar</button>
                <button class="add-func" type="submit" onclick="window.location.href='./cadastro_usuario.php';">Novo Funcionario</button>
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