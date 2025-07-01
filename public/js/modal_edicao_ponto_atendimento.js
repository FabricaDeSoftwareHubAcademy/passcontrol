document.addEventListener("DOMContentLoaded", function () {
    let dadosOriginais = {};
    let formAlterado = false;

    document.querySelectorAll(".bot-editar").forEach(button => {
        button.addEventListener("click", async function (event) {
            event.preventDefault();

            let id_value = button.getAttribute("data-id");

            const modalContainer = document.querySelector(".fundo-editar-ponto-atendimento");
            const buttonCancelar = document.querySelector(".cancel_EdicaoPontoAtendimento");
            const buttonSalvar = document.querySelector(".save_EdicaoPontoAtendimento");

            // Buscar os dados do ponto de atendimento
            let dados_php = await fetch("../actions/ponto_atendimento_editar.php?id_ponto_atendimento=" + id_value, {
                method: 'GET'
            });

            let text = await dados_php.text();
            let response;
            try {
                response = JSON.parse(text);
            } catch (e) {
                console.error("Erro ao fazer parse do JSON:", e);
                alert("Erro ao carregar os dados.");
                return;
            }

            // Preencher os campos
            const inputNome = document.getElementById("nome_ponto_atendimento");
            const inputIdentificador = document.getElementById("identificador_ponto_atendimento");
            const inputId = document.getElementById("id_ponto_atendimento");

            if (!inputNome || !inputIdentificador || !inputId) {
                console.error("Algum campo do modal não foi encontrado no DOM.");
                return;
            }

            inputNome.value = response.nome_ponto_atendimento || "";
            inputIdentificador.value = response.identificador_ponto_atendimento || "";
            inputId.value = response.id_ponto_atendimento || "";

            // Guardar os dados originais
            dadosOriginais = {
                nome: response.nome_ponto_atendimento.trim(),
                identificador: response.identificador_ponto_atendimento.trim()
            };

            modalContainer.classList.add("show");

            // Botão CANCELAR
            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });

            // Botão SALVAR
            buttonSalvar.onclick = function (e) {
                e.preventDefault();

                const nomeAtual = inputNome.value.trim();
                const identificadorAtual = inputIdentificador.value.trim();

                // Verifica se houve alteração
                if (
                    nomeAtual !== dadosOriginais.nome ||
                    identificadorAtual !== dadosOriginais.identificador
                ) {
                    formAlterado = true;
                    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.add("show");
                    modalContainer.classList.remove("show");
                } else {
                    alert("Nenhuma alteração detectada.");
                }
            };

            // Botão NÃO na confirmação
            document.querySelector(".cancel_ConfDadosRegist").addEventListener("click", function () {
                document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
                modalContainer.classList.add("show");
            });

            // Botão SIM na confirmação
            document.querySelector(".save_ConfDadosRegist").addEventListener("click", async function () {
                if (!formAlterado) return;

                const myform = document.getElementById("formulario_editar");
                const formData = new FormData(myform);

                try {
                    let responseSalvar = await fetch("../actions/ponto_atendimento_cadastrar.php", {
                        method: 'POST',
                        body: formData
                    });

                    let data = await responseSalvar.json();

                    if (data.status === 'ok') {
                        document.getElementById("confirma_editar").classList.add("show");
                    } else {
                        alert("Erro ao salvar: " + (data.mensagem || "Erro desconhecido"));
                    }

                    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
                } catch (error) {
                    console.error("Erro ao enviar os dados:", error);
                    alert("Erro ao enviar os dados.");
                }
            });

            // Botão OK final
            const buttonOkEditar = document.getElementById("btnOkEditar");
            buttonOkEditar.addEventListener("click", function () {
                document.getElementById("confirma_editar").classList.remove("show");
                location.reload();
            });
        });
    });
});