document.addEventListener("DOMContentLoaded", function() {
    // Acessar o botão que vai abrir o modal
    const buttonAbrir = document.querySelector(".botao-lateal-navegacao .texto-bott");

    // Acessar o modal (exportado)
    const modalContainer = document.querySelector("main-saida-principal");

    // Abrir o modal ao clicar no botão "Sair"
    buttonAbrir.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.add("show");
    });

    // Acessar os botões de "Cancelar" e "Sim" no modal
    const buttonCancelar = modalContainer.querySelector(".cancel");
    buttonCancelar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });

    const buttonSim = modalContainer.querySelector(".save");
    buttonSim.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
        // Redireciona para a página de login (index.php)
        window.location.href = "../../../index.php";
    });
});

// Definição do Custom Element para o Modal de Confirmação de Sair
class Modal_Saida_Principal extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
            <section class="modal">
                <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
                <h1>Confirmação</h1>
                <hr>
                <p><b>Deseja Realmente Sair do Sistema?</b></p>
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
customElements.define('main-saida-principal', Modal_Saida_Principal);