const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonConfirmar = document.querySelector(".confirm");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonConfirmar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});