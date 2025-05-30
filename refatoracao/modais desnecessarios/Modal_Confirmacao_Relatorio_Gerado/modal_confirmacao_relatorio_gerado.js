const buttonAbrir_ConfRelatGerad = document.querySelector(".abrir-conf-relatorio-gerado");
const modalContainer_ConfRelatGerad = document.querySelector(".fundo-conf-relatorio-gerado");
const buttonFechar_ConfRelatGerad = document.querySelector(".Okay_ConfRelatGerad");

buttonAbrir_ConfRelatGerad.addEventListener("click", () => {
    modalContainer_ConfRelatGerad.classList.add("show");
});

buttonFechar_ConfRelatGerad.addEventListener("click", () => {
    modalContainer_ConfRelatGerad.classList.remove("show");
});