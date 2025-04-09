// Definição do Custom Element para o Modal

class Modal_Cadastro_Guiche_Adm extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div class="modal-container">
            <section class="modal">
                <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
                <h1 class="titulo">Cadastrar Ponto de Atendimento</h1>
                <hr class="linha-horizontal">
                
                <form id="formulario-cadastro" method="POST" action="../../CLASSE/cadastrar_guiche.php">
                
                    <div class="inf-modal">
                        <div class="container">
                            <label class="label"><b>Nome do Ponto de Atendimento</b></label>
                            <input type="text" id="nome_guiche_cad" name="nome_guiche" class="input-text" placeholder="Guichê">
                        </div>
                    </div>
                    <div class="servico">
                        <label class="label"><b>Número / Letra</b></label>
                        <input type="text" id="num_guiche_cad" name="num_guiche" class="input-text" placeholder="1">
                    </div>
                    <div class="button-group">
                        <button class="botao-modal cancel">Voltar</button>
                        <button type="submit" class="botao-modal save">Salvar</button>
                    </div>
                </form>
            </section>
        </div>
        `;
    }
}

customElements.define('main-cadastro-cadastro-adm', Modal_Cadastro_Guiche_Adm);


// Após o DOM carregar completamente
document.addEventListener("DOMContentLoaded", function () {
    const modalCheckInterval = setInterval(() => {
        const modalContainer = document.querySelector("main-cadastro-cadastro-adm");
        if (modalContainer && modalContainer.querySelector(".modal-container")) {
            clearInterval(modalCheckInterval);

            const buttonAbrir = document.querySelector("#btn_cadastrar_adm");
            const buttonAbrir2 = document.querySelector("#img_cadastrar_adm");
            const modal = modalContainer.querySelector(".modal-container");
            const formulario = modal.querySelector("#formulario-cadastro");

            const buttonCancelar = modal.querySelector(".cancel");
            const buttonSim = modal.querySelector(".save");

            const abrirModal = (e) => {
                e.preventDefault();
                modal.classList.add("show");
            };

            buttonAbrir?.addEventListener("click", abrirModal);
            buttonAbrir2?.addEventListener("click", abrirModal);

            buttonCancelar?.addEventListener("click", () => {
                modal.classList.remove("show");
            });

            buttonSim?.addEventListener("click", () => {
                formulario.submit();

                modal.classList.remove("show");
            });
        }
    }, 50); // Checa a cada 50ms até o modal estar pronto
});


