var buttonAbrir = document.getElementById("open_editar_dados");
const modalContainerEditar = document.querySelector(".modal-editar-dados");
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