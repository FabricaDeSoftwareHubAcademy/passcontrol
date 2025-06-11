export default function modalConfirmacaoDados() {
const buttonAbrir_ConfDados = document.querySelector(".open-confirmacao-dados");
const modalContainer_ConfDados = document.querySelector(".fundo-container-confirmacao-dados");
const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");
const formRecuperarSenha = document.querySelector("#form_recuperar_senha");

// Função para validar se as senhas coincidem
function validarSenhas() {
    const novaSenha = document.querySelector("#nova_senha").value;
    const confirmarSenha = document.querySelector("#confirmar_senha").value;

    if (novaSenha === "" || confirmarSenha === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    if (novaSenha !== confirmarSenha) {
        alert("As senhas não coincidem. Tente novamente.");
        return false;
    }

    return true;
}

// Abrir o modal após validação
buttonAbrir_ConfDados.addEventListener("click", () => {
    if (validarSenhas()) {
        modalContainer_ConfDados.classList.add("show");
    }
});

// Fechar o modal e enviar os dados ao banco
buttonFechar_ConfDados.addEventListener("click", () => {
    modalContainer_ConfDados.classList.remove("show");

   window.location.href = "../../index.php?pagina=atendimento&status=sucesso";
});
}