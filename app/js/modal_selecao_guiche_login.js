const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
const modalvalidacao = document.querySelector(".fundo-selecao-guiche");


if(!sessionStorage.getItem('guicheSelected')){
    modalvalidacao.classList.add("show");

    document.querySelector('select[name="guiche"]').addEventListener('input', () => {
        const guiche_selecionado = parseInt(document.querySelector('select[name="guiche"]').value);
        
        
        try{
            fetch('../../actions/guiche_selecionado.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    guiche: guiche_selecionado
                })
            }).then(res => {
                if (!res.ok) return
                
                sessionStorage.setItem('guicheSelected', guiche_selecionado);
                
            })
        }catch (error){
            console.log(error);
        }
    });
    
    btn_validacao.addEventListener("click", (event) => {
        modalvalidacao.classList.remove("show");
    });
};