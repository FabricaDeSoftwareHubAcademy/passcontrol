const buttonAbrir_AltSenha = document.querySelector(".open-alterar-senha");
const modalContainer_AltSenha = document.querySelector(".fundo-container-alterar-senha");
const buttonFechar_AltSenha = document.querySelector(".close_AltSenha");
const buttonCancelar_AltSenha = document.querySelector(".cancel_AltSenha");
const buttonSalvar_AltSenha = document.querySelector(".save_AltSenha");

buttonAbrir_AltSenha.addEventListener("click", () => {
    modalContainer_AltSenha.classList.add("show");
});

buttonCancelar_AltSenha.addEventListener("click", () => {
    modalContainer_AltSenha.classList.remove("show");
});

buttonSalvar_AltSenha.addEventListener("click", () => {
    modalContainer_AltSenha.classList.remove("show");
});