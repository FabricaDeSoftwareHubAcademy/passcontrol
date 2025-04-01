const buttonAbrir = document.querySelector(".open-confirmacao-senha");
const modalContainer = document.querySelector(".fundo-container-confirmacao-senha");
const buttonFechar = document.querySelector(".Okay");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonFechar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});