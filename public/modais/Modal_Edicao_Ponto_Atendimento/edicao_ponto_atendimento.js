const buttonAbrir_EdicaoPontoAtendimento = document.querySelector(".open-editar-ponto-atendimento");
const modalContainer_EdicaoPontoAtendimento = document.querySelector(".fundo-editar-ponto-atendimento");
const buttonFechar_EdicaoPontoAtendimento = document.querySelector(".close_EdicaoPontoAtendimento");
const buttonCancelar_EdicaoPontoAtendimento = document.querySelector(".cancel_EdicaoPontoAtendimento");
const buttonSalvar_EdicaoPontoAtendimento = document.querySelector(".save_EdicaoPontoAtendimento");

buttonAbrir_EdicaoPontoAtendimento.addEventListener("click", () => {
    modalContainer_EdicaoPontoAtendimento.classList.add("show");
});

buttonCancelar_EdicaoPontoAtendimento.addEventListener("click", () => {
    modalContainer_EdicaoPontoAtendimento.classList.remove("show");
});

buttonSalvar_EdicaoPontoAtendimento.addEventListener("click", () => {
    modalContainer_EdicaoPontoAtendimento.classList.remove("show");
});