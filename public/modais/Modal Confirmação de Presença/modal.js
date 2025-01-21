const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonAusente = document.querySelector(".ausente");
const buttonPresente = document.querySelector(".presente");
const buttonChamar = document.querySelector(".chamar");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonAusente.addEventListener("click", () => {
    alert("Cliente ausente registrado!");
    modalContainer.classList.remove("show");
});

buttonPresente.addEventListener("click", () => {
    alert("Cliente presente registrado!");
    modalContainer.classList.remove("show");
});

buttonChamar.addEventListener("click", () => {
    alert("Chamando novamente...");
});