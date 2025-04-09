const buttonAbrir_SelecaoGuiche = document.querySelector(".open-selecao-guiche");
const modalContainer_SelecaoGuiche = document.querySelector(".fundo-selecao-guiche");
const buttonConfirmar_SelecaoGuiche = document.querySelector(".confirm_SelecaoGuiche");

buttonAbrir_SelecaoGuiche.addEventListener("click", () => {
    modalContainer_SelecaoGuiche.classList.add("show");
});

buttonConfirmar_SelecaoGuiche.addEventListener("click", () => {
    modalContainer_SelecaoGuiche.classList.remove("show");
});