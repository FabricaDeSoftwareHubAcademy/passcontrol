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
            <h1>Cadastrar Serviços</h1>
            <hr>
            <div class="inf-modal">
                <div class="container">
                    <label><b>Código do Serviço</b></label>
                    <input type="number" placeholder="Digite o código do serviço">
                </div>
                <div class="container">
                    <label><b>Ícone</b></label>
                    <div class="file-input">
                        <input type="file" id="fileInput" class="file-input">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <div class="servico">
                <label><b>Serviço</b></label>
                <input type="text" placeholder="Digite o nome do novo serviço">
            </div>
            <div class="button-group">
                <button class="botao-modal cancel">Cancelar</button>
                <button class="botao-modal save">Salvar</button>
            </div>
        </section>
    </main>
    <script src="./modal.js"></script>
</body>
</html>