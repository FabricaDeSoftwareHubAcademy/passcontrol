<div class="fundo-consultar-fila">
    <section class="modal-consultar-fila">

        <nav class="area-comum-consultar-fila">

            <div class="topo-consultar-fila">
                <div class="topo-esquerda-consultar-fila">
                    <h3>Fila de Espera</h3>
                </div>
                <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-consultar-fila">
            </div>

            <div class="area-em-cima-tabela-fila">
                <div class="buscar-consultar" id="divBusca">
                    <input type="text" id="txtBusca" placeholder="Buscar..." />
                </div>
                <div class="topo-direita-consultar-fila">
                    <div class="senhas-guiche-area-chamada">

                    <p class="contador-senhas">Senhas na fila: 0</p>
                        <!-- <p>Senhas Na Fila:</p> -->
                    </div>
                </div>
            </div>

            <div class="fundo-fila-tabela">
                <table class="tabela-atendimento-consultar-fila">
                    <thead>
                        <tr>
                            <th>Ordem</th>
                            <th>Nome</th>
                            <th>Serviço</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--JavaScript-->
                    </tbody>
                </table>
            </div>
        </nav>

        <div class="button-group-consultar-fila">
            <button class="botao-modal-consultar-fila return_ConsultarFila">Retornar</button>
        </div>
    </section>
</div>

    <script src="../../public/js/consultar_fila_modal.js"></script>
