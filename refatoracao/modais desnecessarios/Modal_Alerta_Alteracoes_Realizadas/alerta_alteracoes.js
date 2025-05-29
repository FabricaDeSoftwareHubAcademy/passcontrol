const buttonAbrir_AlertaAlteracoes = document.querySelector(".open-alerta-alteracoes");
const modalContainer_AlertaAlteracoes = document.querySelector(".modal-container-alerta-alteracoes");
const buttonFechar_AlertaAlteracoes = document.querySelector(".close_AlertaAlteracoes");
const buttonVoltar_AlertaAlteracoes = document.querySelector(".voltar_AlertaAlteracoes");

buttonAbrir_AlertaAlteracoes.addEventListener("click", () => {
    modalContainer_AlertaAlteracoes.classList.add("show");
});
buttonVoltar_AlertaAlteracoes.addEventListener("click", () => {
    modalContainer_AlertaAlteracoes.classList.remove("show");
});