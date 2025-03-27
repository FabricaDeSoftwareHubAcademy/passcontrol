<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="./confirmacao_dados_registrados.css">
</head>
<body class="body">
    <button class="botao-modal open">Abrir Modal</button>


    <div class="fundo-container-confirmacao-dados-registrados">
        <section class="modal-confirmacao-dados-registrados">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-confirmacao-dados-registrados">
            <h1 class="titulo-confirmacao-dados-registrados">Confirmação</h1> 
            <hr class="linha-confirmacao-dados-registrados">
            <p class="texto-confirmacao-dados-registrados"><b>Deseja Salvar as Edições Feitas?</b></p>
            <div class="button-group-confirmacao-dados-registrados">
                <button class="botao-modal-confirmacao-dados-registrados cancel">Não</button>
                <button class="botao-modal-confirmacao-dados-registrados save">Sim</button>
            </div>
        </section>
    </div>
    <script src="./confirmacao_dados_registrados.js"></script>
</body>
</html>