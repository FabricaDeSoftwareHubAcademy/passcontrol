<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>PassControl</title> 

    <link rel="stylesheet" href="./confirmacao_presenca.css">
</head>
<body class="estruct-pass">
    <button class="botao-modal open">Abrir Modal</button>


    <div class="fundo-container-confirmacao-presenca">
        <section class="modal-confirmacao-presenca">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-confirmacao-presenca">
            <h1 class="title-confirmacao-presenca">Confirmar Presença</h1>
            <hr class="row-confirmacao-presenca">
            <p class="desk-info-confirmacao-presenca"><b>Guichê 1</b></p>
            <p class="name-confirmacao-presenca"><b>João Guilherme Ortigosa</b></p>
            <p class="info-confirmacao-presenca"><b>Senha:</b> <span class="senha-confirmacao-presenca">CM 001</span></p>
            <p class="info-confirmacao-presenca"><b>Serviço:</b> <strong>IPTU</strong></p>
            <div class="button-group-confirmacao-presenca">
                <div class="button-row-confirmacao-presenca">
                    <button class="botao-modal-confirmacao-presenca ausente">Ausente</button>
                    <button class="botao-modal-confirmacao-presenca presente">Presente</button>
                </div>
                <button class="botao-modal-confirmacao-presenca chamar">Chamar Novamente</button>
            </div>            
        </section>
    </div>
    <script src="./confirmacao_presenca.js"></script>
</body>
</html>