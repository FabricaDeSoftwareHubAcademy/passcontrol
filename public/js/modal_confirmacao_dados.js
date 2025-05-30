const buttonAbrir_ConfDados = document.querySelector(".open-confirmacao-dados");
const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");

buttonAbrir_ConfDados.addEventListener("click", () => {
    modalContainer_ConfDados.classList.add("show");
});

buttonFechar_ConfDados.addEventListener("click", () => {
    modalContainer_ConfDados.classList.remove("show");
});