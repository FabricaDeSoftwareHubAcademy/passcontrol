function modalSucessoNovaSenha() {
    const buttonAbrir_ConfDados = document.querySelector(".open-confirmacao-dados");
    const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
    const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");

    if (buttonAbrir_ConfDados && modalContainer_ConfDados) {
        buttonAbrir_ConfDados.addEventListener("click", () => {
            modalContainer_ConfDados.classList.add("show");
        });
    } else {
        console.warn("Botão de abrir ou modal não encontrado.");
    }

    if (buttonFechar_ConfDados && modalContainer_ConfDados) {
        buttonFechar_ConfDados.addEventListener("click", () => {
            modalContainer_ConfDados.classList.remove("show");
            window.location.href = "../../index.php";
        });
    } else {
        console.warn("Botão de fechar ou modal não encontrado.");
    }
};

export default modalSucessoNovaSenha;