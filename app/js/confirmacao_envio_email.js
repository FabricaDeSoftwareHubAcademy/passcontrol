const buttonAbrir_ConfSenha = document.querySelector(".open-confirmacao-senha");
const modalContainer_ConfSenha = document.querySelector(".fundo-container-confirmacao-senha");
const buttonFechar_ConfSenha = document.querySelector(".Okay_ConfSenha");
const cpfInput = document.querySelector("#cpf");

// Cria elemento para mensagem de erro, se não existir ainda
let msgErro = document.createElement("p");
msgErro.id = "cpf_msg";
msgErro.style.color = "red";
msgErro.style.textAlign = "left";
msgErro.style.marginTop = "10px";
msgErro.style.fontSize = "0.9rem";
msgErro.style.display = "none";
cpfInput.parentNode.appendChild(msgErro);

if (buttonAbrir_ConfSenha && modalContainer_ConfSenha && buttonFechar_ConfSenha) {

    buttonAbrir_ConfSenha.addEventListener("click", async (event) => {
        event.preventDefault();

        const cpf = cpfInput.value.trim();

        // Verifica se CPF foi preenchido
        if (!cpf) {
            msgErro.textContent = "Por favor, preencha o campo CPF.";
            msgErro.style.display = "block";
            return;
        }

        msgErro.style.display = "none";

        let form_rec_senha = document.querySelector("#form_rec_senha");
        let formulario = new FormData(form_rec_senha);

        let dados_php = await fetch("../actions/envio_email_recuperar_senha.php", {
            method: "POST",
            body: formulario
        });

        let response = await dados_php.json();

        console.log("Resposta do PHP:", response);

        if (response.status === 200) {
            // Exibe o modal de confirmação
            modalContainer_ConfSenha.classList.add("show");
        } else {
            alert("Erro ao enviar o e-mail. Por favor, tente novamente.");
        }
    });

    // Fecha o modal e redireciona
    buttonFechar_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.remove("show");
        window.location.href = "../../app/view/recuperar_senha_codigo.php";
    });

    // Esconde a mensagem de erro ao digitar
    cpfInput.addEventListener("input", () => {
        msgErro.style.display = "none";
    });

} else {
    console.warn("Elementos do modal não encontrados. Verifique as classes no HTML.");
}