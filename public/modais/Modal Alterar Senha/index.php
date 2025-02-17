<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passcontrol</title>
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
    <button class="botao-modal open">Abrir Modal</button>
    <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Alterar Senha</h1>
            <hr>
            <div class="senha-atual">
                <div class="container">
                    <label><b>Senha Atual</b></label>
                    <input type="text" placeholder="Digite a sua senha atual">
                </div>
            </div>
            <div class="nova-senha">
                <label><b>Nova Senha</b></label>
                <input type="text" placeholder="Digite a nova senha">
            </div>
            <div class="conf-senha">
                <label><b>Confirmar Nova Senha</b></label>
                <input type="text" placeholder="Digite novamente a nova senha">
            </div>
            <div class="button-group">
                <button class="botao-modal cancel">Voltar</button>
                <button class="botao-modal save">Salvar</button>
            </div>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>