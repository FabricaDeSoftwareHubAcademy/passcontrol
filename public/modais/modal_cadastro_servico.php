<!-- ************************************   CADASTRAR SERVIÇOS   ************************************ -->

<!-- MODAL DE CADASTRO SERVIÇOS -->
<div class="fundo-container-cad-servico" data-nome-modal="cadastrar">
    <section class="modal-servico">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-servico">
        <h1 class="titulo-servico">Cadastrar Serviços</h1>

        <hr class="linha-horizontal-servico">

        <form id="formulario_cadastrar_servico" method="POST" enctype="multipart/form-data">
            
            <div class="inf-modal-servico">
                <div class="container-servico">
                    <label class="label-servico"><b>Nome do Serviço</b></label>
                    <input type="text" id="nome_servico_cadastrar" name="nome_servico" class="input-text-servico" placeholder="Ex: Transporte, Poda de Árvores, IPTU... ">
                    <span id="erro_nome_servico" class="messagem-erro-serv"></span>
                </div>
            </div>

            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Código</b></label>
                <input type="text" id="codigo_servico_cadastrar" name="codigo_servico" class="input-text-servico" placeholder="Ex: Tr142, Pa234, IP192">
                <span id="erro_codigo_servico" class="messagem-erro-serv"></span>
            </div>

            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Cadastrar Imagem Serviço</b></label>
                <img id="preview_imagem_cadastrar" src="#" alt="Preview da Imagem" class="manipula-img-cadastrar">
                <input type="file" id="imagem_servico_cadastrar" name="url_imagem_servico" class="input-text-servico" accept="image/*">
                <span id="erro_img_servico" class="messagem-erro-serv"></span>
            </div>

            <div class="button-group-servico">
                <button class="botao-modal-servico cancel_CadServ">Voltar</button>
                <button type="button" class="botao-modal-servico save_CadServ">Salvar</button>
            </div>
        </form>
    </section>
</div>
