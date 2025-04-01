const buttonAbrirEncerrarAtendimento = document.querySelector(".open-encerrar-atendimento");
const modalContainerEncerrarAtendimento = document.querySelector(".fundo-encerrar-atendimento");
const buttonFecharEncerrarAtendimento = document.querySelector(".close");
const buttonCancelarEncerrarAtendimento = document.querySelector(".cancel-encerrar-atendimento");
const buttonSalvarEncerrarAtendimento = document.querySelector(".save-encerrar-atendimento");

buttonAbrirEncerrarAtendimento.addEventListener("click", () => {
    modalContainerEncerrarAtendimento.classList.add("show");
});

buttonCancelarEncerrarAtendimento.addEventListener("click", () => {
    modalContainerEncerrarAtendimento.classList.remove("show");
});
buttonSalvarEncerrarAtendimento.addEventListener("click", () => {
    modalContainerEncerrarAtendimento.classList.remove("show");
});