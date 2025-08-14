let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");
let formDataGlobal = null;

btn_cadastrar_guiche.addEventListener("click", () => {
    document.querySelector(".fundo-container-cad-ponto-atendimento").classList.add("show");
    document.querySelector(".cancel_CadPontoAtend").addEventListener("click", (event) => {
        event.preventDefault();
        document.querySelector(".fundo-container-cad-ponto-atendimento").classList.remove("show");
    });

    document.querySelector(".save_CadPontoAtend").addEventListener("click", (event) => {
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
        document.querySelector(".fundo-container-cad-ponto-atendimento").classList.remove("show");
        document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.add("show");

        document.querySelector(".save_ConfDadosRegist").addEventListener("click", async function () {
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
                    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
                    document.querySelector(".fundo-container-confirmacao-dados").classList.add("show");

                    // Redirecionar após sucesso
                    document.querySelector(".Okay_ConfDados").addEventListener("click", () => {
                        document.querySelector(".fundo-container-confirmacao-dados").classList.remove("show");
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