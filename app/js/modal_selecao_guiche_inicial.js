document.addEventListener("DOMContentLoaded", () => {
    // MODAL SELEÇÃO DO GUICHE
    const modalvalidacao = document.querySelector(".fundo-selecao-guiche");
    const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
    const selectGuiche = document.querySelector('select[name="guiche"]');
    
    // EXIBI O NA TELA ATENDIMENTO QUANDO SELECIONA O GUICHE
    const guichetexto = document.querySelector('#guiche-exibir');
    
    // BOTÃO SAIR MENU LATERAL
    const botao_sair = document.querySelectorAll(".btn_sair");
    
    // MODAL CONFIRMAÇÃO DA SAIDA DO SISTEMA
    const modalSaida = document.querySelector('.fundo-confimarcao-saida-sistema');
    const saidaModal = document.querySelector(".save_SaidaSis");
    const fechaSaida = document.querySelector(".cancel_SaidaSis");
    
    
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
                // headers: {
                //     'Content-Type': 'application/json'
                // },
                body: JSON.stringify({guiche: guicheSelecionado})
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

            const usuario = JSON.parse(sessionStorage.getItem('usuario'));
            console.log(usuario)
            //modalvalidacao.classList.remove("show");
        });
    }

    // Intercepta clique no botão de sair
    botao_sair.forEach(botao => {
    botao.addEventListener("click", async (event) => {
            modalSaida.classList.add("show");
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
                } catch (err) {
                    console.error("Erro ao liberar guichê:", err);
                }
            }
        });
    });
    saidaModal.addEventListener("click", () => {
        modalSaida.classList.remove("show");
        sessionStorage.clear(); 
        window.location.href = "../../index.php";
    });
    fechaSaida.addEventListener("click", () => {
        modalSaida.classList.remove("show");
    });
});
