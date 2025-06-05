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
    const modalEdicao = document.querySelector(".modal-container");
    const modalConfirmacao = document.querySelector(".fundo-container-confirmacao-dados-registrados");
    const modalSucesso = document.getElementById("confirma_editar");

    const botaoOk = document.getElementById("btnOkEditar");
    const botoesEditar = document.querySelectorAll("#chamamodal");

    const botaoVoltar = document.querySelector(".cancel");
    const botaoSalvar = document.querySelector(".save");

    const botaoSim = document.querySelector(".save_ConfDadosRegist");
    const botaoNao = document.querySelector(".cancel_ConfDadosRegist");

    // Abertura do modal de edição com dados preenchidos
    botoesEditar.forEach(botao => {
        botao.addEventListener("click", async function (event) {
            event.preventDefault();

            const idServico = botao.getAttribute("id_value");

            const resposta = await fetch(`../actions/servico_editar.php?id_servico=${idServico}`);
            const dados = await resposta.json();

            document.getElementById("nome_ponto_atendimento").value = dados.nome_servico;
            document.getElementById("identificador_ponto_atendimento").value = dados.codigo_servico;
            document.getElementById("id_ponto_atendimento").value = dados.id_servico;

            modalEdicao.classList.add("show");
        });
    });

    // Clique em "Voltar" no modal de edição
    botaoVoltar.addEventListener("click", function (event) {
        event.preventDefault();
        modalEdicao.classList.remove("show");
    });

    // Clique em "Salvar" → abre modal de confirmação
    botaoSalvar.addEventListener("click", function (event) {
        event.preventDefault();
        modalEdicao.classList.remove("show");
        modalConfirmacao.classList.add("show");
    });

    // Clique em "Não" → volta para edição
    botaoNao.addEventListener("click", function () {
        modalConfirmacao.classList.remove("show");
        modalEdicao.classList.add("show");
    });

    // Clique em "Sim" → envia dados via POST → mostra modal de sucesso
    botaoSim.addEventListener("click", async function () {
        const form = document.getElementById("formulario_editar");
        const formData = new FormData(form);

        const resposta = await fetch("../actions/servico_editar.php", {
            method: "POST",
            body: formData
        });

        const resultado = await resposta.json();

        if (resultado && resultado.sucesso !== false) {
            modalConfirmacao.classList.remove("show");
            modalSucesso.classList.add("show");
        } else {
            alert("Erro ao atualizar o serviço.");
            modalConfirmacao.classList.remove("show");
        }
    });

    // Clique no botão Ok → fecha modal e recarrega a página
    botaoOk.addEventListener("click", function () {
        modalSucesso.classList.remove("show");
        location.reload();
    });
});
