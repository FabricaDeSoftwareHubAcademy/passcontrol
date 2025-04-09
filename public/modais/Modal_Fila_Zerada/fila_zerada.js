const buttonAbrir_FilaZerada = document.querySelector(".open-fila-zerada");
const modalContainer_FilaZerada = document.querySelector(".fundo-fila-zerada");
const buttonVoltar_FilaZerada = document.querySelector(".voltar_FilaZerada");

buttonAbrir_FilaZerada.addEventListener("click", () => {
    modalContainer_FilaZerada.classList.add("show");
});
buttonVoltar_FilaZerada.addEventListener("click", () => {
    modalContainer_FilaZerada.classList.remove("show");
});