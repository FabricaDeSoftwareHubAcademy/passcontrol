<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="./estilo.css">
</head>
<body class="estruct-pass">
    <button class="botao-modal open">Abrir Modal</button>
    <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="title">Confirmar Presença</h1>
            <hr class="row">
            <p class="desk-info"><b>Guichê 1</b></p>
            <p class="name"><b>João Guilherme Ortigosa</b></p>
            <p class="info"><b>Senha:</b> <span class="senha">CM 001</span></p>
            <p class="info"><b>Serviço:</b> <strong>IPTU</strong></p>
            <div class="button-group">
                <button class="botao-modal ausente">Ausente</button>
                <button class="botao-modal presente">Presente</button>
                <button class="botao-modal chamar">Chamar Novamente</button>
            </div>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>