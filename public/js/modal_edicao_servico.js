// document.addEventListener("DOMContentLoaded", function() {
//     document.querySelectorAll("#chamamodal").forEach(button => {

//         button.addEventListener("click", async function(event) {
            
//             let id_value = button.getAttribute("id_value");

//             const modalContainer = document.querySelector(".modal-container");
//             const buttonFechar = document.querySelector(".close");
//             const buttonCancelar = document.querySelector(".cancel");
//             const buttonSalvar = document.querySelector(".save");
//             const apareceMod = document.getElementById("confirma_editar");

//             event.preventDefault(); // impede o recarregamento da pagina


//             // Fazer requisição para buscar os dados do serviço
//             let dados_php = await fetch("../actions/servico_editar.php?id_servico="+id_value , {
//                 method: 'GET'
//             });

//             let response = await dados_php.json();

//             console.log(response);
    
//             document.getElementById("nome_ponto_atendimento").value = response.nome_servico;
//             document.getElementById("identificador_ponto_atendimento").value = response.codigo_servico;
//             document.getElementById("id_ponto_atendimento").value = response.id_servico; 
            
//             modalContainer.classList.add("show");

//             buttonCancelar.addEventListener("click", () => {
//                 modalContainer.classList.remove("show");
//             });


//             buttonSalvar.addEventListener("click", async(event) => {

//                     event.preventDefault(); // impede o recarregamento da pagina

//                     myform = document.getElementById("formulario_editar");

//                     const formData = new FormData(myform);

//                     let dados2_php = await fetch("../actions/servico_editar.php",{
//                         method:'POST',
//                         body:formData
//                     })

//                     let response2 = await dados2_php.json();
//                 if (response) {
//                     apareceMod.classList.add("show");
//                     modalContainer.classList.remove("show");
//                 }

//                 console.log(response);
//             });

//             buttonCancelar.addEventListener("click", function() {
//                 modalContainer.classList.remove("show");
//             });
//         });
//     });

//     const buttonOkEditar = document.getElementById("btnOkEditar");
//     buttonOkEditar.addEventListener("click", function() {
//         const apareceMod = document.getElementById("confirma_editar");
//         apareceMod.classList.remove("show");
//         location.reload();
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    let dadosOriginais = {}; // Para comparar alterações
    let formAlterado = false;

    document.querySelectorAll(".chamamodal").forEach(button => {
        button.addEventListener("click", async function (event) {
            event.preventDefault();

            let id_value = button.getAttribute("id_value");

            const modalContainer = document.querySelector(".modal-container");
            const buttonCancelar = document.querySelector(".cancel");
            const buttonSalvar = document.querySelector(".save");

            // Buscar os dados do serviço
            let dados_php = await fetch("../actions/servico_editar.php?id_servico=" + id_value, {
                method: 'GET'
            });

            let response = await dados_php.json();
            console.log(response);

            // Preenche os campos e armazena os dados originais
            const inputNome = document.getElementById("nome_ponto_atendimento");
            const inputCodigo = document.getElementById("identificador_ponto_atendimento");
            const inputId = document.getElementById("id_ponto_atendimento");

            inputNome.value = response.nome_servico;
            inputCodigo.value = response.codigo_servico;
            inputId.value = response.id_servico;

            dadosOriginais = {
                nome: response.nome_servico.trim(),
                codigo: response.codigo_servico.trim()
            };

            modalContainer.classList.add("show");

            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });

            buttonSalvar.onclick = function (e) {
                e.preventDefault();

                const nomeAtual = inputNome.value.trim();
                const codigoAtual = inputCodigo.value.trim();

                // Verifica se houve alteração
                if (
                    nomeAtual === dadosOriginais.nome &&
                    codigoAtual === dadosOriginais.codigo
                ) {
                    alert("Nenhuma alteração foi feita nos dados.");
                    return;
                }

                // Se houve alteração, abre o modal de confirmação
                document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.add("show");
                modalContainer.classList.remove("show");
                formAlterado = true;
            };
        });
    });

    // Botão "Não" no modal de confirmação
    document.querySelector(".cancel_ConfDadosRegist").addEventListener("click", function () {
        document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
        document.querySelector(".modal-container").classList.add("show");
    });

    // Botão "Sim" no modal de confirmação
    document.querySelector(".save_ConfDadosRegist").addEventListener("click", async function () {
        if (!formAlterado) return;

        const myform = document.getElementById("formulario_editar");
        const formData = new FormData(myform);

        let dados2_php = await fetch("../actions/servico_editar.php", {
            method: 'POST',
            body: formData
        });

        let response2 = await dados2_php.json();
        console.log(response2);

        if (response2) {
            document.getElementById("confirma_editar").classList.add("show");
        }

        // Fecha modal de confirmação
        document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
    });

    // Botão OK no modal final
    const buttonOkEditar = document.getElementById("btnOkEditar");
    buttonOkEditar.addEventListener("click", function () {
        document.getElementById("confirma_editar").classList.remove("show");
        location.reload();
    });
});


