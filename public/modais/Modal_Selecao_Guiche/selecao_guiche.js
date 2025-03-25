const buttonAbrir = document.querySelector(".open-selecao-guiche");
const modalContainer = document.querySelector(".fundo-selecao-guiche");
const buttonConfirmar = document.querySelector(".confirm");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonConfirmar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});