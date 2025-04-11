<?php
    require '../../classe/Usuario.php';

    // require '../../model/Servico.php';
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
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/edit_cadastro.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    
    <!-- <link rel="stylesheet" href="../../../public/modais/Modal_Confirmacao_dos_Dados_Registrados/confirmacao_dados_registrados.css"> -->
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <!-- <script src="../../../public/js/modal_salvar_cadastro.js" defer></script> -->
    <script src="../../../public/js/todos.js" defer></script>
    
    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    include "../../controller/usuario_cadastrar.php";
    ?>

    <section class="Area-Util-Projeto">

        <div class="titulo_cds">
            <h1>Cadastrar Usuário<br></h1>
            <hr>
        </div>

        <form class="quadrado" method="POST" id="dados_cad">
            <div class="nome">
                <label class="labeledit" for="nome">Nome*</label>
                <input class="borda" type="text" name="nome" id="nome" placeholder="Digite aqui o nome do usuário" required>
            </div>
            <div class="email">
                <label class="labeledit" for="email">Email*</label>
                <input class="borda" type="text" name="email" id="email" placeholder="Digite aqui o Email do usuário" required>
            </div>
            <div class="cpf">
                <label class="labeledit" for="cpf">CPF*</label>
                <input class="borda" type="text" name="cpf" id="cpf" max="11" placeholder="Digite aqui o CPF do usuário" required>
            </div>
            <div class="selecionar">
                <div class="perfild">
                    <label class="labeledit" for="perfil">Perfil De Acesso</label>
                    <select class="selecao" name="id_perfil" required>
                        <option class="pi" value="" disabled selected>Selecione</option>
                        <?php
                            // // LISTAR PERFIS DE USUARIO
                            foreach ($perfis as $perfil){
                            ?> <option class="pi" value="<?=$perfil["id_perfil"]?>"><?=$perfil["nome"]?></option> <?php
                            };
                        ?>
                    </select>
                </div>
                
            </div>
            <title class="servico">Seviços</title>
            <div class="checkbox-container">
                <div class="column-1">
                    <?php
                    foreach($servicos as $servico){
                        ?> 
                        <label class="customizado">
                            <input type="checkbox" class="item" id="checkbox1" value="<?=$servico["id_servico"]?>">
                            <span class="teste"></span><?=$servico['nome_servico']?>
                        </label>
                        <?php
                    }
                    ?>
                    <label class="customizado">
                        <input type="checkbox" id="select-all">
                        <span class="teste"></span>Selecionar Todos
                    </label>
                </div>
            </div>
        </form>
        <div class="form-actions2"> 
            <button class="botao_volto" form="dados_cad" type="reset" onclick="window.location.href='./menuadm_usuario.php';">Voltar</button>
            <button class="botao_salvo open" form="dados_cad" type="submit" name="cadastrar" id="save_sucess">Salvar</button>
        </div>
    </section>

    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>