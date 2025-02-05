document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector(".botao--guiche-area-chamada");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-proxima-senha");

    buttonAbrir.addEventListener("click", (event) => {
        event.preventDefault();
        modalContainer.querySelector(".modal-container").classList.add("show");
    });

    const buttonCancelar = modalContainer.querySelector(".ausente");
    buttonCancelar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });

    const buttonSim = modalContainer.querySelector(".presente");
    buttonSim.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });
});

// Definição do Custom Element para o Modal
class Modal_Proxima_Senha extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Confirmar Presença</h1>
            <hr>
            <p class="desk-info"><b>Guichê 1</b></p>
            <p class="name"><b>João Guilherme Ortigosa</b></p>
            <p class="info"><b>Senha:</b> <span class="senha">CM 001</span></p>
            <p class="info"><b>Serviço:</b> <strong>IPTU</strong></p>
            <div class="button-group">
                <button class="botao-modal ausente">Ausente</button>
                <button class="botao-modal presente">Presente</button>
            </div>
            <button class="botao-modal chamar">Chamar Novamente</button>
        </section>
        </main>
        `;
    }
}

// Definir o Custom Element
customElements.define('main-proxima-senha', Modal_Proxima_Senha);