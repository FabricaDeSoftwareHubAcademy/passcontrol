document.addEventListener("DOMContentLoaded", () => {
    // MODAL SELEÇÃO DO GUICHE
    const modalvalidacao = document.querySelector(".fundo-selecao-guiche");
    const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
    const selectGuiche = document.querySelector('select[name="guiche"]');
    
    // EXIBI O NA TELA ATENDIMENTO QUANDO SELECIONA O GUICHE
    const guichetexto = document.querySelector('#guiche-exibir');

    const msgError = document.querySelector(".menssagem-erro-guiche");
    
    // Abre modal se guichê não foi selecionado
    if (!sessionStorage.getItem('guicheSelected') && modalvalidacao) {
        modalvalidacao.classList.add("show");
        
        btn_validacao.addEventListener("click", (e) => {
            e.preventDefault();
            const opcaoselecionada = selectGuiche.options[selectGuiche.selectedIndex];
            const guicheSelecionado = parseInt(opcaoselecionada.value);
            msgError.innerHTML = '';
            let erro = false;
            
            const valorGuiche = selectGuiche.value.trim();
            if (!valorGuiche) {
                msgError.innerHTML += "Por favor, selecione um guichê.<br><br>";
                erro = true;
              }
            // if (!opcaoselecionada || !opcaoselecionada.value) {
            //     alert("Por favor, selecione um guichê.");
            //     return;
            // } 
            if (erro) {
                return;
            }
            
            const guicheText = opcaoselecionada.textContent.trim();
            guichetexto.textContent = guicheText;
            
            sessionStorage.setItem('guicheSelected', guicheSelecionado);
            sessionStorage.setItem('nomeGuiche', guicheText);

            fetch('../actions/guiche_selecionado.php', {
            method: 'POST',
            body: JSON.stringify({guiche: guicheSelecionado})
            }) 
            .catch(err => {
                console.error("Erro ao marcar o guichê como ocupado", err);
            });

            modalvalidacao.classList.remove("show");
        });
    }
});
