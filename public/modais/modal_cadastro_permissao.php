<!-- ************************************   CADASTRAR PERMISSÃO   ************************************ -->

<!-- MODAL DE CADASTRO DE PERMISSÃO -->
<div class="fundo-container-cad-ponto-atendimento">
    <section class="modal-ponto-atendimento">
        <img src="../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento">
        <h1 class="titulo-ponto-atendimento">Cadastrar Permissao</h1>

        <hr class="linha-horizontal-ponto-atendiamento">

        <form id="formulario_cadastrar" method="POST">
            
            <div class="inf-modal-ponto-atendimento">
                <div class="container-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Nome da Permissao</b></label>
                    <input type="text" id="nome_ponto_atendimento_cadastrar" name="nome_servico" class="input-text-ponto-atendimento">
                </div>
            </div>
            <div class="servico-ponto-atendimento">
                <label class="label-ponto-atendimento"><b>Código</b></label>
                <input type="text" id="identificador_ponto_atendimento_cadastrar" name="codigo_servico" class="input-text-ponto-atendimento">
            </div>
            <div class="button-group-ponto-atendimento">
                <button class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                <button type="submit" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
            </div>

        </form>
    </section>
</div>
