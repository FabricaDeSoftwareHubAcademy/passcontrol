<!-- modal jao: modal-container-cadas-servicos -->
<main class="modal-container" style="display: none;">
    <!-- modal jao: modal-cadas-servicos -->
    <section class="modal">
        <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
        <!-- modal jao: title-cadas-servicos -->
        <h1 class="title">Cadastrar Serviços</h1>
        <!-- modal jao: divider-servicos -->
        <hr class="divider">
        
        <!-- modal jao: inf-modal-cadas-servico -->
        <div class="inf-modal">
            <!-- modal jao, os dois input sao igual: container-cadas-servico -->
            <div class="container">
                <!-- modal jao, os dois input sao igual:label-servico  -->
                <label class="label"><b>Código do Serviço</b></label>
                <input type="text" class="input-number" placeholder="Digite o código do serviço">
            </div>
            <div class="container">
                <label class="label"><b>Ícone</b></label>            
                <div class="file-input">
                    <input type="file" id="fileInput" class="file-input-field" accept="image/*">
                    <img src="" alt="Pré-visualização do ícone" class="file-preview" style="display: none;">
                </div>
            </div>
        </div>
        <!-- modal jao: area-servico-cadas  -->
        <div class="servico">
            <!-- modal jao: label-servico  -->
            <label class="label_serv"><b>Serviço</b></label>
            <!-- modal jao:input-text-servicos -->
            <input type="text" class="input-text" placeholder="Digite o nome do novo serviço">
        </div>
        <!-- modal jao: button-group-cadastro-servico  -->
        <div class="button-group">
            <!-- modal jao: botao-modal-cadastro-servico -->
            <button class="botao-modal-cancela cancel">Cancelar</button>
            <!-- modal jao: botao-modal-cadastro-servico  -->
            <button class="botao-modal-salvo save">Salvar</button>
        </div>
    </section>
</main>


<script src="../cadastroServicos.js" defer></script>

