<div class="fundo-selecao-guiche">
    <section class="modal-selecao-guiche">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo">
        <h1 class="modal-title">Ponto de Atendimento</h1>

        <hr class="modal-divider">

        <p class="modal-message"><b>Selecione o Seu Ponto de Atendimento</b></p>
        <div class="select-container">
            <select class="menu" name="guiche" required=''>
                <option value="" selected disabled>Guichês</option>
                <?php
                    foreach($guiches as $guiche) {
                        ?>
                        <option value="<?=$guiche->id_ponto_atendimento?>">
                            <?=$guiche->nome_ponto_atendimento?> - <?=$guiche->identificador_ponto_atendimento?>
                        </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="button-group">
            <button class="botao-modal confirm_SelecaoGuiche">Confirmar</button>
        </div>
    </section>
</div>
<script>
    const btn_validacao = document.querySelector(".confirm_SelecaoGuiche");
    const modalvalidacao = document.querySelector(".fundo-selecao-guiche");


    if(!sessionStorage.getItem('guicheSelected')){
        modalvalidacao.classList.add("show");

        document.querySelector('select[name="guiche"]').addEventListener('input', () => {
            const guiche_selecionado = parseInt(document.querySelector('select[name="guiche"]').value);
        })
        
        
        try{
            fetch('../../actions/guiche_selecionado.php', {
                method: 'POST',
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
        
        btn_validacao.addEventListener("click", (event) => {
            modalvalidacao.classList.remove("show");
        });
    };
</script>