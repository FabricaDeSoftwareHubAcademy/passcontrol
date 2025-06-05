<div class="fundo-editar-dados">
    <section class="modal-editar-dados">
        <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-alterar-dados">
        <h1 class="titulo">Alterar Dados Pessoais</h1>
        <hr class="linha-alterar-dados">
        <form class="editarCadastro" id="formEditarCadastro" method=POST enctype=multipart/form-data>

            <input type="hidden" name="id_usuario" id="id_usuario" value=""> <!-- Campo oculto para o ID do usuário -->

            <div class="nome-container-alterar-dados">
                <div class="container-dados">
                    <label class="label-nome-alterar-dados"><b>Nome</b></label>
                    <input type="text" class="input-nome" id="nome" name="nome" value="" placeholder="Nome do usuario" required>
                </div>
            </div>

            <div class="email-container-alterar-dados">
                <label class="label-email-alterar-dados"><b>E-mail</b></label>
                <input type="email" class="input-email" id="email" name="email" value="" placeholder="exemplo@email.com" required>
            </div>

            <!-- <div class="cpf-container-alterar-dados">
                <label class="label-cpf-alterar-dados"><b>CPF</b></label>
                <input type="text" class="input-cpf" id="cpf" name="cpf" value="" maxlength="14" placeholder="000.000.000-00" required>
            </div> -->

            <div class="file-container">
                <label class="label-file-alterar-dados"><b>Foto de Perfil</b></label>
                <input type="file" class="input-file" id="foto" name="foto" value="">
            </div>

            <div class="button-group-alterar-dados">
                <button class="botao-modal-alterar-dados cancel_AltDadosPessoais" type="reset" form="formEditarCadastro">Voltar</button>
                <button class="botao-modal-alterar-dados save_AltDadosPessoais" type="submit" form="formEditarCadastro" name="editarCadastro">Salvar</button>
            </div>    
        </form>        
    </section>
</div>