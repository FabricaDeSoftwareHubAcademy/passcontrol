const buttonAbrir = document.querySelector(".abrirConsultarFila");
const modalContainer = document.querySelector(".fundo-consultar-fila");
const buttonFechar = document.querySelector(".close");
const buttonRetornar = document.querySelector(".return");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonRetornar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});