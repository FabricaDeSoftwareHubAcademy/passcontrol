const buttonAbrir = document.querySelector(".abrir-conf-relatorio-gerado");
const modalContainer = document.querySelector(".fundo-conf-relatorio-gerado");
const buttonFechar = document.querySelector(".Okay");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonFechar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});