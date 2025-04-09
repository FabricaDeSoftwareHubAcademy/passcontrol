document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector(".actions");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-atendimento-cadastrado");

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
class Modal_Atendimento_Cadastrado extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Editar Ponto de Atendimento</h1>
            <hr>
            <div class="inf-modal">
                <div class="container">
                    <label><b>Nome do Ponto de Atendimento</b></label>
                    <input type="text" placeholder="Guichê">
                </div>
            </div>
            <div class="servico">
                <label><b>Número / Letra</b></label>
                <input type="text" placeholder="1">
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
customElements.define('main-atendimento-cadastrado', Modal_Atendimento_Cadastrado);