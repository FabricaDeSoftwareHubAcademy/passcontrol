const buttonAbrir = document.querySelector(".open-confirmacao-presenca");
const modalContainer = document.querySelector(".fundo-container-confirmacao-presenca");
const buttonAusente = document.querySelector(".ausente");
const buttonPresente = document.querySelector(".presente");
const buttonChamar = document.querySelector(".chamar");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonAusente.addEventListener("click", () => {
    alert("Cliente ausente registrado!");
    modalContainer.classList.remove("show");
});

buttonPresente.addEventListener("click", () => {
    alert("Cliente presente registrado!");
    modalContainer.classList.remove("show");
});

buttonChamar.addEventListener("click", () => {
    alert("Chamando novamente...");
});