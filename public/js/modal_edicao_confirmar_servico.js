document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll("#chamamodal").forEach(button => {

        button.addEventListener("click", async function(event) {
            
            let id_value = button.getAttribute("id_value");

            const modalContainer = document.querySelector(".modal-container");
            const buttonFechar = document.querySelector(".close");
            const buttonCancelar = document.querySelector(".cancel");
            const buttonSalvar = document.querySelector(".save");
            const apareceMod = document.getElementById("confirma_editar");

            event.preventDefault(); // impede o recarregamento da pagina


            // Fazer requisição para buscar os dados do serviço
            let dados_php = await fetch("../actions/servico_editar.php?id_servico="+id_value , {
                method: 'GET'
            });

            let response = await dados_php.json();

            console.log(response);
    
            document.getElementById("nome_ponto_atendimento").value = response.nome_servico;
            document.getElementById("identificador_ponto_atendimento").value = response.codigo_servico;
            document.getElementById("id_ponto_atendimento").value = response.id_servico; 
            
            modalContainer.classList.add("show");

            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });


            buttonSalvar.addEventListener("click", async(event) => {

                    event.preventDefault(); // impede o recarregamento da pagina

                    myform = document.getElementById("formulario_editar");

                    const formData = new FormData(myform);

                    let dados2_php = await fetch("../actions/servico_editar.php",{
                        method:'POST',
                        body:formData
                    })

                    let response2 = await dados2_php.json();
                if (response) {
                    apareceMod.classList.add("show");
                    modalContainer.classList.remove("show");
                }

                console.log(response);
            });

            buttonCancelar.addEventListener("click", function() {
                modalContainer.classList.remove("show");
            });
        });
    });

    const buttonOkEditar = document.getElementById("btnOkEditar");
    buttonOkEditar.addEventListener("click", function() {
        const apareceMod = document.getElementById("confirma_editar");
        apareceMod.classList.remove("show");
        location.reload();
    });
});

