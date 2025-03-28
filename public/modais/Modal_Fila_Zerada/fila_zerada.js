const buttonAbrir = document.querySelector(".open-fila-zerada");
const modalContainer = document.querySelector(".fundo-fila-zerada");
const buttonVoltar = document.querySelector(".voltar");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});
buttonVoltar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});