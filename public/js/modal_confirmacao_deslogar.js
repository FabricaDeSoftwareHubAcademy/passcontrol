const buttonAbrir_ConfDeslog = document.querySelector(".open-confirmacao-deslogar");
const modalContainer_ConfDeslog = document.querySelector(".fundo-container-confirmacao-deslogar");
const buttonFechar_ConfDeslog = document.querySelector(".close_ConfDeslog");
const buttonCancelar_ConfDeslog = document.querySelector(".cancel_ConfDeslog");
const buttonSalvar_ConfDeslog = document.querySelector(".save_ConfDeslog");

buttonAbrir_ConfDeslog.addEventListener("click", () => {
    modalContainer_ConfDeslog.classList.add("show");
});

buttonCancelar_ConfDeslog.addEventListener("click", () => {
    modalContainer_ConfDeslog.classList.remove("show");
});

buttonSalvar_ConfDeslog.addEventListener("click", () => {
    modalContainer_ConfDeslog.classList.remove("show");
});