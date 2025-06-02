// Teste
document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector("#chm-intervalo");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-tela-de-login");

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
class Modal_Tela_De_Login extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Confirmação</h1>
            <hr>
            <p id="horario"><b>12:00</b></p>
            <p><b>Iniciar o Período de Intervalo?</b></p>
            <div class="button-group">
                <button class="botao-modal cancel">Não</button>
                <button class="botao-modal save">Sim</button>
            </div>
        </section>
        </main>
        `;
    }
}

// Definir o Custom Element
customElements.define('main-tela-de-login', Modal_Tela_De_Login);