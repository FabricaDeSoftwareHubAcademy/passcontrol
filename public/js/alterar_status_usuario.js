const modalConfAltStatus = document.querySelector(".fundo_AltStatusUsu");
const btnCancelAltStatus = document.querySelector(".cancel-atv-inatv");
const btnConfirmarAltStatus = document.querySelector(".save-atv-inatv");

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".openInativarAtivar").forEach(button => {
        button.addEventListener("click", async function(event) {
            event.preventDefault(); // impede o recarregamento da pagina

            let userId = this.getAttribute("data-id");
            
            // console.log(userId);

            modalConfAltStatus.classList.add('show'); 
            
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
                    location.reload();
                } catch (error) {
                    console.error("Erro ao analisar JSON: ", error);
                    console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
                }
                
                // esconde o modal
                modalConfAltStatus.classList.remove('show');
            });
        });
    });
});

btnCancelAltStatus.addEventListener("click", () => {
    modalConfAltStatus.classList.remove("show");
});

btnConfirmarAltStatus.addEventListener("click", () => {
    modalConfAltStatus.classList.remove("show");
});