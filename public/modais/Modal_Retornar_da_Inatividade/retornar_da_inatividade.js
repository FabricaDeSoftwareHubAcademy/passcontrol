const buttonAbrir_RetornarInatividade = document.querySelector(".open-retornar-da-inatividade");
const modalContainer_RetornarInatividade = document.querySelector(".fundo-retornar-da-inatividade");
const buttonSair_RetornarInatividade = document.querySelector(".sair_RetornarInatividade");
const buttonConfirma_RetornarInatividade = document.querySelector(".confirma_RetornarInatividade");

buttonAbrir_RetornarInatividade.addEventListener("click", () => {
    modalContainer_RetornarInatividade.classList.add("show");
});

buttonSair_RetornarInatividade.addEventListener("click", () => {
    modalContainer_RetornarInatividade.classList.remove("show");
});

buttonConfirma_RetornarInatividade.addEventListener("click", () => {
    modalContainer_RetornarInatividade.classList.remove("show");
});