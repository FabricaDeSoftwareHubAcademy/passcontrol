const buttonAbrir_ChamarSenha = document.querySelector(".abrirChamarProxSenha");
const modalContainer_ChamarSenha = document.querySelector(".fundo-container-confirmacao-presenca");
const buttonAusente_ChamarSenha = document.querySelector(".ausente_ChamarSenha");
const buttonPresente_ChamarSenha = document.querySelector(".presente_ChamarSenha");
const button_ChamarSenha = document.querySelector(".chamar_ChamarSenha");

buttonAbrir_ChamarSenha.addEventListener("click", () => {
    modalContainer_ChamarSenha.classList.add("show");
});

buttonAusente_ChamarSenha.addEventListener("click", () => {
    modalContainer_ChamarSenha.classList.remove("show");
});

buttonPresente_ChamarSenha.addEventListener("click", () => {
    modalContainer_ChamarSenha.classList.remove("show");
});

// button_ChamarSenha.addEventListener("click", () => {
// });