const buttonAbrir_InativacaoUsuario = document.querySelector(".open-inativar-usuario");
const modalContainer_InativacaoUsuario = document.querySelector(".fundo-inativar-usuario");
const buttonFechar_InativacaoUsuario = document.querySelector(".close");
const buttonCancelar_InativacaoUsuario = document.querySelector(".cancel_InativacaoUsuario");
const buttonSalvar_InativacaoUsuario = document.querySelector(".save_InativacaoUsuario");

buttonAbrir_InativacaoUsuario.addEventListener("click", () => {
    modalContainer_InativacaoUsuario.classList.add("show");
});

buttonCancelar_InativacaoUsuario.addEventListener("click", () => {
    modalContainer_InativacaoUsuario.classList.remove("show");
});
buttonSalvar_InativacaoUsuario.addEventListener("click", () => {
    modalContainer_InativacaoUsuario.classList.remove("show");
});