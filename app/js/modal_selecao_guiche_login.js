document.addEventListener("DOMContentLoaded", () => {
    const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
    const modalvalidacao = document.querySelector(".fundo-selecao-guiche");
    const selectGuiche = document.querySelector('select[name="guiche"]');
    const guichetexto = document.querySelector('#guiche-exibir');
    const botao_sair = document.querySelectorAll(".btn_sair");
    
    const texto_salvo = sessionStorage.getItem("guichetexto");
    if (texto_salvo) {
        guichetexto.textContent = `${texto_salvo}`;
    }

    // Abre modal se guichê não foi selecionado
    if (!sessionStorage.getItem('guicheSelected') && modalvalidacao) {
        modalvalidacao.classList.add("show");

        selectGuiche.addEventListener('input', () => {
            const guicheSelecionado = parseInt(selectGuiche.value);
            sessionStorage.setItem('guicheSelected', guicheSelecionado);

            fetch('../actions/guiche_selecionado.php', {
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
            const opcaoselecionada = selectGuiche.options[selectGuiche.selectedIndex];
            
            if (!opcaoselecionada || !opcaoselecionada.value) {
                alert("Por favor, selecione um guichê.");
                return;
            }

            const guicheText = opcaoselecionada.textContent.trim();
            const IdGuiche = opcaoselecionada.value;

            guichetexto.textContent = `${guicheText}`;

            modalvalidacao.classList.remove("show");

            sessionStorage.setItem("IdGuicheSelecionado", IdGuiche);
            sessionStorage.setItem("guichetexto", guicheText);

            modalvalidacao.classList.remove("show");
        });
    }

    // Intercepta clique no botão de sair
    botao_sair.forEach(botao => {
        botao.addEventListener("click", async (event) => {
            event.preventDefault();

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
                    console.log("Guichê liberado.");
                } catch (err) {
                    console.error("Erro ao liberar guichê:", err);
                }
                sessionStorage.clear(); 

            }

            // Redireciona para tela de login após liberar
            window.location.href = "../../index.php";
        });
    });
});
