<div class="fundo_editar_dados_usuario">
    <section class="modal-editar-dados">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-alterar-dados">
        <h1 class="titulo-editar-dados-usu">Editar Dados do Usuário</h1>
        <hr class="linha-alterar-dados">
        <form class="form_editar_dados_usuario" id="form_editar_dados_usuario" method=POST enctype="multipart/form-data">

            <input type="hidden" name="id_usuario" id="id_usuario" value=""> <!-- Campo oculto para o ID do usuário -->

            <div class="container_edit_usuario">
                <label class="label_input-editar-dados-usu"><b>Nome</b></label>
                <input type="text" class="input_dados_edit font_input" id="nome" name="nome" value="" placeholder="Nome do usuario" required>
            </div>

            <div class="container_edit_usuario">
                <label class="label_input-editar-dados-usu"><b>E-mail</b></label>
                <input type="email" class="input_dados_edit font_input" id="email" name="email" value="" placeholder="exemplo@email.com" required>
            </div>

            <div class="container_edit_usuario">
                <label class="label_input-editar-dados-usu"><b>CPF</b></label>
                <input type="text" class="input_dados_edit font_input" id="cpf" name="cpf" value="" maxlength="14" placeholder="000.000.000-00" required>
            </div>

            <div class="container_edit_usuario">
                <label class="label_input-editar-dados-usu"><b>Foto de Perfil</b></label>
                <div class="sub_container_foto">
                    <img class="foto_usuario" id="foto_usuario" src="" alt="Nada cadastrado!">
                    <input type="file" class="input_dados_edit font_input" id="foto" name="foto" value="">
                    <input type="hidden" name="foto_nula" id="foto_nula" value="">
                </div>
            </div>

            <div class="container_edit_usuario">
                <label class="label_input-editar-dados-usu" for="perfil">Perfil De Acesso</label>
                <select class="input_dados_edit font_input" form="form_editar_dados_usuario" type="select" name="id_perfil" id="id_perfil" placeholder="Nome do perfil" required>
                    <?php
                    // // LISTAR PERFIS DE USUARIO
                    foreach ($perfis as $perfil):
                    ?> <option class="pi font_input" value="<?= $perfil["id_perfil_usuario"] ?>"><?= $perfil["nome_perfil_usuario"] ?></option> <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="container_edit_usuario" id="select_servico_usuario">
                <label class="label_input-editar-dados-usu" for="Servico">Servicos Atendidos</label>
                <div class="container_dropdown">

                    <div class="input_dados_edit font_input selecao_servico noselect">  <!-- FAKE SELECT BTN -->
                        Selecione Opções
                        <span class="seta_dropdown">></span>
                    </div>
                    
                    <div class="input_dados_edit dropdown_select"> <!-- DROPDOWN DE SELECAO -->
                        <label class="label_option_servico font_input">
                            <input type="checkbox" id="selectAll">
                            <p>Selecionar todos</p>
                        </label>
                        <span class="linha_select"></span>
                        <?php
                        // // LISTA SERVICOS DISPONIVEIS
                        foreach ($servicos as $servico):
                        ?>
                        <label class="label_option_servico font_input">
                            <input type="checkbox" class="option_servico" name="id_servico[]" value="<?= $servico->id_servico ?>">
                            <?= $servico->nome_servico . " - " . $servico->codigo_servico ?>
                        </label>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>

            <div class="container_botao_form">
                <button class="botao-modal-alterar-dados cancel_edit_dados_usu" type="reset" form="form_editar_dados_usuario">Voltar</button>
                <button class="botao-modal-alterar-dados save_edit_dados_usu" type="submit" form="form_editar_dados_usuario" name="form_editar_dados_usuario">Salvar</button>
            </div>    
        </form>        
    </section>
</div>