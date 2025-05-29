const buttonAbrir_CadPontoAtend = document.querySelector(".open-cad-ponto-atendimento");
const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
const buttonFechar_CadPontoAtend = document.querySelector(".close_CadPontoAtend");
const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");

buttonAbrir_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.add("show");
});

buttonCancelar_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.remove("show");
});

buttonSalvar_CadPontoAtend.addEventListener("click", () => {
    modalContainer_CadPontoAtend.classList.remove("show");
});