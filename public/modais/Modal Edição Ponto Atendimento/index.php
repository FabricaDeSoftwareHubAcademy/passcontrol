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
            <h1>Edição Ponto de Atendimento</h1>
            <hr>
            <div class="inf-modal">
                <div class="container">
                    <label><b>Nome do Ponto de Atendimento</b></label>
                    <input type="text" placeholder="Guichê">
                </div>
            </div>
            <div class="servico">
                <label><b>Número / Letra</b></label>
                <input type="text" placeholder="1">
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