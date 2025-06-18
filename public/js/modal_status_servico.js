document.addEventListener("DOMContentLoaded", () => {
    const botoesStatus = document.querySelectorAll(".switch_status");
    const modalContainer = document.querySelector(".modal-inativar-container");
    const btnCancelar = document.getElementById("btn-cancelar");
    const btnConfirmar = document.getElementById("salvar");
    
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
                // btnConfirmar.removeEventListener("click");
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



//////// CODIGO ANTIGO COM PROBLEMAS - INUTILIZADO/PARCIALMENTE FUNCIONAL ---NÃO USAR!!---
// document.addEventListener('DOMContentLoaded', function (){
//     const modalContainer = document.querySelector('[data-nome-modal="status-servico"]');
//     const btnCancelar = modalContainer.querySelector("#btn-cancelar");
//     const btnConfirmar = modalContainer.querySelector("#salvar");
//     const modalSucesso = document.getElementById("sucesso-status");
//     const btnOk = document.getElementById("btnOKStatus");

//     let idSelecionado = null;

//     document.querySelectorAll(".switch_status").forEach(button => {
//         button.addEventListener("click", function () {
//             idSelecionado = this.getAttribute("id_value_switch");
//             modalContainer.classList.add("show");
//         });
//     });
//     btnCancelar.addEventListener("click", () => {
//         modalContainer.classList.remove("show");
//     });
//     btnConfirmar.addEventListener("click", async () => {
//         try{
//             const response = await fetch('../../actions/status_servico.php?id_servico=${idSelecionado}');
//             const resultado = await response.json();

//             if (resultado.status === "OK") {
//                 modalContainer.classList.remove("show");
//                 modalSucesso.classList.add("show");
//             }else{
//                 alert("Ocorreu um erro ao atualizar o status");
//             }
//         } catch (error) {
//             console.error("Erro na requisição: ", error);
//             alert("Falha na conexão com o servidor.");
//         }
//     });
//     btnOk.addEventListener("click", () => {
//         modalSucesso.classList.remove("show");
//         this.location.reload();
//     });
// });
