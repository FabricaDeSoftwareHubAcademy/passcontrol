const buttonAbrir = document.querySelector(".open-cad-ponto-atendimento");
const modalContainer = document.querySelector(".fundo-container-cad-ponto-atendimento");
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