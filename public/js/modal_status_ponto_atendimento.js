
document.addEventListener("DOMContentLoaded", () => {
    const botoesAltStatus = document.querySelectorAll(".switch_status");
    const modalContainerPA = document.querySelector(".modal-inativar-pontAtend");
    const btnCancelarPA = document.getElementById("button-cancel");
    const btnConfirmarPA = document.getElementById("button-save");
    /* const modalSucesso = document.querySelector(".fundo-container-confirmacao-dados");
    const btnOk = document.querySelector(".Okay_ConfDados"); */
    
    botoesAltStatus.forEach((button) => {
        button.addEventListener("click", () => {
            let id = button.getAttribute("id_value_switch");
            
            modalContainerPA.classList.add("show");

            btnCancelarPA.addEventListener("click", () => {
                modalContainerPA.classList.remove("show");
                if (id !== null && id !== '') {
                    id = null;
                }
                // btnConfirmar.removeEventListener("click");
            });
            
            btnConfirmarPA.addEventListener("click", async function() {
                try {
                    let response = await fetch("../actions/ponto_atendimento_inativar?id_servico= " + id, {
                        method: "GET"
                    });

                    let resultado = await response.json();
                    
                    if (resultado.status == "OK") {
                        modalContainerPA.classList.remove("show");
                        modalSucesso.classList.add("show");

                        btnOk.addEventListener("click", () => {
                            modalContainerPA.classList.remove("show");
                            location.reload();
                        })
                    } else {
                        console.log(resultado);
                    }

                } catch (error) {
                    console.error("Erro na requisição: ", error);
                } 
                // finally {
                //     btnConfirmarPA.removeEventListener("click", confirmarHandler);
                // }
            });

            // btnConfirmarPA.addEventListener("click", confirmarHandler);

            
            // if (btnOk) {
                //     btnOk.addEventListener("click", () => {
            //         modalSucesso.classList.remove("show");
            //         location.reload();
            //     });
            // }
        });
    });
});





                    // document.addEventListener("DOMContentLoaded", function() {
                    //     document.querySelectorAll("#switch_status").forEach(button => {
                    //         button.addEventListener("click", function(event) {
                    //             let id_value_switch = button.getAttribute("id_value_switch");
                    //             const modalContainer = document.querySelector(".fundo_AltStatusUsu");
                    //             // const buttonCancelar = document.querySelector(".cancel");
                    //             const buttonCancelar = document.querySelector("#btn-cancelar");
                    //             const apareceMod = document.getElementById("confirma_status");
                    
                    //             modalContainer.classList.add("show");
                    
                    //             const buttonSalvar = document.querySelector("#salvar");
                    
                    //             buttonSalvar.addEventListener("click", async function(event) {
                    //                 let dados_php = await fetch("../actions/ponto_atendimento_inativar.php?id_ponto_atendimento=" + id_value_switch, {
                    //                     method: 'GET'
                    //                 });
                    
                    //                 let response = await dados_php.json();
                    //                 if (response) {
                    //                     apareceMod.classList.add("show");
                    //                     modalContainer.classList.remove("show");
                    //                 }
                    
                    //             });
                    
                    //             buttonCancelar.addEventListener("click", function() {
                    //                 console.log("Modal fechado");
                    //                 modalContainer.classList.remove("show");
                    //             });
                    //         });
                    //     });
                    
                    //     const buttonOkStatus = document.getElementById("btnOkStatus");
                    //     buttonOkStatus.addEventListener("click", function() {
                    //         const apareceMod = document.getElementById("confirma_status");
                    //         apareceMod.classList.remove("show");
                    //         location.reload();
                    //     });
                    // }); 