document.addEventListener("DOMContentLoaded", function () {
    const buttonAbrir = document.querySelector("#btnteste");
    
    // Modais de ativação e inativação
    const modalContainer = document.querySelector("main-inativacao_servico");

    let atendimentoAtivo = true; // Estado inicial: ativo

    buttonAbrir.addEventListener("click", (event) => {
        event.preventDefault();
        
        // Define o texto do modal com base no estado do atendimento
        const modalText = atendimentoAtivo
            ? "Deseja Alterar Esse Serviço?"
            : "Deseja Alterar Esse Serviço?";

        modalContainer.querySelector("p b").innerText = modalText;
        
        // Exibir modal
        modalContainer.querySelector(".modal-container").classList.add("show");
    });

    const buttonCancelar = modalContainer.querySelector(".cancel");
    buttonCancelar.addEventListener("click", () => {
        modalContainer.querySelector(".modal-container").classList.remove("show");
    });

    const buttonSim = modalContainer.querySelector(".save");
    buttonSim.addEventListener("click", () => {
        // Alterna o estado do atendimento
        atendimentoAtivo = !atendimentoAtivo;

        modalContainer.querySelector(".modal-container").classList.remove("show");
    });
});

// Definição do Custom Element para o Modal
class Modal_Inativacao_Servico extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="titulo">Confirmação</h1>
            <hr class="linha">
            <p class="texto"><b>Deseja Alterar Esse Serviço?</b></p>
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
customElements.define('main-inativacao_servico', Modal_Inativacao_Servico);
