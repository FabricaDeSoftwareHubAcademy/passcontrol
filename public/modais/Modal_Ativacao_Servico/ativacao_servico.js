const buttonAbrir_AtivServico = document.querySelector(".open-ativacao-servico");
const modalContainer_AtivServico = document.querySelector(".fundo-container-ativacao-servico");
const buttonFechar_AtivServico = document.querySelector(".close_AtivServico");
const buttonCancelar_AtivServico = document.querySelector(".cancel_AtivServico");
const buttonSalvar_AtivServico = document.querySelector(".save_AtivServico");

buttonAbrir_AtivServico.addEventListener("click", () => {
    modalContainer_AtivServico.classList.add("show");
});

buttonCancelar_AtivServico.addEventListener("click", () => {
    modalContainer_AtivServico.classList.remove("show");
});
buttonSalvar_AtivServico.addEventListener("click", () => {
    modalContainer_AtivServico.classList.remove("show");
});