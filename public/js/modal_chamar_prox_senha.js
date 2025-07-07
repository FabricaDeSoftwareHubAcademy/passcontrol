const buttonAbrir_ChamarSenha = document.querySelector(".abrirChamarProxSenha");
const modalContainer_ChamarSenha = document.querySelector(".fundo-container-confirmacao-presenca");
const buttonAusente_ChamarSenha = document.querySelector(".ausente_ChamarSenha");
const buttonPresente_ChamarSenha = document.querySelector(".presente_ChamarSenha");
const button_ChamarSenha = document.querySelector(".chamar_ChamarSenha");

buttonAbrir_ChamarSenha?.addEventListener("click", () => {
    modalContainer_ChamarSenha.classList.add("show");
});

function chamarProximaSenha() {
    fetch('../../app/actions/proxima_senha.php', {
        method: 'POST'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro ao chamar próxima senha');
        }
        return response.json();
    })
    .then(data => {
        if (data.sucesso) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}

buttonAusente_ChamarSenha?.addEventListener("click", () => {
    chamarProximaSenha();
    modalContainer_ChamarSenha.classList.remove("show");
});

buttonPresente_ChamarSenha?.addEventListener("click", () => {
    chamarProximaSenha();
    modalContainer_ChamarSenha.classList.remove("show");
});

button_ChamarSenha?.addEventListener("click", () => {

});
