const buttonAbrir_AtivGuiche = document.querySelector(".open-ativacao-guiche");
const modalContainer_AtivGuiche = document.querySelector(".fundo-container-ativacao-guiche");
const buttonFechar_AtivGuiche = document.querySelector(".close_AtivGuiche");
const buttonCancelar_AtivGuiche = document.querySelector(".cancel_AtivGuiche");
const buttonSalvar_AtivGuiche = document.querySelector(".save_AtivGuiche");

buttonAbrir_AtivGuiche.addEventListener("click", () => {
    modalContainer_AtivGuiche.classList.add("show");
});

buttonCancelar_AtivGuiche.addEventListener("click", () => {
    modalContainer_AtivGuiche.classList.remove("show");
});
buttonSalvar_AtivGuiche.addEventListener("click", () => {
    modalContainer_AtivGuiche.classList.remove("show");
}); 