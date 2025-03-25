<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passcontrol</title>
    <link rel="stylesheet" href="../Modal Alterar Dados Pessoais/alterar_dados_pessoais.css">
</head>
<body class="body">
    <button class="botao-modal" id="open_editar_dados">Abrir Modal</button>

    
    <div class="fundo-editar-dados">
        <section class="modal-editar-dados">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Alterar Dados Pessoais</h1>
            <hr class="linha-alterar-dados">
            <div class="nome-container-alterar-dados">
                <div class="container-dados">
                    <label class="label-nome-alterar-dados"><b>Nome</b></label>
                    <input type="text" class="input-nome" placeholder="Digite o seu nome">
                </div>
            </div>
            <div class="email-container-alterar-dados">
                <label class="label-email-alterar-dados"><b>E-mail</b></label>
                <input type="text" class="input-email" placeholder="Digite o seu email">
            </div>
            <div class="cpf-container-alterar-dados">
                <label class="label-cpf-alterar-dados"><b>CPF</b></label>
                <input type="number" class="input-cpf" placeholder="Digite o seu CPF">
            </div>
            <div class="file-container">
                <label class="label-file-alterar-dados"><b>Foto de Perfil</b></label>
                <input type="file" class="input-file">
            </div>
            <div class="button-group-alterar-dados">
                <button class="botao-modal-alterar-dados cancel">Voltar</button>
                <button class="botao-modal-alterar-dados save">Salvar</button>
            </div>            
        </section>
    </div>
    <script src="./alterar_dados_pessoais.js"></script>
</body>
</html>
