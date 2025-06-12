document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".switch_status").forEach(button => {
        button.addEventListener("click", function () {
            const id = this.getAttribute("id_value_switch");
            const modalContainer = document.querySelector(".modal-inativar-container");
            const btnCancelar = document.querySelector("#btn-cancelar");
            const btnConfirmar = document.querySelector("#salvar");
            const modalSucesso = document.getElementById("confirma_status");

            modalContainer.classList.add("show");

            const confirmarHandler = async function () {
                const response = await fetch(`../../app/actions/status_servico.php?id_servico=${id}`);
                const resultado = await response.json();

                if (resultado.status === "OK") {
                    modalContainer.classList.remove("show");
                    modalSucesso.classList.add("show");
                }

                btnConfirmar.removeEventListener("click", confirmarHandler);
            };

            btnConfirmar.addEventListener("click", confirmarHandler);

            btnCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });

            document.getElementById("btnOkStatus").addEventListener("click", () => {
                modalSucesso.classList.remove("show");
                location.reload();
            });
        });
    });
});
