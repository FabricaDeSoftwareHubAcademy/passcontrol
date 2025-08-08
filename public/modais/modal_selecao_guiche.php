<div class="fundo-selecao-guiche">
    <section class="modal-selecao-guiche">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo">
        <h1 class="modal-title">Ponto de Atendimento</h1>
        
        <hr class="modal-divider">
        
        <p class="modal-message"><b>Selecione o Seu Ponto de Atendimento</b></p>
        <form class="select-container">
            <select class="menu" name="guiche" required=''>
                <option value="" selected disabled>Guichês</option>
                <?php
                    require_once '../../app/classes/PontoAtendimento.php';
                    
                    $ponto = new Ponto_Atendimento();
                    $guiches = $ponto->buscar_disponiveis();
                    foreach($guiches as $guiche) {
                        ?>
                        <option value="<?=$guiche->id_ponto_atendimento?>">
                            <?=$guiche->nome_ponto_atendimento?> - <?=$guiche->identificador_ponto_atendimento?>
                        </option>
                        <?php
                    }
                    ?>
            </select>
            <span id="erro_selecao_guiche" class="menssagem-erro-guiche"></span>
        </form>
        <div class="button-group">
            <button class="botao-modal confirm_SelecaoGuiche">Confirmar</button>
        </div>
    </section>
</div>