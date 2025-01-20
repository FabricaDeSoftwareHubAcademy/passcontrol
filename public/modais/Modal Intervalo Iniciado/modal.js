const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".close");
const buttonRetornar = document.querySelector(".return");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});
buttonRetornar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});