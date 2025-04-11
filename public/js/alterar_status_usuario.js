const modalConfAltStatus = document.querySelector(".fundo_AltStatusUsu");
const btnCancelAltStatus = document.querySelector(".cancel-atv-inatv");
const btnConfirmarAltStatus = document.querySelector(".save-atv-inatv");

// MODAL DE ALTERACAO FEITA
const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");


document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".openInativarAtivar").forEach(button => {
        button.addEventListener("click", function(event) {
            // event.preventDefault(); // impede o recarregamento da pagina
            
            var userId = this.getAttribute("data-id");
            
            modalConfAltStatus.classList.add('show'); 
            
            btnCancelAltStatus.addEventListener("click", () => {
                modalConfAltStatus.classList.remove("show");
                userId = null;
                console.log(userId);
                // return null;
            });

            
            if(userId != null){
                // Fazer requisição AJAX para buscar os dados do usuário
                btnConfirmarAltStatus.addEventListener("click", async function(event){
                
                    let atualizar_dados = await fetch ('../../controller/usuario_alterar_status.php?id=' + userId, {
                        method: "GET"
                    });
                
                    // Recebe a resposta bruta do server, basicamente um debug com esteroides
                    let textResponse = await atualizar_dados.text();
                    // console.log("Resposta bruta do servidor:", textResponse);  // Mostra o que o PHP está retornando
                    
                    try {
                        let response_post = JSON.parse(textResponse);
                        console.log(response_post + " resposta do php");
                        // esconde o modal
                        modalConfAltStatus.classList.remove('show');
                        // mostra o modal de alteracao salva
                        modalContainer_ConfDados.classList.add("show");
                        buttonFechar_ConfDados.addEventListener("click", () => {
                            modalContainer_ConfDados.classList.remove("show");
                            location.reload();
                        });
                    } catch (error) {
                        // console.error("Erro ao analisar JSON: ", error);
                        // console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
                        return;
                    }
                    

                });
            }
        });
    });
});

