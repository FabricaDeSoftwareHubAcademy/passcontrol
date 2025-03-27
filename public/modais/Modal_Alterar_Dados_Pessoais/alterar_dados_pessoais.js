var buttonAbrir = document.querySelector("open-editar-dados");
const modalContainerEditar = document.querySelector(".fundo-editar-dados");
const buttonFechar = document.querySelector(".close");
const buttonCancelar = document.querySelector(".cancel");
const buttonSalvar = document.querySelector(".save");

buttonAbrir.addEventListener("click", () => {
    modalContainerEditar.classList.add("show");
});

buttonCancelar.addEventListener("click", () => {
    modalContainerEditar.classList.remove("show");
});

buttonSalvar.addEventListener("click", () => {
    modalContainerEditar.classList.remove("show");
});