const btn_cadastrar_guiche = document.getElementById("btn_cadastrar_servico");
const modalConfirmaCadastrar = document.getElementById("confirma_cadastrar");

const modalCadastro = document.querySelector(".fundo-container-cad-ponto-atendimento");
const modalConfirmacao = document.querySelector(".fundo-container-confirmacao-dados-registrados");

const btnCancelarCadastro = document.querySelector(".cancel_CadPontoAtend");
const btnSalvarCadastro = document.querySelector(".save_CadPontoAtend");

const btnSimConfirmacao = document.querySelector(".save_ConfDadosRegist");
const btnNaoConfirmacao = document.querySelector(".cancel_ConfDadosRegist");

const btnOkCadastrar = document.getElementById("btnOkCadastrar");

// ... (restante do código)

// Dentro do evento do botão "Sim":
if (btnSimConfirmacao && modalConfirmacao && modalConfirmaCadastrar) {
    btnSimConfirmacao.addEventListener("click", async () => {
        // ...
        if (response.status === 'ok') {
            modalConfirmaCadastrar.classList.add("show");
        } else {
            alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
        }
    });
}

// Botão OK finaliza
if (btnOkCadastrar && modalConfirmaCadastrar) {
    btnOkCadastrar.addEventListener("click", () => {
        modalConfirmaCadastrar.classList.remove("show");
        location.reload();
    });
}
