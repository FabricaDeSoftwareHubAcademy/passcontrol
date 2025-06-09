/* const buttonAbrir_CadPontoAtend = document.querySelector(".open-cad-ponto-atendimento");
const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
const buttonFechar_CadPontoAtend = document.querySelector(".close_CadPontoAtend");
const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

buttonAbrir_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.add("show");
});

buttonCancelar_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.remove("show");
});

buttonSalvar_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.remove("show");
}); */

let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");
    const apareceMod = document.getElementById("confirma_cadastrar");

    const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
    const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
    const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

    // Abrir Modal
    btn_cadastrar_guiche.addEventListener("click", () => {
        modalContainer_CadPontoAtend.classList.add("show");
    });

    // Fechar Modal
    buttonCancelar_CadPontoAtend.addEventListener("click", (event) => {
        event.preventDefault();
        modalContainer_CadPontoAtend.classList.remove("show");
    });

    // Salvar Formulário
    buttonSalvar_CadPontoAtend.addEventListener("click", function (event) {
        event.preventDefault();

        const myform = document.getElementById("formulario_cadastrar");
        const inputs = myform.querySelectorAll("input");
        let formularioValido = true;

        // Verifica se todos os campos estão preenchidos
        inputs.forEach(inputAtual => {
            if (inputAtual.value.trim() === "") {
                formularioValido = false;
            }
        });

        if (!formularioValido) {
            alert("Preencha todos os campos para continuar!");
            return;
        }

        modalContainer_CadPontoAtend.classList.remove("show");
        apareceMod.classList.add("show");

        // Adiciona o evento no botão "OK" após exibir o modal de confirmação
        const btnOkCadastrar = document.getElementById("btnOkCadastrar");

        if (btnOkCadastrar) {
            btnOkCadastrar.addEventListener("click", async function handleClick() {
                console.log("ENTROU AQUI");

                const formData = new FormData(myform);

                try {
                    const dados2_php = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                        method: 'POST',
                        body: formData
                    });

                    const response = await dados2_php.json();

                    if (response.status === 'ok') {
                        window.location.href = "../";
                    } else {
                        alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
                    }
                } catch (error) {
                    console.error("Erro na requisição:", error);
                    alert("Erro de conexão com o servidor.");
                }

                // Remove o listener após execução para evitar múltiplos envios
                btnOkCadastrar.removeEventListener("click", handleClick);
            }, { once: true });
        } else {
            console.warn("Botão btnOkCadastrar não encontrado.");
        }
    });

    function toggleMenu() {
        document.getElementById("mobileMenu").classList.toggle("active");
    }