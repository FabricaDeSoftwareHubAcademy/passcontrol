document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector("#icone-editar");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-edicao-servico");

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
class Modal_Edição_Servico extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Cadastrar Serviços</h1>
            <hr>
            <div class="inf-modal">
                <div class="container">
                    <label><b>Código do Serviço</b></label>
                    <input type="number" placeholder="Digite o código do serviço">
                </div>
                <div class="container">
                    <label><b>Ícone</b></label>
                    <div class="file-input">
                        <input type="file" id="fileInput" class="file-input">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <div class="servico">
                <label><b>Serviço</b></label>
                <input type="text" placeholder="Digite o nome do novo serviço">
            </div>
            <div class="button-group">
                <button class="botao-modal cancel">Cancelar</button>
                <button class="botao-modal save">Salvar</button>
            </div>
        </section>
    </main>
        `;
    }
}

// Definir o Custom Element
customElements.define('main-edicao-servico', Modal_Edição_Servico);