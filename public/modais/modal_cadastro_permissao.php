<!-- ************************************   CADASTRAR PERMISSÃO   ************************************ -->

<!-- MODAL DE CADASTRO DE PERMISSÃO -->
<div class="fundo-container-cad-ponto-atendimento">
    <section class="modal-ponto-atendimento">
        <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento" />
        <h1 class="titulo-ponto-atendimento">Cadastrar Permissão</h1>

        <hr class="linha-horizontal-ponto-atendiamento" />

        <form id="formulario_cadastrar_permissao" method="POST" action="../actions/permissao_cadastrar.php">
            <div class="inf-modal-ponto-atendimento">
                <div class="container-ponto-atendimento">
                    <label class="label-ponto-atendimento" for="nome_permissao"><b>Nome da Permissão</b></label>
                    <input
                        type="text"
                        id="nome_permissao"
                        name="nome_permissao"
                        class="input-text-ponto-atendimento"
                        required
                        maxlength="100"
                        autocomplete="off"
                    />
                </div>
            </div>

            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento" for="codigo_permissao"><b>Código</b></label>
                <input
                    type="text"
                    id="codigo_permissao"
                    name="codigo_permissao"
                    class="input-text-ponto-atendimento"
                    maxlength="50"
                    autocomplete="off"
                />
            </div>

            <div class="button-group-ponto-atendimento">
                <button type="button" class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                <button type="submit" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
            </div>
        </form>
    </section>
</div>
