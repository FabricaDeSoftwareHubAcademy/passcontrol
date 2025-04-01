const buttonAbrir = document.querySelector(".open-inativacao-guiche");
const modalContainer = document.querySelector(".fundo-inativacao-guiche");
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