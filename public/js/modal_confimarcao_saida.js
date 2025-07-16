const buttonAbrir_SaidaSistema = document.querySelector(".btn_sair");
const modalContainer_SaidaSistema = document.querySelector(".fundo-confimarcao-saida-sistema");
// const buttonFechar_SaidaSistema = document.querySelector(".close_ConfDadosRegist");
const buttonCancelar_SaidaSistema = document.querySelector(".cancel_Saida");
const buttonSalvar_SaidaSistema = document.querySelector(".save_Saida");

buttonAbrir_SaidaSistema.addEventListener("click", () => {
    modalContainer_SaidaSistema.classList.add("show");
});

buttonCancelar_SaidaSistema.addEventListener("click", () => {
    modalContainer_SaidaSistema.classList.remove("show");
});
buttonSalvar_SaidaSistema.addEventListener("click", () => {
    modalContainer_SaidaSistema.remove("show");
});