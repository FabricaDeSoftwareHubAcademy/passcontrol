const buttonAbrir = document.querySelector(".abrir-senha-gerada");
const modalContainer = document.querySelector(".fundo-senha-gerada");
const buttonFechar = document.querySelector(".Okay");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonFechar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});