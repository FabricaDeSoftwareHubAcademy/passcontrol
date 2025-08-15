document.addEventListener("DOMContentLoaded", () => {
    const botoesStatus = document.querySelectorAll(".switch_status");
    const modalContainer = document.querySelector(".fundo_AltStatusUsu");
    const btnCancelar = document.querySelector(".cancel-atv-inatv");
    const btnConfirmar = document.querySelector(".save-atv-inatv");
    
    const modalSucesso = document.querySelector(".fundo-container-confirmacao-dados");
    const btnOk = document.querySelector(".Okay_ConfDados");
    
    botoesStatus.forEach((button) => {
        button.addEventListener("click", () => {
            let id = button.getAttribute("id_value_switch");
            
            modalContainer.classList.add("show");

            btnCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
                if (id !== null && id !== '') {
                    id = null;
                }
            });
            
            btnConfirmar.addEventListener("click", async function() {
                try {
                    let response = await fetch("../actions/status_servico.php?id_servico= " + id, {
                        method: "GET"
                    });

                    let resultado = await response.json();

                    if (resultado.status == "OK") {
                        modalContainer.classList.remove("show");
                        modalSucesso.classList.add("show");

                        btnOk.addEventListener("click", () => {
                            modalContainer.classList.remove("show");
                            location.reload();
                        })
                    } else {
                        console.log(resultado);
                    }

                } catch (error) {
                    console.error("Erro na requisição: ", error);
                } 
            });
        });
    });
});