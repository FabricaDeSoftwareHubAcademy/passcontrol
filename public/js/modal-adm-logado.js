const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".close");
const buttonCancelar = document.querySelector(".cancel");
const buttonSalvar = document.querySelector(".save");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonCancelar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});
buttonSalvar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});

class Modal_ADM_Logado extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <button class="botao-modal open">Abrir Modal</button>
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Confirmação</h1>
            <hr>
            <p><b>Deseja Salvar as Edições Feitas?</b></p>
            <div class="button-group">
                <button class="botao-modal cancel">Não</button>
                <button class="botao-modal save">Sim</button>
            </div>
        </section>
    </main>`;
    }
}

customElements.define('main-modal-adm-logado', Modal_ADM_Logado);