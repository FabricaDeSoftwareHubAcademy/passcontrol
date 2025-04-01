const buttonAbrir_Intervalo = document.querySelector(".open-intervalo");
const modalContainer_Intervalo = document.querySelector(".fundo-intervalo");
const buttonRetornar_Intervalo = document.querySelector(".return_Intervalo");

buttonAbrir_Intervalo.addEventListener("click", () => {
    modalContainer_Intervalo.classList.add("show");
});
buttonRetornar_Intervalo.addEventListener("click", () => {
    modalContainer_Intervalo.classList.remove("show");
});