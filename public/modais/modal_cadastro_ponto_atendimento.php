    <div class="fundo-container-cad-ponto-atendimento">
        <section class="modal-ponto-atendimento">
            <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-ponto-atendimento">
            <h1 class="titulo-ponto-atendimento">Cadastrar Ponto de Atendimento</h1>

            <hr class="linha-horizontal-ponto-atendimento">

            <form id="formulario" method="POST">
            
                <div class="inf-modal-ponto-atendimento">
                    <div class="container-ponto-atendimento">
                        <label class="label-ponto-atendimento"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" id="nome_guiche" name="nome_ponto_atendimento_cadastrar" class="input-text-ponto-atendimento" placeholder="Ex: Guichê, Caixa, IPTU...">
                    </div>
                </div>
                <div class="servico-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Número / Letra</b></label>
                    <input type="text" id="num_guiche" name="identificador_ponto_atendimento_cadastrar" class="input-text-ponto-atendimento" placeholder="Ex: 01, 02...">
                </div>
                <div class="button-group-ponto-atendimento">
                    <button class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                    <button type="submit" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
                </div>

            </form>
        </section>
    </div>