
<!-- ************************************   EDITAR SERVIÇO  ************************************ -->

<!-- Modal  EDITAR Servico-->
<div class="modal-container-servico" data-nome-modal="editar-servico">
    <section class="modal-serv">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-servico">
        <h1 class="titulo-edit-servico">Editar Serviço</h1>
        <hr class="linha-horizontal-servico">
        <form id="formulario_editar_servico" method="POST" enctype="multipart/form-data">
            <!-- NOME DO SERVIÇO  -->
            <div class="inf-modal-edit-servico">
                <div class="container-edit-nome-servico">
                    <label class="label-servico"><b>Nome do Serviço</b></label>
                    <input type="text" id="nome_edit_servico" name="nome_servico" class="input-text-edit">
                    <input type="hidden" id="id_edit_servico" name="id_servico">
                </div>
            </div>
            <!-- CÓDIGO SERVIÇO -->
            <div class="edit-codigo-servico">
                <label class="label-servico"><b>Código do Serviço</b></label>
                <input type="text" id="identificador_codigo_servico" name="codigo_servico" class="input-text-edit">
            </div>
            <!-- IMAGEM DO SERVIÇO -->
            <div class="img-edit-servico">
                <label class="label-servico"><b>Editar Imagem Serviço</b></label>
                <img id="preview_imagem_editar" src="#" alt="Sem Imagem" class="manipula-img-editar" >
                <input type="file" id="imagem_edit_servico" name="url_imagem_servico" class="input-text-edit" accept="image/*">
            </div>
            <!-- BOTÕES -->
            <div class="button-grup-edit-servico">
                <button class="botao-modal-edit-serv cance_lEditServ">Voltar</button>
                <button class="botao-modal-edit-serv save_EditServ" form="formulario_editar_servico">Salvar</button>
            </div>
        </form>
    </section>
</div>