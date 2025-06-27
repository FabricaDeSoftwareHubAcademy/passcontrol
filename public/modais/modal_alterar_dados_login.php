<div class="edit_dados">
    <section class="edit-dados-login">
        <img src="../../public/img/icons/logo_control.svg" alt="Loading..." class="logo-dados-login">
        <h1 class="titulo-alterar-login">Alterar Dados</h1>
        <hr class="line">
        <form class="editDados" id="formEditDados" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id_usuario_login" id="id_usuario_login" value=""> <!-- Campo oculto para o ID do usuário -->

            <div class="dados-nome-login">
                <div class="container-dados-login">
                    <label class="label-nome-login"><b>Nome</b></label>
                    <input type="text" class="input-dados-login" id="nome-login" name="nome-login" value="" placeholder="Nome do usuário" required>
                </div>
            </div>

            <div class="dados-email-login">
                <label class="label-email-login"><b>E-mail</b></label>
                <input type="email" class="input-email-login" id="email-login" name="email-login" value="" placeholder="exemplo@email.com" required>
            </div>

            <div class="file-login-container">
                <label class="label-file-login"><b>Foto de Perfil</b></label>
                <input type="file" class="input-file-login" id="foto-login" name="foto-login" value="">
            </div>

            <div class="button-alterar-dados-login">
                <button class="botao-modal-alterar-dados cancel_AltDadosPessoais" type="reset" form="formEditDados">Voltar</button>
                <button class="botao-modal-alterar-dados save_AltDadosPessoais" type="submit" form="formEditarCadastro" name="confSistema">Salvar</button>
            </div>
        </form>
    </section>
</div>