<div class="edit_dados">
    <section class="edit-dados-login">
        <img src="../../public/img/icons/logo_control.svg" alt="Loading..." class="logo-dados-login">
        <h1 class="titulo-alterar-login">Alterar Dados</h1>
        <hr class="line-alterar-dados-login">
            <form class="editDados" id="formEditDados" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_usuario_login" id="id_usuario_login"
                    value="<?= $_SESSION['id_usuario'] ?>">

                <div class="dados-nome-login">
                    <div class="container-dados-login">
                        <label class="label-nome-login"><b>Nome</b></label>
                        <input type="text" class="input-dados-login" id="nome-login" name="nome-login"
                            value="<?= htmlspecialchars($_SESSION['nome_usuario']) ?>" placeholder="Nome do usuário" required>
                    </div>
                </div>

                <div class="dados-email-login">
                    <label class="label-email-login"><b>E-mail</b></label>
                    <input type="email" class="input-email-login" id="email-login" name="email-login"
                        value="<?= htmlspecialchars($_SESSION['email_usuario']) ?>" placeholder="exemplo@email.com" required>
                </div>

                <div class="file-login-container">
                    <label class="label-file-login"><b>Foto de Perfil</b></label>
                    <img id="preview-foto-login" src="" alt="Pré-visualização" style="display: none; max-width: 120px; margin-top: 10px; border-radius: 5px;">
                    <input type="file" class="input-file-login" id="foto-login" name="foto-login">
                </div>

                <div class="button-alterar-dados-login">
                    <button class="botao-modal-alterar-dados cancel_AltDadosPessoais" type="reset" form="formEditDados">Voltar</button>
                    <button class="botao-modal-alterar-dados save_AltDadosPessoais" type="submit" form="formEditDados" name="confSistema">Salvar</button>

                </div>
            </form>

    </section>
</div>