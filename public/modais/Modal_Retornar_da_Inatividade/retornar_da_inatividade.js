const buttonAbrir = document.querySelector(".open-retornar-da-inatividade");
const modalContainer = document.querySelector(".fundo-retornar-da-inatividade");
const buttonFechar = document.querySelector(".close");
const buttonCancelar = document.querySelector(".cancel");
const buttonSalvar = document.querySelector(".save");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonCancelar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});

buttonSalvar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});