const buttonAbrir_InativacaoServico = document.querySelector(".open-inativar-servico");
const modalContainer_InativacaoServico = document.querySelector(".fundo-inativar-servico");
const buttonFechar_InativacaoServico = document.querySelector(".close");
const buttonCancelar_InativacaoServico = document.querySelector(".cancel_InativacaoServico");
const buttonSalvar_InativacaoServico = document.querySelector(".save_InativacaoServico");

buttonAbrir_InativacaoServico.addEventListener("click", () => {
    modalContainer_InativacaoServico.classList.add("show");
});

buttonCancelar_InativacaoServico.addEventListener("click", () => {
    modalContainer_InativacaoServico.classList.remove("show");
});
buttonSalvar_InativacaoServico.addEventListener("click", () => {
    modalContainer_InativacaoServico.classList.remove("show");
});