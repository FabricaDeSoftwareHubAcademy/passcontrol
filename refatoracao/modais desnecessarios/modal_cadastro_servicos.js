const buttonAbrir_CadServico = document.querySelector(".open-cadast-servicos");
const modalContainer_CadServico = document.querySelector(".modal-container-cadas-servicos");
const buttonFechar_CadServico = document.querySelector(".close_CadServico");
const buttonCancelar_CadServico = document.querySelector(".cancel_CadServico");
const buttonSalvar_CadServico = document.querySelector(".save_CadServico");

buttonAbrir_CadServico.addEventListener("click", () => {
    modalContainer_CadServico.classList.add("show");
});

buttonCancelar_CadServico.addEventListener("click", () => {
    modalContainer_CadServico.classList.remove("show");
});
buttonSalvar_CadServico.addEventListener("click", () => {
    modalContainer_CadServico.classList.remove("show");
});