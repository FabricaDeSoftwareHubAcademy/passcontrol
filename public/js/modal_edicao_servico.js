document.addEventListener("DOMContentLoaded", function () {
    let dadosOriginais = {};
    let formAlterado = false;

    document.querySelectorAll(".chamamodal").forEach(button => {
        button.addEventListener("click", async function (event) {
            event.preventDefault();

            let id_value = button.getAttribute("id_value");

            const modalContainer = document.querySelector(".modal-container-servico");
            const buttonCancelar = document.querySelector(".cance_lEditServ");
            const buttonSalvar = document.querySelector(".save_EditServ");

            // Buscar os dados do serviço
            let dados_php = await fetch("../actions/servico_editar.php?id_servico=" + id_value, {
                method: 'GET'
            });

            let response = await dados_php.json();
            // console.log(response);

            // Preencher os campos do formulário
            const inputNome = document.getElementById("nome_ponto_atendimento");
            const inputCodigo = document.getElementById("identificador_ponto_atendimento");
            const inputId = document.getElementById("id_ponto_atendimento");
            const previewImagem = document.getElementById("preview_imagem_editar");

            inputNome.value = response.nome_servico;
            inputCodigo.value = response.codigo_servico;
            inputId.value = response.id_servico;

            // Carregar a imagem atual
            if (response.url_imagem_servico) {
                previewImagem.src = "../../public/img/uploads/" + response.url_imagem_servico;
                previewImagem.style.display = "block";
            } else {
                previewImagem.src = "#";
                previewImagem.style.display = "none";
            }

            // Guardar os dados originais
            dadosOriginais = {
                nome: response.nome_servico.trim(),
                codigo: response.codigo_servico.trim()
            };

            modalContainer.classList.add("show");

            // Botão VOLTAR
            buttonCancelar.addEventListener("click", () => {
                modalContainer.classList.remove("show");
            });

            // Botão SALVAR
            buttonSalvar.onclick = function (e) {
                e.preventDefault();

                const nomeAtual = inputNome.value.trim();
                const codigoAtual = inputCodigo.value.trim();

                // console.log("Nome Atual:", nomeAtual);
                // console.log("Código Atual:", codigoAtual); 
                
                document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.add("show");
                modalContainer.classList.remove("show");
                formAlterado = true;

            };

            // Botão NÃO na confirmação
            document.querySelector(".cancel_ConfDadosRegist").addEventListener("click", function () {
                document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
                modalContainer.classList.add("show");
            });

            // Botão SIM na confirmação -> Enviar dados
            document.querySelector(".save_ConfDadosRegist").addEventListener("click", async function () {
                if (!formAlterado) return;

                const myform = document.getElementById("formulario_editar_servico");
                const formData = new FormData(myform);

                console.log(formData);
                let dados2_php = await fetch("../actions/servico_editar.php", {
                    method: 'POST',
                    body: formData
                });

                let response2 = await dados2_php.json();
                console.log(response2);

                if (response2) {
                    document.getElementById("confirma_editar").classList.add("show");
                }

                document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
            });

            // Botão OK no modal final
            const buttonOkEditar = document.getElementById("btnOkEditar");
            buttonOkEditar.addEventListener("click", function () {
                const apareceMod = document.getElementById("confirma_editar");
                apareceMod.classList.remove("show");
                location.reload();
            });
        });
    });

    // Preview da nova imagem selecionada
    const inputImagem = document.getElementById('imagem_edit_servico');
    const previewImagem = document.getElementById('preview_imagem_editar');

    inputImagem.addEventListener('change', function () {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
                previewImagem.setAttribute('src', this.result);
                previewImagem.style.display = 'block';
            });
            reader.readAsDataURL(file);
        } else {
            previewImagem.setAttribute('src', '#');
            previewImagem.style.display = 'none';
        }
    });
});
