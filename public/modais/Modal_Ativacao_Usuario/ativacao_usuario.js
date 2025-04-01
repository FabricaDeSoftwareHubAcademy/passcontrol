const buttonAbrir_AtivUsuario = document.querySelector(".open-ativacao-usuario");
const modalContainer_AtivUsuario = document.querySelector(".fundo-container-ativacao-usuario");
const buttonFechar_AtivUsuario = document.querySelector(".close_AtivUsuario");
const buttonCancelar_AtivUsuario = document.querySelector(".cancel_AtivUsuario");
const buttonSalvar_AtivUsuario = document.querySelector(".save_AtivUsuario");

buttonAbrir_AtivUsuario.addEventListener("click", () => {
    modalContainer_AtivUsuario.classList.add("show");
});

buttonCancelar_AtivUsuario.addEventListener("click", () => {
    modalContainer_AtivUsuario.classList.remove("show");
});
buttonSalvar_AtivUsuario.addEventListener("click", () => {
    modalContainer_AtivUsuario.classList.remove("show");
});