/* document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#switch_status").forEach(button => {
        button.addEventListener("click", function(event) {
            let id_value_switch = button.getAttribute("id_value_switch");
            const modalContainer = document.querySelector(".modal-inativar-container");
            // const buttonCancelar = document.querySelector(".cancel");
            const buttonCancelar = document.querySelector("#btn-cancelar");
            const apareceMod = document.getElementById("confirma_status");

            modalContainer.classList.add("show");

            const buttonSalvar = document.querySelector("#salvar");

            buttonSalvar.addEventListener("click", async function(event) {
                let dados_php = await fetch("../actions/ponto_atendimento_inativar.php?id_ponto_atendimento=" + id_value_switch, {
                    method: 'GET'
                });

                let response = await dados_php.json();
                if (response) {
                    apareceMod.classList.add("show");
                    modalContainer.classList.remove("show");
                }

            });

            buttonCancelar.addEventListener("click", function() {
                console.log("Modal fechado");
                modalContainer.classList.remove("show");
            });
        });
    });

    const buttonOkStatus = document.getElementById("btnOkStatus");
    buttonOkStatus.addEventListener("click", function() {
        const apareceMod = document.getElementById("confirma_status");
        apareceMod.classList.remove("show");
        location.reload();
    });
}); */

document.addEventListener("DOMContentLoaded", () => {
    const botoesStatus = document.querySelectorAll(".switch_status");
    const modalContainer = document.querySelector(".modal-inativar-pontAtend");
    const btnCancelar = document.getElementById("button-cancel");
    const btnConfirmar = document.getElementById("button-save");
    /* const modalSucesso = document.querySelector(".fundo-container-confirmacao-dados");
    const btnOk = document.querySelector(".Okay_ConfDados"); */
    
    botoesStatus.forEach((button) => {
        button.addEventListener("click", () => {
            let id = button.getAttribute("id_value_switch");
            
            modalContainer.classList.add("show");

            btnCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
                if (id !== null && id !== '') {
                    id = null;
                }
                // btnConfirmar.removeEventListener("click");
            });
            
            btnConfirmar.addEventListener("click", async function() {
                try {
                    let response = await fetch("../actions/ponto_atendimento_inativar?id_servico= " + id, {
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
                // finally {
                //     btnConfirmar.removeEventListener("click", confirmarHandler);
                // }
            });

            // btnConfirmar.addEventListener("click", confirmarHandler);

           
            // if (btnOk) {
            //     btnOk.addEventListener("click", () => {
            //         modalSucesso.classList.remove("show");
            //         location.reload();
            //     });
            // }
        });
    });
});