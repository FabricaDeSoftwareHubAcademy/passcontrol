<?php
require '../../classe/Usuario.php';

$usuarios = new Usuario();

$db_profiles = new Database("perfil");
$perfis = $db_profiles->execute("SELECT * FROM perfil");

$dados = $usuarios->buscar();

?>

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
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Status_Usuario/alterar_status_usuario.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Confirmacao_dos_Dados/confirmacao_dados.css">
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <script src="../../../public/js/editar_usuario.js" defer></script>
    <script src="../../../public/js/alterar_status_usuario.js" defer></script>
    <!-- <script src="../../../public/js/modal-atendentes-cadastrados.js" defer></script> -->

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
                            <th scope="col">Nome</th>
                            <th scope="col">Matricula</th>
                            <th scope="col">Perfil</th>
                            <th>Serviços</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Status</th>
                        </tr>
                        <tr>
                            <?php foreach ($dados as $usuario):
                                $UsuStatus = $usuario->status_usuario == 'ativo' ? 'inactive' : 'active';
                                
                                $id_perfil = $usuarios->listar_nome_perfil($usuario->id_perfil);
                            ?>
                            <tr>
                                <td> <?= $usuario->nome ?> </td>
                                <td> <?= $usuario->email ?> </td>
                                <td> <?= $id_perfil['nome'] ?> </td>
                                <td>SERVIÇO</td>
                                <td>
                                    <div class="editar">
                                        <button class="openEditar" data-id="<?= $usuario->id_usuario ?>">
                                            <img src="../../../public/img/icons/Group 2924.png" alt="">
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="openInativarAtivar" data-id="<?= $usuario->id_usuario ?>">
                                        <button class="toggle-btn <?= $UsuStatus ?>">
                                            <div class="circulo"> </div>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="div-botao-info">
                <button class="add-func" type="submit" onclick="window.location.href='../../../app/admin/view/telacadastro.php';">Novo Funcionario</button>
            </div>
        </div>
    </section>
    
    <?php
    include "../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.php";
    include "../../../public/modais/Modal_Alterar_Status_Usuario/alterar_status_usuario.php";
    include "../../../public/modais/Modal_Confirmacao_dos_Dados/confirmacao_dados.php";
    include "./monitor-modal.php";
    ?>
</body>
</html>