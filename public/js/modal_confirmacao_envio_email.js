const buttonAbrir_ConfSenha = document.querySelector(".open-confirmacao-senha");
const modalContainer_ConfSenha = document.querySelector(".fundo-container-confirmacao-senha");
const buttonFechar_ConfSenha = document.querySelector(".Okay_ConfSenha");

if (buttonAbrir_ConfSenha && modalContainer_ConfSenha && buttonFechar_ConfSenha) {
  
    buttonAbrir_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.add("show");
    });

  
    buttonFechar_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.remove("show");
        window.location.href = "../../app/view/recuperar_senha_codigo.php";
    });
} else {
    console.warn("Elementos do modal não encontrados. Verifique as classes no HTML.");
}
