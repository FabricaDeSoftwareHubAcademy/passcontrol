// try {
    let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");

    const modalCadastro = document.querySelector(".fundo-container-cad-ponto-atendimento");
    const btnCancelarCadastro = document.querySelector(".cancel_CadPontoAtend");
    const btnSalvarCadastro = document.querySelector(".save_CadPontoAtend");
    const modalConfirmacao = document.querySelector(".fundo-container-confirmacao-dados");
    const modalConfirmarSalvarPA = document.querySelector(".fundo-container-confirmacao-dados-registrados");
    const confirmar_salvar_dados = document.querySelector(".save_ConfDadosRegist");
    const btn_OK_cadastrado = document.querySelector(".Okay_ConfDados");

    let formDataGlobal = null;

    btn_cadastrar_guiche.addEventListener("click", () => {
        modalCadastro.classList.add("show");
        btnCancelarCadastro.addEventListener("click", (event) => {
            event.preventDefault();
            modalCadastro.classList.remove("show");
        });

        btnSalvarCadastro.addEventListener("click", (event) => {
            event.preventDefault();
            const myform = document.getElementById("formulario");
            const inputs = myform.querySelectorAll("input");
            
            let formularioValido = true;
            inputs.forEach(inputAtual => {
                if (inputAtual.value.trim() === "") {
                    formularioValido = false;
                }
            });

            if (!formularioValido) {
                alert("Preencha todos os campos para continuar!");
                return;
            }

            // Fecha o modal de cadastro e mostra o de confirmação
            modalCadastro.classList.remove("show");
            modalConfirmarSalvarPA.classList.add("show");

            confirmar_salvar_dados.addEventListener("click", async function () {
                // Guarda os dados para enviar depois
                formDataGlobal = new FormData(myform);

                if (!formDataGlobal) return;
    
                let response = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                    method: 'POST',
                    body: formDataGlobal
                });
    
                let text = await response.text();
                console.log(text);
    
                try {
                    let result = JSON.parse(text);
    
                    if (result.status === 'OK') {
                        modalConfirmarSalvarPA.classList.remove("show");
                        modalConfirmacao.classList.add("show");

                        // Redirecionar após sucesso
                        btn_OK_cadastrado.addEventListener("click", () => {
                        modalConfirmacao.classList.remove("show");
                        // location.href = "./ponto_atendimento.php";
                        location.reload();
                    });
                    } else {
                        alert("Erro: " + result.mensagem);
                    }
                } catch (e) {
                    console.error("Erro ao interpretar resposta do servidor:", e);
                    alert("Erro inesperado ao salvar.");
                }
            });
        });

    });

// } catch {
//     location.reload();
// }