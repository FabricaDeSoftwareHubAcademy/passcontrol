document.addEventListener("DOMContentLoaded", function() {
    const buttonSalvar = document.querySelector("#save_sucess");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-salvar-cad");

    buttonSalvar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.add("show");
    });

    const buttonCancelar = modalContainer.querySelector(".cancel");
    buttonCancelar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });

    const buttonSim = modalContainer.querySelector(".save");
    buttonSim.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
        window.location.href = "../../../app/admin/view/AtendentesCadastrados.php";
    });
});

class Modal_Salvar_Cadastro extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
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

customElements.define('main-salvar-cad', Modal_Salvar_Cadastro);