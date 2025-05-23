function lerInformacoesChamada() {
    const guiche = document.querySelector(".desk-info-confirmacao-presenca")?.textContent || "";
    const nome = document.querySelector(".name-confirmacao-presenca")?.textContent || "";

    const texto = `${nome}. Favor comparecer ao: ${guiche}`;

    const utterance = new SpeechSynthesisUtterance(texto);
    utterance.lang = "pt-BR";
    speechSynthesis.speak(utterance);
}

// Aguarda o DOM carregar para associar os eventos
document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir_ChamarSenha = document.querySelector(".abrirChamarProxSenha");
    const button_ChamarSenha = document.querySelector(".chamar_ChamarSenha");

    if (buttonAbrir_ChamarSenha) {
        buttonAbrir_ChamarSenha.addEventListener("click", () => {
            // Espera um pouquinho para garantir que o conteúdo foi exibido antes de ler
            setTimeout(() => {
                lerInformacoesChamada();
            }, 200);
        });
    }

    if (button_ChamarSenha) {
        button_ChamarSenha.addEventListener("click", () => {
            lerInformacoesChamada();
        });
    }
});
