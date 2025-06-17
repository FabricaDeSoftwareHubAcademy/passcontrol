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

document.addEventListener("DOMContentLoaded", () => {
    const botoesStatus = document.querySelectorAll(".switch_status");

    botoesStatus.forEach((button) => {
        button.addEventListener("click", () => {
            const id = button.getAttribute("id_value_switch");
            const modalContainer = document.querySelector(".modal-inativar-container");
            const btnCancelar = document.getElementById("btn-cancelar");
            const btnConfirmar = document.getElementById("salvar");
            const modalSucesso = document.getElementById("confirma_status");

            modalContainer.classList.add("show");

            const confirmarHandler = async () => {
                try {
                    const response = await fetch(`../../app/actions/status_servico.php?id_servico=${id}`);

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const resultado = await response.json();

                    if (resultado.status === "OK") {
                        modalContainer.classList.remove("show");
                        modalSucesso.classList.add("show");
                    } else {
                        alert("Erro ao atualizar o status.");
                    }

                } catch (error) {
                    console.error("Erro na requisição: ", error);
                    alert("Falha na conexão com o servidor.");
                } finally {
                    btnConfirmar.removeEventListener("click", confirmarHandler);
                }
            };

            btnConfirmar.addEventListener("click", confirmarHandler);

            btnCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
                btnConfirmar.removeEventListener("click", confirmarHandler);
            });

            const btnOk = document.getElementById("btnOkStatus");
            if (btnOk) {
                btnOk.addEventListener("click", () => {
                    modalSucesso.classList.remove("show");
                    location.reload();
                });
            }
        });
    });
});
