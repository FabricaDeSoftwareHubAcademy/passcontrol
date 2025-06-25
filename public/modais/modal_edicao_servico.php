
<!-- ************************************   EDITAR SERVIÇO  ************************************ -->

<!-- Modal  EDITAR Ponto de Atendimento-->
<div class="modal-container" data-nome-modal="editar-servico">
    <section class="modal">
        <img src="../img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <h1 class="titulo">Editar Serviço</h1>
        <hr class="linha-horizontal">
        <form id="formulario_editar" method="POST" enctype="multipart/form-data">
            <!-- NOME DO SERVIÇO  -->
            <div class="inf-modal">
                <div class="container">
                    <label class="label"><b>Nome do Serviço</b></label>
                    <input type="text" id="nome_ponto_atendimento" name="nome_servico" class="input-text">
                    <input type="hidden" id="id_ponto_atendimento" name="id_servico">
                </div>
            </div>
            <!-- CÓDIGO SERVIÇO -->
            <div class="servico">
                <label class="label"><b>Código do Serviço</b></label>
                <input type="text" id="identificador_ponto_atendimento" name="codigo_servico" class="input-text">
            </div>
            <!-- IMAGEM DO SERVIÇO -->
            <div class="servico">
                <label class="label"><b>Imagem</b></label>
                <input type="file" id="imagem_ponto_atendimento" name="url_imagem_servico" class="input-text" accept="image/*">
                <img id="preview_imagem_editar" src="#" alt="Preview da Imagem" style="display:none; width: 80px, heigt:80px; height:80px; margin-top:10px; object-fit:cover; border-radius:8px;">
            </div>
            <!-- BOTÕES -->
            <div class="button-grup">
                <button class="botao-modal cancel">Voltar</button>
                <button class="botao-modal">Salvar</button>
            </div>
        </form>
    </section>
</div>