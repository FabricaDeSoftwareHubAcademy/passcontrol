document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#switch_status").forEach(button => {

        button.addEventListener("click", async function(event) {

            let id_value_switch = button.getAttribute("id_value");
            const modalContainer = document.querySelector(".modal-inativar-container");
            const buttonFechar = document.querySelector(".close");
            const buttonCancelar = document.querySelector(".cancel");
            const buttonSalvar = document.querySelector(".save");
            event.preventDefault(); // impede o recarregamento da pagina


              // Fazer requisição AJAX para buscar os dados do usuário
            let dados_php = await fetch("../../classe/inativar_guiche.php?id_guiche="+id_value_switch , {
                method: 'GET'
            });

            let response = await dados_php.json();

            console.log(response);

        })

    })




        buttonAbrir.addEventListener("click", () => {
            modalContainer.classList.add("show");
        });

        buttonCancelar.addEventListener("click", () => {
            modalContainer.classList.remove("show");
        });

        buttonSalvar.addEventListener("click", () => {
            modalContainer.classList.remove("show");
        });




})