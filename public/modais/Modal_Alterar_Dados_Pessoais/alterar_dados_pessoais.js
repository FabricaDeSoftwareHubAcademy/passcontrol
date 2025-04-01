const buttonAbrir_AltDadosPessoais = document.querySelector(".open-editar-dados");
const modalContainerEditar_AltDadosPessoais = document.querySelector(".fundo-editar-dados");
const buttonFechar_AltDadosPessoais = document.querySelector(".close_AltDadosPessoais");
const buttonCancelar_AltDadosPessoais = document.querySelector(".cancel_AltDadosPessoais");
const buttonSalvar_AltDadosPessoais = document.querySelector(".save_AltDadosPessoais");

buttonAbrir_AltDadosPessoais.addEventListener("click", () => {
    modalContainerEditar_AltDadosPessoais.classList.add("show");
});

buttonCancelar_AltDadosPessoais.addEventListener("click", () => {
    modalContainerEditar_AltDadosPessoais.classList.remove("show");
});

buttonSalvar_AltDadosPessoais.addEventListener("click", () => {
    modalContainerEditar_AltDadosPessoais.classList.remove("show");
});