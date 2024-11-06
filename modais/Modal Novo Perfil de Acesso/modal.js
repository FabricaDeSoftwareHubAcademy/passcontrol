const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".close");
const buttonCancelar = document.querySelector(".cancel");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonCancelar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});
