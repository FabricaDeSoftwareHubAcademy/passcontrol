let btn_cadastrar_servico = document.getElementById("btn_cadastrar_servico");
const apareceMod = document.getElementById("confirma_cadastrar");

const modalCadastro = document.querySelector(".fundo-container-cad-ponto-atendimento");
const modalConfirmacao = document.querySelector(".fundo-container-confirmacao-dados-registrados");

const btnCancelarCadastro = document.querySelector(".cancel_CadPontoAtend");
const btnSalvarCadastro = document.querySelector(".save_CadPontoAtend");

const btnSimConfirmacao = document.querySelector(".save_ConfDadosRegist");
const btnNaoConfirmacao = document.querySelector(".cancel_ConfDadosRegist");

const btnOkCadastrar = document.getElementById("btnOkCadastrar");

// 1. Abrir Modal de Cadastro
btn_cadastrar_servico.addEventListener("click", () => {
    modalCadastro.classList.add("show");

    // Cancelar cadastro
    btnCancelarCadastro.addEventListener("click", (event) => {
        event.preventDefault();
        modalCadastro.classList.remove("show");
    });

    // Salvar cadastro (validação + confirmação)
    btnSalvarCadastro.addEventListener("click", function (event) {
        event.preventDefault();

        // Pegando os campos
        const nome_servico = document.getElementById('nome_ponto_atendimento_cadastrar').value.trim();
        const codigo_servico = document.getElementById('codigo_ponto_atendimento_cadastrar').value.trim();
        const imagem_servico = document.getElementById('imagem_ponto_atendimento_cadastrar').value.trim();

        let erro = false;

        // Validação nome do serviço
        if (!nome_servico) {
            document.getElementById('erro_nome_servico').textContent = "Preencha o nome do serviço.";
            erro = true;
        } else {
            document.getElementById('erro_nome_servico').textContent = "";
        }

        // Validação código
        if (!codigo_servico) {
            document.getElementById('erro_codigo_servico').textContent = "Preencha o código.";
            erro = true;
        } else {
            document.getElementById('erro_codigo_servico').textContent = "";
        }

        // Validação imagem
        if (!imagem_servico) {
            document.getElementById('erro_img_servico').textContent = "Preencha a URL da imagem.";
            erro = true;
        } else {
            document.getElementById('erro_img_servico').textContent = "";
        }

        // 👉 Se houver erro, não avança
        if (erro) {
            return;
        }

        // 👉 Se tudo certo, fecha modal cadastro e abre confirmação
        modalCadastro.classList.remove("show");
        modalConfirmacao.classList.add("show");
    });

    // NÃO na confirmação → volta para o modal de cadastro
    btnNaoConfirmacao.addEventListener("click", () => {
        modalConfirmacao.classList.remove("show");
        modalCadastro.classList.add("show");
    });

    // SIM na confirmação → envia os dados para o PHP
    btnSimConfirmacao.addEventListener("click", async () => {
        const myform = document.getElementById("formulario_cadastrar");
        const formData = new FormData(myform);

        modalConfirmacao.classList.remove("show");

        try {
            const dados2_php = await fetch("../../app/actions/servico_cadastrar.php", {
                method: 'POST',
                body: formData
            });

            const response = await dados2_php.json();

            if (response.status === 'ok') {
                apareceMod.classList.add("show");
            } else {
                alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
            alert("Erro de conexão com o servidor.");
        }
    });

    // OK no sucesso → fecha tudo e recarrega
    btnOkCadastrar.addEventListener("click", () => {
        apareceMod.classList.remove("show");
        location.reload();
    });
    const inputImagem = document.getElementById('imagem_ponto_atendimento_cadastrar');
    const previewImagem = document.getElementById('preview_imagem_cadastrar');

    inputImagem.addEventListener('change', function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();

            reader.addEventListener('load', function(){
                previewImagem.setAttribute('src', this.result);
                previewImagem.style.display = 'block';
            });

            reader.readAsDataURL(file);
        } else {
            previewImagem.setAttribute('src', '#');
            previewImagem.style.display = 'none';
        }
    });
});


//////// CODIGO ANTIGO COM PROBLEMAS - INUTILIZADO/PARCIALMENTE FUNCIONAL ---NÃO USAR!!---
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
