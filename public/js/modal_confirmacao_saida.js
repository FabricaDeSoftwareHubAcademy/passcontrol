document.addEventListener("DOMContentLoaded", () => {
    // BOTÃO SAIR MENU LATERAL
    const botao_sair = document.querySelectorAll(".btn_sair");
    
    // MODAL CONFIRMAÇÃO DA SAIDA DO SISTEMA
    const modalSaida = document.querySelector('.fundo-confimarcao-saida-sistema');
    const saidaModal = document.querySelector(".save_SaidaSis");
    const fechaSaida = document.querySelector(".cancel_SaidaSis");

    // const modalSaida = document.querySelector('.fundo-confimarcao-saida-sistema');
    // modalSaida.classList.add("show");
    
    // Intercepta clique no botão de sair
    botao_sair.forEach(botao => {
        botao.addEventListener("click", async (event) => {
            modalSaida.classList.add("show");
            event.preventDefault();
        });
    });
    
    saidaModal.addEventListener("click", async () => {
        const guicheSelecionado = sessionStorage.getItem("guicheSelected");     
        if (guicheSelecionado) {
            try {
                await fetch('../actions/guiche_liberacao.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        guiche: parseInt(guicheSelecionado)
                    })
                });
            } catch (err) {
                console.error("Erro ao liberar guichê:", err);
            }
        }
            modalSaida.classList.remove("show");
            sessionStorage.clear(); 
            window.location.href = "../../index.php";
        });

    fechaSaida.addEventListener("click", () => {
        modalSaida.classList.remove("show");
    });

    window.addEventListener("beforeunload", function (e) {
        const guicheSelecionado = sessionStorage.getItem("guicheSelected");
        if (guicheSelecionado) {
            const blob = new Blob(
                [JSON.stringify({ guiche: parseInt(guicheSelecionado) })],
                { type: 'application/json' }
            );
            navigator.sendBeacon('../actions/guiche_liberacao.php', blob);
            sessionStorage.clear();
            window.location.href = "../../index.php";
        }
    });
});




















// const buttonAbrir_ConfDeslog = document.querySelector(".open-confirmacao-deslogar");
// const modalContainer_ConfDeslog = document.querySelector(".fundo-container-confirmacao-deslogar");
// const buttonFechar_ConfDeslog = document.querySelector(".close_ConfDeslog");
// const buttonCancelar_ConfDeslog = document.querySelector(".cancel_ConfDeslog");
// const buttonSalvar_ConfDeslog = document.querySelector(".save_ConfDeslog");

// buttonAbrir_ConfDeslog.addEventListener("click", () => {
//     modalContainer_ConfDeslog.classList.add("show");
// });

// buttonCancelar_ConfDeslog.addEventListener("click", () => {
//     modalContainer_ConfDeslog.classList.remove("show");
// });

// buttonSalvar_ConfDeslog.addEventListener("click", () => {
//     modalContainer_ConfDeslog.classList.remove("show");
// });