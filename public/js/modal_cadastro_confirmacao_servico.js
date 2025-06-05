// let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_servico");
// const apareceMod = document.getElementById("confirma_cadastrar");

// const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
// const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
// const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

// // Abrir Modal
// btn_cadastrar_guiche.addEventListener("click", () => {
//     modalContainer_CadPontoAtend.classList.add("show");
// });

// // Fechar Modal
// buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
//     event.preventDefault();
//     modalContainer_CadPontoAtend.classList.remove("show");
// });

// // Salvar Formulário
// buttonSalvar_CadPontoAtend.addEventListener("click", function (event) {
//     event.preventDefault();

//     const myform = document.getElementById("formulario_cadastrar");
//     const inputs = myform.querySelectorAll("input");
//     let formularioValido = true;

//     // Verifica se todos os campos estão preenchidos
//     inputs.forEach(inputAtual => {
//         if (inputAtual.value.trim() === "") {
//             formularioValido = false;
//         }
//     });

//     if (!formularioValido) {
//         alert("Preencha todos os campos para continuar!");
//         return;
//     }

//     modalContainer_CadPontoAtend.classList.remove("show");
//     apareceMod.classList.add("show");

//     // Adiciona o evento no botão "OK" após exibir o modal de confirmação
//     const btnOkCadastrar = document.getElementById("btnOkCadastrar");

//     if (btnOkCadastrar) {
//         btnOkCadastrar.addEventListener("click", async function handleClick() {
//             console.log("ENTROU AQUI");

//             const formData = new FormData(myform);

//             try {
//                 const dados2_php = await fetch("../../app/actions/servico_cadastrar.php", {
//                     method: 'POST',
//                     body: formData
//                 });

//                 const response = await dados2_php.json();

//                 if (response.status === 'ok') {
//                     console.log(response);
//                 } else {
//                     alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
//                 }
//             } catch (error) {
//                 console.error("Erro na requisição:", error);
//                 alert("Erro de conexão com o servidor.");
//             }

//             // Remove o listener após execução para evitar múltiplos envios
//             btnOkCadastrar.removeEventListener("click", handleClick);
//         }, { once: true });
//         } else {
//             console.warn("Botão btnOkCadastrar não encontrado.");
//         }
//     });

//     function toggleMenu() {
//         document.getElementById("mobileMenu").classList.toggle("active");
//     }

// Botões e modais
const btnAbrirCadastro = document.getElementById("btn_cadastrar_servico");
const modalCadastro = document.querySelector(".fundo-container-cad-ponto-atendimento");
const btnCancelarCadastro = document.querySelector(".cancel_CadPontoAtend");
const btnSalvarCadastro = document.querySelector(".save_CadPontoAtend");

const modalConfirmacaoSimNao = document.querySelector(".modal-inativar-container");
const btnNao = document.getElementById("btn-cancelar");
const btnSim = document.getElementById("salvar");

const modalSucesso = document.getElementById("confirma_cadastrar");
const btnOk = document.getElementById("btnOkCadastrar");

// 1. Abrir modal de cadastro
btnAbrirCadastro.addEventListener("click", () => {
    modalCadastro.classList.add("show");
});

// 2. Fechar modal de cadastro ao clicar em "Voltar"
btnCancelarCadastro.addEventListener("click", (event) => {
    event.preventDefault();
    modalCadastro.classList.remove("show");
});

// 3. Ao clicar em "Salvar" no cadastro → abre modal de confirmação
btnSalvarCadastro.addEventListener("click", (event) => {
    event.preventDefault();

    const form = document.getElementById("formulario_cadastrar");
    const inputs = form.querySelectorAll("input");
    let formValido = true;

    inputs.forEach(input => {
        if (input.value.trim() === "") {
            formValido = false;
        }
    });

    if (!formValido) {
        alert("Preencha todos os campos!");
        return;
    }

    modalCadastro.classList.remove("show");
    modalConfirmacaoSimNao.classList.add("show"); // Abre o modal de SIM/NÃO
});

// 4. Se clicar em "Não" → fecha modal de confirmação e volta para o de cadastro
btnNao.addEventListener("click", () => {
    modalConfirmacaoSimNao.classList.remove("show");
    modalCadastro.classList.add("show");
});

// 5. Se clicar em "Sim" → envia dados e mostra modal de sucesso
btnSim.addEventListener("click", async () => {
    const form = document.getElementById("formulario_cadastrar");
    const formData = new FormData(form);

    modalConfirmacaoSimNao.classList.remove("show");

    try {
        const response = await fetch("../../app/actions/servico_cadastrar.php", {
            method: "POST",
            body: formData
        });

        const resultado = await response.json();

        if (resultado.status === 'ok') {
            modalSucesso.classList.add("show");
        } else {
            alert("Erro ao cadastrar: " + (resultado.message || "Erro desconhecido"));
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao conectar com o servidor.");
    }
});

// 6. Clicar em "OK" → fecha modal de sucesso
btnOk.addEventListener("click", () => {
    modalSucesso.classList.remove("show");
});
