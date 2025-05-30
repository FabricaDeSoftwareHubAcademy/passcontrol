const buttonAbrir_EncerrarAtendimento = document.querySelector(".open-encerrar-atendimento");
const modalContainer_EncerrarAtendimento = document.querySelector(".fundo-encerrar-atendimento");
const buttonFechar_EncerrarAtendimento = document.querySelector(".close_EncerrarAtendimento");
const buttonCancelar_EncerrarAtendimento = document.querySelector(".cancel_EncerrarAtendimento");
const buttonSalvar_EncerrarAtendimento = document.querySelector(".save_EncerrarAtendimento");

buttonAbrir_EncerrarAtendimento.addEventListener("click", () => {
    modalContainer_EncerrarAtendimento.classList.add("show");
});

buttonCancelar_EncerrarAtendimento.addEventListener("click", () => {
    modalContainer_EncerrarAtendimento.classList.remove("show");
});
buttonSalvar_EncerrarAtendimento.addEventListener("click", () => {
    modalContainer_EncerrarAtendimento.classList.remove("show");
});