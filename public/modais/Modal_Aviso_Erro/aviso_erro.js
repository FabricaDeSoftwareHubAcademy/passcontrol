const buttonAbrir_AvisoErro = document.querySelector(".open-aviso-erro");
const modalContainer_AvisoErro = document.querySelector(".modal-container-aviso-erro");
const buttonVoltar_AvisoErro = document.querySelector(".voltar_AvisoErro");

buttonAbrir_AvisoErro.addEventListener("click", () => {
    modalContainer_AvisoErro.classList.add("show");
});
buttonVoltar_AvisoErro.addEventListener("click", () => {
    modalContainer_AvisoErro.classList.remove("show");
});