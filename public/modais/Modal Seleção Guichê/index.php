<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="./estilo.css">
</head>
<body>
    <button class="botao-modal open">Abrir Modal</button>
    <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Confirmação</h1>
            <hr>
            <p><b>Selecione o Seu Guichê</b></p>
            <div class="select-container">
                <select>
                    <option>Guichês</option>
                    <option>Guichê 1</option>
                    <option>Guichê 2</option>
                    <option>Guichê 3</option>
                </select>
            </div>
            <div class="button-group">
                <button class="botao-modal confirm">Confirmar</button>
            </div>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>