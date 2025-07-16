document.addEventListener("DOMContentLoaded", () => {
    const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
    const modalvalidacao = document.querySelector(".fundo-selecao-guiche");
    const selectGuiche = document.querySelector('select[name="guiche"]');
    const botoes_sair = document.querySelectorAll(".btn_sair");

    // Abre modal se guichê não foi selecionado
    if (!sessionStorage.getItem('guicheSelected') && modalvalidacao) {
        modalvalidacao.classList.add("show");

        selectGuiche.addEventListener('input', () => {
            const guicheSelecionado = parseInt(selectGuiche.value);
            sessionStorage.setItem('guicheSelected', guicheSelecionado);

            fetch('../../actions/guiche_liberado.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    guiche: guicheSelecionado
                })
            }).catch(err => {
                console.error("Erro ao marcar guichê como ocupado:", err);
            });
        });

        btn_validacao.addEventListener("click", () => {
            modalvalidacao.classList.remove("show");
        });
    }

    // Intercepta clique no botão de sair
    botoes_sair.forEach(botao => {
        botao.addEventListener("click", async (event) => {
            event.preventDefault();

            const guicheSelecionado = sessionStorage.getItem("guicheSelected");

            if (guicheSelecionado) {
                try {
                    await fetch('../../actions/guiche_liberação.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            guiche: parseInt(guicheSelecionado)
                        })
                    });
                    console.log("Guichê liberado.");
                } catch (err) {
                    console.error("Erro ao liberar guichê:", err);
                }

                sessionStorage.removeItem("guicheSelected");
            }

            // Redireciona para tela de login após liberar
            window.location.href = "../../index.php";
        });
    });
});
