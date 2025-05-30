const buttonAbrir_AlertaFilaZerada = document.querySelector(".open-alertar-fila");
const modalContainer_AlertaFilaZerada = document.querySelector(".modal-container-alertar-fila");
const buttonFechar_AlertaFilaZerada = document.querySelector(".close_AlertaFilaZerada");
const buttonVoltar_AlertaFilaZerada = document.querySelector(".voltar_AlertaFilaZerada");

buttonAbrir_AlertaFilaZerada.addEventListener("click", () => {
    modalContainer_AlertaFilaZerada.classList.add("show");
});
buttonVoltar_AlertaFilaZerada.addEventListener("click", () => {
    modalContainer_AlertaFilaZerada.classList.remove("show");
});