class Modal_Editar_PontoAtendimento extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Cadastrar Ponto de Atendimento</h1>
            <hr>
            <div class="inf-modal">
                <div class="container">
                    <label><b>Nome do Ponto de Atendimento</b></label>
                    <input type="text" placeholder="Ex: Guichê, Baia, IPTU...">
                </div>
            </div>
            <div class="servico">
                <label><b>Número / Letra</b></label>
                <input type="text" placeholder="Ex: 01, 02...">
            </div>
            <div class="button-group">
                <button class="botao-modal cancel">Voltar</button>
                <button class="botao-modal save">Salvar</button>
            </div>
        </section>
    </main>
    `;
    }
}

customElements.define('', Modal_Editar_PontoAtendimento);