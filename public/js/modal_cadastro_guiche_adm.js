document.addEventListener("DOMContentLoaded", function() {
    const buttonAbrir = document.querySelector("#btn_cadastrar_adm");
    // const buttonAbrir2 = document.querySelector("#img_cadastrar_adm");
    
    // Acessar o modal (EXPORTADO)
    const modalContainer = document.querySelector("main-cadastro-adm");

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
class Modal_Cadastro_Guiche_Adm extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
            <section class="modal">
                <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
                <h1 class="titulo">Cadastrar Ponto de Atendimento</h1>
                <hr class="linha-horizontal">
                <div class="inf-modal">
                    <div class="container">
                        <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" class="input-text" placeholder="Ex: Guichê, Baia, IPTU...">
                    </div>
                </div>
                <div class="servico">
                    <label class="label"><b>Número / Letra</b></label>
                    <input type="text" class="input-text" placeholder="Ex: 01, 02...">
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
customElements.define('main-cadastro-adm', Modal_Cadastro_Guiche_Adm );
