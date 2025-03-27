<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title> 
    <link rel="stylesheet" href="./cadastro_ponto_atendimento.css">
</head>
<body class="pagina">
    <button class="botao-modal open">Abrir Modal</button>

    <div class="fundo-container-ponto-atendimento">
        <section class="modal-ponto-atendimento">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento">
            <h1 class="titulo-ponto-atendimento">Cadastrar Ponto de Atendimento</h1>
            <hr class="linha-horizontal-ponto-atendimento">
            <div class="inf-modal-ponto-atendimento">
                <div class="container-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Nome do Ponto de Atendimento</b></label>
                    <input type="text" class="input-text-ponto-atendimento" placeholder="Ex: Guichê, Baia, IPTU...">
                </div>
            </div>
            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Número / Letra</b></label>
                <input type="text" class="input-text-ponto-atendimento" placeholder="Ex: 01, 02...">
            </div>
            <div class="button-group-ponto-atendimento">
                <button class="botao-modal-ponto-atendimento cancel">Voltar</button>
                <button class="botao-modal-ponto-atendimento save">Salvar</button>
            </div>
        </section>
    </div>
    <script src="./cadastro_ponto_atendimento.js"></script>
</body>
</html>