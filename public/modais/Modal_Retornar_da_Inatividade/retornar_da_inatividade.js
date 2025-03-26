const buttonAbrir = document.querySelector(".open-retornar-da-inatividade");
const modalContainer = document.querySelector(".fundo-retornar-da-inatividade");
const buttonSair = document.querySelector(".sair");
const buttonConfirma = document.querySelector(".confirma");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonSair.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});

buttonConfirma.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});