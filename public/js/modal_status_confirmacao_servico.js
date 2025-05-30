document.addEventListener("DOMContentLoaded", function() {
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
});