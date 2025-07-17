<div class="fundo-editar-ponto-atendimento">
  <section class="modal-editar-ponto-atendimento">
    <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo">
    <h1 class="titulo-modal">Edição Ponto de Atendimento</h1>

    <hr class="linha-horizontal">

    <form id="formulario_editar">
      <div class="inf-modal">
        <div class="container-ponto-atendimento">
          <label class="labe-ponto-atendimentol"><b>Nome do Ponto de Atendimento</b></label>
          <input type="text" id="nome_ponto_atendimento" name="nome_ponto_atendimento" class="input-text-editar-ponto-atendimento" placeholder="Guichê" required>
        </div>
      </div>

      <div class="servico">
        <label class="label-ponto-atendimento"><b>Número / Letra</b></label>
        <input type="text" id="identificador_ponto_atendimento" name="identificador_ponto_atendimento" class="input-text-editar-ponto-atendimento" placeholder="1/A" required>
      </div>

      <!-- Input hidden para armazenar o ID -->
      <input type="hidden" id="id_ponto_atendimento" name="id_ponto_atendimento" value="">

      <div class="button-group-ponto-atendimento-edicao">
        <button type="button" class="botao-modal cancel_EdicaoPontoAtendimento">Voltar</button>
        <button type="submit" class="botao-modal save_EdicaoPontoAtendimento">Salvar</button>
      </div>
    </form>
  </section>
</div>
