const buttonAbrir_ConfSenha = document.querySelector(".open-confirmacao-senha");
const modalContainer_ConfSenha = document.querySelector(".fundo-container-confirmacao-senha");
const buttonFechar_ConfSenha = document.querySelector(".Okay_ConfSenha");

buttonAbrir_ConfSenha.addEventListener("click", () => {
    modalContainer_ConfSenha.classList.add("show");
});

buttonFechar_ConfSenha.addEventListener("click", () => {
    modalContainer_ConfSenha.classList.remove("show");
});