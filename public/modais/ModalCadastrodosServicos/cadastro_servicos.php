<main class="modal-container" style="display: none;">
    <section class="modal">
        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <h1 class="title">Cadastrar Serviços</h1>
        <hr class="divider">
        

        <div class="inf-modal">
            <div class="container1">
                <label class="label"><b>Código do Serviço</b></label>
                <input type="text" class="input-number" placeholder="Digite o código do serviço">
            </div>
            <div class="container2">
                <label class="label"><b>Ícone</b></label>
                <div class="file-input">
                    <input type="file" id="fileInput" class="file-input-field" accept="image/*">
                    <img src="" alt="Pré-visualização do ícone" class="file-preview" style="display: none;">
                </div>
            </div>
        </div>

        <div class="servico">
            <label class="label"><b>Serviço</b></label>
            <input type="text" class="input-text" placeholder="Digite o nome do novo serviço">
        </div>

        <div class="button-group">
            <button class="botao-modal cancel">Cancelar</button>
            <button class="botao-modal save">Salvar</button>
        </div>
    </section>
</main>


<script src="../cadastro_servicos.js" defer></script>

