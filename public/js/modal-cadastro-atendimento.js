document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector("#btn-cadastro");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-cadastro-atendimento");

    buttonAbrir.addEventListener("click", (event) => {
        event.preventDefault();
        modalContainer.querySelector(".modal-container").classList.add("show");
    });

    const buttonCancelar = modalContainer.querySelector(".cancel");
    buttonCancelar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });

    const buttonSim = modalContainer.querySelector(".save");
    buttonSim.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });
});

// Definição do Custom Element para o Modal
class Modal_Cadastro_Atendimento extends HTMLElement {
    connectedCallback() {
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

// Definir o Custom Element
customElements.define('main-cadastro-atendimento', Modal_Cadastro_Atendimento);