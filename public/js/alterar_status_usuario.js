const modalConfAltStatus = document.querySelector(".fundo_AltStatusUsu");
const btnCancelAltStatus = document.querySelector(".cancel-atv-inatv");
const btnConfirmarAltStatus = document.querySelector(".save-atv-inatv");

// MODAL DE CONFIRMAÇÃO
const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");

// MODAL DE ALTERAÇÕES REALIZADAS
const modalContainer_AlertaAlteracoes = document.querySelector(".modal-container-alerta-alteracoes");
const buttonVoltar_AlertaAlteracoes = document.querySelector(".voltar_AlertaAlteracoes");

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".openInativarAtivar").forEach(button => {
        button.addEventListener("click", function () {
            let userId = this.getAttribute("data-id");

            // Abre o modal de confirmação
            modalConfAltStatus.classList.add('show');

            btnCancelAltStatus.addEventListener("click", () => {
                modalConfAltStatus.classList.remove("show");
                userId = null;
            });

            btnConfirmarAltStatus.addEventListener("click", async function(event){
                try {
                    let atualizar_dados = await fetch ('../../controller/usuario_alterar_status.php?id=' + userId, {
                        method: "GET"
                    });
            
                    let textResponse = await atualizar_dados.text();
                    let response_post = JSON.parse(textResponse);
            
                    console.log(response_post + " resposta do php");
            
                    // esconde o modal de confirmação
                    modalConfAltStatus.classList.remove('show');
            
                    // mostra o modal de alterações realizadas
                    modalContainer_ConfDados.classList.add("show");
            
                    buttonFechar_ConfDados.addEventListener("click", () => {
                        modalContainer_ConfDados.classList.remove("show");
                        location.reload();
                    });
            
                } catch (error) {
                    console.error("Erro ao analisar JSON ou falha na requisição:", error);
                    // Se quiser debuggar o texto bruto:
                    // console.log("Conteúdo não pode ser analisado como JSON.");
                }
            });
        });
    });
});
