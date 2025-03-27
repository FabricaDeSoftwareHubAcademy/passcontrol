const buttonAbrir = document.querySelector(".open-intervalo");
const modalContainer = document.querySelector(".fundo-intervalo");
const buttonFechar = document.querySelector(".close");
const buttonRetornar = document.querySelector(".return");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});
buttonRetornar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});