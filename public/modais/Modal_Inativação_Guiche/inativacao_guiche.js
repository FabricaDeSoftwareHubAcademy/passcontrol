const buttonAbrir_InativacaoGuiche = document.querySelector(".open-inativacao-guiche");
const modalContainer_InativacaoGuiche = document.querySelector(".fundo-inativacao-guiche");
const buttonCancelar_InativacaoGuiche = document.querySelector(".cancel_InativacaoGuiche");
const buttonSalvar_InativacaoGuiche = document.querySelector(".save_InativacaoGuiche");

buttonAbrir_InativacaoGuiche.addEventListener("click", () => {
    modalContainer_InativacaoGuiche.classList.add("show");
});

buttonCancelar_InativacaoGuiche.addEventListener("click", () => {
    modalContainer_InativacaoGuiche.classList.remove("show");
});
buttonSalvar_InativacaoGuiche.addEventListener("click", () => {
    modalContainer_InativacaoGuiche.classList.remove("show");
});