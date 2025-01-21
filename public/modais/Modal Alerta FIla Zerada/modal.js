const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".close");
const buttonVoltar = document.querySelector(".voltar");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});
buttonVoltar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});