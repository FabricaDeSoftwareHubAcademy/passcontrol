<!-- ************************************   CADASTRAR SERVIÇOS   ************************************ -->

<!-- MODAL DE CADASTRO SERVIÇOS -->
<div class="fundo-container-cad-servico" data-nome-modal="cadastrar">
    <section class="modal-ponto-atendimento">
        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento">
        <h1 class="titulo-ponto-atendimento">Cadastrar Serviços</h1>

        <hr class="linha-horizontal-ponto-atendimento">

        <form id="formulario_cadastrar" method="POST" enctype="multipart/form-data">
            
            <div class="inf-modal-ponto-atendimento">
                <div class="container-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Nome do Serviço</b></label>
                    <input type="text" id="nome_ponto_atendimento_cadastrar" name="nome_servico" class="input-text-ponto-atendimento" placeholder="Ex: Transporte, Poda de Árvores, IPTU... ">
                    <span id="erro_nome_servico" class="messagem-erro"></span>
                </div>
            </div>

            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Código</b></label>
                <input type="text" id="codigo_ponto_atendimento_cadastrar" name="codigo_servico" class="input-text-ponto-atendimento" placeholder="Ex: Tr142, Pa234, IP192">
                <span id="erro_codigo_servico" class="messagem-erro"></span>
            </div>

            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Foto</b></label>
                <input type="file" id="imagem_ponto_atendimento_cadastrar" name="url_imagem_servico" class="input-text-ponto-atendimento" accept="image/*">
                <img id="preview_imagem_cadastrar" src="#" alt="Preview da Imagem" style="display:none; width:80px; height:80px; margin-top:10px; object-fit:cover; border-radius:8px;">
                <span id="erro_img_servico" class="messagem-erro"></span>
            </div>

            <div class="button-group-ponto-atendimento">
                <button class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                <button type="button" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
            </div>
        </form>
    </section>
</div>
