const buttonAbrir_ConfServCadastr = document.querySelector(".open-conf-servico-cadastrado");
const modalContainer_ConfServCadastr = document.querySelector(".fundo-container-confirmacao-servico-cadastrado");
const buttonFechar_ConfServCadastr = document.querySelector(".close_ConfServCadastr");
const buttonCancelar_ConfServCadastr = document.querySelector(".cancel_ConfServCadastr");
const buttonSalvar_ConfServCadastr = document.querySelector(".save_ConfServCadastr");

buttonAbrir_ConfServCadastr.addEventListener("click", () => {
    modalContainer_ConfServCadastr.classList.add("show");
});

buttonCancelar_ConfServCadastr.addEventListener("click", () => {
    modalContainer_ConfServCadastr.classList.remove("show");
});
buttonSalvar_ConfServCadastr.addEventListener("click", () => {
    modalContainer_ConfServCadastr.classList.remove("show");
});