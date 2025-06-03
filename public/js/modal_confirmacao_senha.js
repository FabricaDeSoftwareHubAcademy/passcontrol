
    const buttonAbrir_ConfSenha = document.querySelector(".open-confirmacao-senha");
    const modalContainer_ConfSenha = document.querySelector(".fundo-container-confirmacao-senha");
    const buttonFechar_ConfSenha = document.querySelector(".Okay_ConfSenha");

    // Abre o modal ao clicar em "Entrar"
    buttonAbrir_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.add("show");
    });

    // Fecha o modal e redireciona ao clicar em "Ok"
    buttonFechar_ConfSenha.addEventListener("click", () => {
        modalContainer_ConfSenha.classList.remove("show");

        // Redirecionamento após clicar "Ok"
        window.location.href = "../../app/view/recuperar_senha_codigo.php"; // substitua pelo caminho real
    });

