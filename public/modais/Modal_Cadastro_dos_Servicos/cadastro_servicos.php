<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title> 
    <link rel="stylesheet" href="./cadastro_servicos.css">
</head>
<body class="body">
    <button class="botao-modal open">Abrir Modal</button>

    <div class="modal-container-cadas-servicos">
        <section class="modal-cadas-servicos">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-cadas-servicos">
            <h1 class="title-cadas-servicos">Cadastrar Serviços</h1>
            <hr class="divider-servicos">
            <div class="inf-modal-cadas-servico">
                <div class="container-cadas-servico">
                    <label class="label-servico"><b>Código do Serviço</b></label>
                    <input type="number" class="input-number-servicos" placeholder="Digite o código do serviço">
                </div>
                <div class="container-cadas-servico">
                    <label class="label-servico"><b>Ícone</b></label>
                    <div class="file-input-servicos">
                        <input type="file" id="fileInput" class="file-input-field-servicos">
                        <img src="" alt="" class="file-preview">
                    </div>
                </div>
            </div>
            <div class="area-servico-cadas">
                <label class="label-servico"><b>Serviço</b></label>
                <input type="text" class="input-text-servicos" placeholder="Digite o nome do novo serviço">
            </div>
            <div class="button-group-cadastro-servico">
                <button class="botao-modal-cadastro-servico cancel">Cancelar</button>
                <button class="botao-modal-cadastro-servico save">Salvar</button>
            </div>
        </section>
    </div>

    <script src="./cadastro_servicos.js"></script>
</body>
</html>