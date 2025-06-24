const buttonAbrir_ConfSenha = document.querySelector(".open-confirmacao-senha");
const modalContainer_ConfSenha = document.querySelector(".fundo-container-confirmacao-senha");
const buttonFechar_ConfSenha = document.querySelector(".Okay_ConfSenha");

if (buttonAbrir_ConfSenha && modalContainer_ConfSenha && buttonFechar_ConfSenha) {
  
    buttonAbrir_ConfSenha.addEventListener("click", async (event) => {

        event.preventDefault();
    
       let form_rec_senha = document.querySelector("#form_rec_senha");
       let formulario = new FormData(form_rec_senha);
       
       let dados_php = await fetch("../actions/envio_email_recuperar_senha.php", {
        method: "POST",
        body: formulario
       });

        let response = await dados_php.json();
        if (response.status === 200) {
            // Exibe o modal de confirmação
            modalContainer_ConfSenha.classList.add("show");
        } else {
            // Exibe uma mensagem de erro, se necessário
            alert("Erro ao enviar o e-mail. Por favor, tente novamente.");
        }

    });

  
    buttonFechar_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.remove("show");
        window.location.href = "../../app/view/recuperar_senha_codigo.php";
    });
} else {
    console.warn("Elementos do modal não encontrados. Verifique as classes no HTML.");
}
