document.addEventListener("DOMContentLoaded", function () {
    const buttonAbrir = document.querySelector("#button-action");
    
    // Modais de ativação e inativação
    const modalContainer = document.querySelector("main-inativacao_atendimento-cadastrado");

    let atendimentoAtivo = true; // Estado inicial: ativo

    buttonAbrir.addEventListener("click", (event) => {
        event.preventDefault();
        
        // Define o texto do modal com base no estado do atendimento
        const modalText = atendimentoAtivo
            ? "Deseja Inativar Esse Guichê?"
            : "Deseja Ativar Esse Guichê?";

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
class Modal_Inativacao_Atendimento_Cadastrado extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <main class="modal-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1>Confirmação</h1>
            <hr>
            <p><b>Deseja Inativar Esse Guichê?</b></p> <!-- O texto será alterado dinamicamente -->
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
customElements.define('main-inativacao_atendimento-cadastrado', Modal_Inativacao_Atendimento_Cadastrado);
