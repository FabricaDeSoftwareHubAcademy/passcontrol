const buttonAbrir = document.querySelector(".open-confirmacao-dados");
const modalContainer = document.querySelector(".fundo-container-confirmacao-dados");
const buttonFechar = document.querySelector(".Okay");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonFechar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});