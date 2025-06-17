
<!-- ************************************   EDITAR SERVIÇO  ************************************ -->

<!-- Modal  EDITAR Ponto de Atendimento-->
<div class="modal-container" data-nome-modal="editar-servico">
    <section class="modal">
        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <h1 class="titulo">Editar Serviço</h1>
        <hr class="linha-horizontal">
        <form id="formulario_editar" method="POST" enctype="multipart/form-data">
            <div class="inf-modal">
                <div class="container">
                    <label class="label"><b>Nome do Serviço</b></label>
                    <input type="text" id="nome_ponto_atendimento" name="nome_servico" class="input-text">
                    <input type="hidden" id="id_ponto_atendimento" name="id_servico">
                </div>
            </div>
            <div class="servico">
                <label class="label"><b>Código do Serviço</b></label>
                <input type="text" id="identificador_ponto_atendimento" name="codigo_servico" class="input-text" placeholder="">
            </div>
            <div class="servico">
                <label class="label"><b>Imagem</b></label>
                <input type="text" id="identificador_ponto_atendimento" name="url_imagem_servico" class="input-text" placeholder="">
            </div>
            <div class="button-group">
                <button class="botao-modal cancel">Voltar</button>
                <button class="botao-modal save">Salvar</button>
            </div>

        </form>
    </section>
</div>