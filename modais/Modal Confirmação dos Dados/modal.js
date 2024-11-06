const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".Okay");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonFechar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});
