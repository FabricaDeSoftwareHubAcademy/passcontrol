document.addEventListener("DOMContentLoaded", function () {
    let podeEditar = false;
    let imagemInvalidaGlobal = false;
    let dadosOriginais = {};

    const inputImagem = document.getElementById('imagem_edit_servico');
    const previewImagem = document.getElementById('preview_imagem_editar');
    const modalConfirmacao = document.querySelector(".fundo-container-confirmacao-dados-registrados");
    const modalFinal = document.querySelector(".fundo-container-confirmacao-dados");
    const modalErro = document.querySelector(".modal-container-aviso-erro");
    const msgError = document.querySelector(".aviso-erro");
    const botaoErroVoltar = document.querySelector(".voltar_AvisoErro");

    function voltarDoErroHandlerEditar() {
        modalErro.classList.remove("show");
        document.querySelector(".modal-container-servico").classList.add("show");

        document.getElementById("nome_edit_servico").value = dadosOriginais.nome;
        document.getElementById("identificador_codigo_servico").value = dadosOriginais.codigo;
        document.getElementById("id_edit_servico").value = dadosOriginais.id;

        if (dadosOriginais.imagem) {
            previewImagem.src = "../../public/img/uploads/" + dadosOriginais.imagem;
            previewImagem.style.display = "block";
        } else{
            previewImagem.src = "#";
            previewImagem.style.display = "none";
        }

        msgError.innerHTML = "";
        imagemInvalidaGlobal = false;

        botaoErroVoltar.removeEventListener("click", voltarDoErroHandlerEditar);
    }

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

            const inputNome = document.getElementById("nome_edit_servico");
            const inputCodigo = document.getElementById("identificador_codigo_servico");
            const inputId = document.getElementById("id_edit_servico");

            inputNome.value = response.nome_servico;
            inputCodigo.value = response.codigo_servico;
            inputId.value = response.id_servico;

            if (response.url_imagem_servico) {
                previewImagem.src = "../../public/img/uploads/" + response.url_imagem_servico;
                previewImagem.style.display = "block";
            } else {
                previewImagem.src = "#";
                previewImagem.style.display = "none";
            }

            dadosOriginais = {
                nome: response.nome_servico.trim(),
                codigo: response.codigo_servico.trim(),
                id: response.id_aviso,
                imagem: response.url_imagem_servico
            };

            modalContainer.classList.add("show");

            buttonCancelar.onclick = () => {
                modalContainer.classList.remove("show");
            };

            buttonSalvar.onclick = function (e) {
                e.preventDefault();

                const nomeAtual = inputNome.value.trim();
                const codigoAtual = inputCodigo.value.trim();
                const arquivos = inputImagem.files[0];

                let erro = false;
                let imagemInvalida = false;
                const msgError = document.querySelector(".aviso-erro");
                msgError.innerHTML = "";

                // Validação campos
                if (!nomeAtual) {
                    msgError.innerHTML += "Preencha o nome do serviço!<br><br>";
                    erro = true;
                }

                if (!codigoAtual) {
                    msgError.innerHTML += "Preencha o código do serviço!<br><br>";
                    erro = true;
                }

                // Validação imagem nova 
                if (arquivos) {
                    const img_permitidos = [".png", ".jpg", ".jpeg"];
                    const regex = new RegExp("(" + img_permitidos.join('|').replace(/\./g, "\\.") + ")$", "i");

                    if (!regex.test(inputImagem.value.toLowerCase())) {
                        msgError.innerHTML += "Tipo de arquivo inválido! Permitidos: .png, .jpg e .jpeg<br><br>";
                        erro = true;
                        imagemInvalida = true;
                    }

                    if (!arquivos.type.startsWith("image/")) {
                        msgError.innerHTML += "Arquivo não é uma imagem válida.<br><br>";
                        erro = true;
                        imagemInvalida = true;
                    }
                }

                if (!erro) {
                    podeEditar = true;
                    modalContainer.classList.remove("show");
                    modalConfirmacao.classList.add("show");
                } else {
                    imagemInvalidaGlobal = imagemInvalida;
                    modalContainer.classList.remove("show");
                    modalErro.classList.add("show");

                    botaoErroVoltar.removeEventListener("click", voltarDoErroHandlerEditar);
                    botaoErroVoltar.addEventListener("click", voltarDoErroHandlerEditar);
                }
            };

            // Botão NÃO -> volta ao modal de edição
            document.querySelector(".cancel_ConfDadosRegist").onclick = function (){
                modalConfirmacao.classList.remove("show");
                modalContainer.classList.add("show");
                podeEditar = false;
            };

            // Botão SIM -> envia dados para o PHP
            document.querySelector(".save_ConfDadosRegist").onclick = async function (){
                if (!podeEditar) return;

                const myform = document.getElementById("formulario_editar_servico");
                const formData = new FormData(myform);

                modalConfirmacao.classList.remove("show");
                podeEditar = false;

                let dados2_php = await fetch("../actions/servico_editar.php", {
                    method: 'POST',
                    body: formData
                });

                let response2 = await dados2_php.json();

                if (response2) {
                    modalFinal.classList.add("show");
                }
            };

            // Botão OK -> fecha tudo e recarrega
            document.querySelector(".Okay_ConfDados").onclick = function () {
                modalFinal.classList.remove("show");
                location.reload();
            };
        });
    });

    // Preview da nova imagem (como no cadastro)
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
