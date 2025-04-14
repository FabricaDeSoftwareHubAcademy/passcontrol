const buttonAbrir_IniciarIntervalo = document.querySelector(".open-iniciar-intervalo");
const modalContainer_IniciarIntervalo = document.querySelector(".fundo-iniciar-intervalo");
const buttonCancelar_IniciarIntervalo = document.querySelector(".cancel_IniciarIntervalo");
const buttonSalvar_IniciarIntervalo = document.querySelector(".save_IniciarIntervalo");
const horarioElemento = document.getElementById("horario");

buttonAbrir_IniciarIntervalo.addEventListener("click", () => {
    const agora = new Date();
    const horas = agora.getHours().toString().padStart(2, '0');
    const minutos = agora.getMinutes().toString().padStart(2, '0');
    horarioElemento.innerHTML = `<b>${horas}:${minutos}</b>`;

    modalContainer_IniciarIntervalo.classList.add("show");
});

buttonCancelar_IniciarIntervalo.addEventListener("click", () => {
    modalContainer_IniciarIntervalo.classList.remove("show");
});
buttonSalvar_IniciarIntervalo.addEventListener("click", () => {
    modalContainer_IniciarIntervalo.classList.remove("show");
});