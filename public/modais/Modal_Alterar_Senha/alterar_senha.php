<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passcontrol</title>
    <link rel="stylesheet" href="./alterar_senha.css">
</head>
<body class="body">
    <button class="botao-modal open">Abrir Modal</button>

    <div class="fundo-container-alterar-senha">
        <section class="modal-alterar-senha">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-alterar-senha">
            <h1 class="titulo-alterar-senha">Alterar Senha</h1>
            <hr class="linha-alterar-senha">
            <div class="senha-atual-container">
                <div class="container-alterar-senha">
                    <label class="label-senha-atual"><b>Senha Atual</b></label>
                    <input type="text" class="input-senha-atual" placeholder="Digite a sua senha atual">
                </div>
            </div>
            <div class="nova-senha-container">
                <label class="label-nova-senha"><b>Nova Senha</b></label>
                <input type="text" class="input-nova-senha" placeholder="Digite a sua nova senha">
            </div>
            <div class="conf-nova-senha-container">
                <label class="label-conf-nova-senha"><b>Confirmar Nova Senha</b></label>
                <input type="text" class="input-conf-nova-senha" placeholder="Repita a nova senha">
            </div>
            <div class="button-group-alterar-senha">
                <button class="botao-modal-alterar-senha cancel">Voltar</button>
                <button class="botao-modal-alterar-senha save">Salvar</button>
            </div>            
        </section>
    </div>
    <script src="./alterar_senha.js"></script>
</body>
</html>
