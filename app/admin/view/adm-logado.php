<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
        <title>PassControl</title>
        
        <!-- IMPORT DA FONTE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        
        <!-- IMPORT DO CSS -->
        <link rel="stylesheet" href="../../../public/css/adm-logado.css">
        <!-- <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Dados Registrados/estilo.css"> -->

        <!-- IMPORT DO JS -->
        <!-- <script src="../../../public/js/modal-adm-logado.js"></script> -->
        <!-- <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico"> -->

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
    <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
    <h3 class="perfil-titulo">Perfil</h3>
    <div class="sub-area">
        <!-- Grupo de Dados Pessoais -->
        <div class="dados-pessoais">
            <h3>Dados Pessoais</h3>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite o Nome do Funcionário">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Digite o Email do Funcionário">
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="number" id="cpf" name="cpf" placeholder="Digite o CPF do Funcionário">
                </div>
            </div>
        </div>

        <!-- Grupo de Alterar Senha -->
        <div class="alterar-senha">
            <h3>Alterar Senha</h3>
            <div class="form-group">
                <label for="senha-atual">Senha Atual</label>
                <input type="password" id="senha-atual" name="senha-atual" placeholder="Digite a Senha Atual">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="nova-senha">Nova Senha</label>
                    <input type="password" id="nova-senha" name="nova-senha" placeholder="Digite a Nova Senha">
                </div>
                <div class="form-group">
                    <label for="confirm-nova-senha">Confirmar Nova Senha</label>
                    <input type="password" id="confirm-nova-senha" name="confirm-nova-senha" placeholder="Digite Novamente a Nova Senha">
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="button" class="botao-voltar" onclick="window.location.href='javascript:history.back()';">Voltar</button>
        <button type="submit" class="botao-salvar open">Salvar</button>
    </div>
        <!-- <main-modal-adm-logado></main-modal-adm-logado> -->
        <!-- FIM DA ÁREA ÚTIL DA PÁGINA -->
    </section>
    
    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>