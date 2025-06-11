document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#switch_status").forEach(button => {
        button.addEventListener("click", function(event) {
            let id_value_switch = button.getAttribute("id_value_switch");
            const madalContainer = document.querySelector(".modal-inativar-container");
            const buttonCancelar = document.querySelector("#btn-cancelar");
            const apareceMod = document.querySelector("confirma_status");
            const buttonSalvar = document.querySelector("#salvar");

            modalContainer.classList.add("show");

            //Remove listagem antes de adicionar outro
            const newButtonSalvar = buttonSalvar.cloneNode(true);
            buttonSalvar.parentNode.replaceChild(newButtonSalvar, buttonSalvar);

            newButtonSalvar.addEventListener("click", async function(event) {
                let dados_php = await fetch ("../actions/servico.php?id_servico=" + id_value_switch, {
                    method: 'GET'
                });

                let response = await dados_php.json();
                if (response && response.status === "OK") {
                    apareceMod.classList.add("show");
                    modalContainer.classList.remove("show");
                }
            });
            buttonCancelar.addEventListener("click", function() {
                modalContainer.classList.remove("show");
            });
        });
    });
    const buttonOKStatus = document.getElementById("btnOKStatus");
    buttonOKStatus.addEventListener("click", function() {
        const apareceMod = document.getElementById("confirmar_status");
        apareceMod.classList.remove("show");
        location.reload();
    });
});