const buttonAbrir_ConsultarFila = document.querySelector(".abrirConsultarFila");
const modalContainer_ConsultarFila = document.querySelector(".fundo-consultar-fila");
const buttonFechar_ConsultarFila = document.querySelector(".close_ConsultarFila");
const buttonRetornar_ConsultarFila = document.querySelector(".return_ConsultarFila");

buttonAbrir_ConsultarFila.addEventListener("click", () => {
    modalContainer_ConsultarFila.classList.add("show");
});

buttonRetornar_ConsultarFila.addEventListener("click", () => {
    modalContainer_ConsultarFila.classList.remove("show");
});