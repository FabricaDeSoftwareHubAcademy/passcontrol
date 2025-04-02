const buttonAbrir_SenhaGerada = document.querySelector(".abrir-senha-gerada");
const modalContainer_SenhaGerada = document.querySelector(".fundo-senha-gerada");
const buttonFechar_SenhaGerada = document.querySelector(".okay_SenhaGerada");

buttonAbrir_SenhaGerada.addEventListener("click", () => {
    modalContainer_SenhaGerada.classList.add("show");
});

buttonFechar_SenhaGerada.addEventListener("click", () => {
    modalContainer_SenhaGerada.classList.remove("show");
});