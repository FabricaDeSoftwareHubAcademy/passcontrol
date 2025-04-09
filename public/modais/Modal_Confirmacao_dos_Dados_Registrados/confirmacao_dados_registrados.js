const buttonAbrir_ConfDadosRegist = document.querySelector(".open-confirmacao-dados-registrados");
const modalContainer_ConfDadosRegist = document.querySelector(".fundo-container-confirmacao-dados-registrados");
const buttonFechar_ConfDadosRegist = document.querySelector(".close_ConfDadosRegist");
const buttonCancelar_ConfDadosRegist = document.querySelector(".cancel_ConfDadosRegist");
const buttonSalvar_ConfDadosRegist = document.querySelector(".save_ConfDadosRegist");

buttonAbrir_ConfDadosRegist.addEventListener("click", () => {
    modalContainer_ConfDadosRegist.classList.add("show");
});

buttonCancelar_ConfDadosRegist.addEventListener("click", () => {
    modalContainer_ConfDadosRegist.classList.remove("show");
});
buttonSalvar_ConfDadosRegist.addEventListener("click", () => {
    modalContainer_ConfDadosRegist.classList.remove("show");
});