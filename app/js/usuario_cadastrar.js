// MODAIS
const modalConfirmarSalvarDadosUsu = document.querySelector(".fundo-container-confirmacao-dados-registrados");

// botoes save e volta
const confirmarSalvar = document.querySelector(".save_ConfDadosRegist");
const cancelarSalvar = document.querySelector(".cancel_ConfDadosRegist");

// modal de dados ok
const modalDadosSalvos = document.querySelector(".fundo-container-confirmacao-dados");
const buttonOk = document.querySelector(".Okay_ConfDados");

// MODAL ERRO

const modalErro = document.querySelector(".modal-container-aviso-erro");
const msgErro = document.querySelector(".aviso-erro");
const buttonOkErro = document.querySelector(".voltar_AvisoErro");

document.addEventListener("DOMContentLoaded", function () {
    // Máscara de CPF
    const cpfInput = document.getElementById('cpf_usuario');
    cpfInput.addEventListener('input', function () {
        let valor = cpfInput.value.replace(/\D/g, '');
        if (valor.length > 11) valor = valor.slice(0, 11);
        cpfInput.value = valor
            .replace(/^(\d{3})(\d)/, '$1.$2')
            .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
            .replace(/\.(\d{3})(\d)/, '.$1-$2');
    });

    // abre dropdown dos servicos
    btn_select_servico.addEventListener("click", function(){
        dropdown_select();
    });
    
    // Botão "Salvar"
    document.querySelector(".cadastrar_usuario").addEventListener("click", () => {
        const nome = document.getElementById('nome_usuario').value.trim();
        const email = document.getElementById('email_usuario').value.trim();
        const cpf = document.getElementById('cpf_usuario').value.trim();
        const perfil = document.querySelector('select[name="id_perfil_usuario"]').value;

        let erro = false;

        if (!nome) {
            document.getElementById('erro_nome').textContent = "Preencha o nome.";
            erro = true;
        } else document.getElementById('erro_nome').textContent = "";

        if (!email) {
            document.getElementById('erro_email').textContent = "Preencha o email.";
            erro = true;
        } else document.getElementById('erro_email').textContent = "";

        if (!cpf || !validarCPF(cpf)) {
            document.getElementById('erro_cpf').textContent = "CPF inválido.";
            erro = true;
        } else document.getElementById('erro_cpf').textContent = "";

        if (!perfil) {
            document.getElementById('erro_perfil').textContent = "Selecione um perfil.";
            erro = true;
        } else document.getElementById('erro_perfil').textContent = "";

        if (erro) return;

        modalConfirmarSalvarDadosUsu.classList.add("show");

        // MODAL CONFIRMACAO
        confirmarSalvar.addEventListener("click", async function (event) {
            event.preventDefault();
            
            var formCadastrarUsuario = new FormData(document.getElementById("dados_cad"));
            // console.log(formCadastrarUsuario);

            let enviar_dados = await fetch('../actions/usuario_cadastrar.php', {
                method: "POST",
                body: formCadastrarUsuario
            });

            let textResponse = await enviar_dados.text();
            // console.log("Resposta bruta do servidor:", textResponse);

            try {
                let response_post = JSON.parse(textResponse);
                msgErro.innerHTML = '';

                console.log(response_post);
                if(response_post.status === 'OK'){
                    modalConfirmarSalvarDadosUsu.classList.remove("show");
                    modalDadosSalvos.classList.add("show");

                    buttonOk.addEventListener("click", () => {
                        modalDadosSalvos.classList.remove("show");
                        location.href = './listar_usuarios.php';
                    });
                }else{
                    modalConfirmarSalvarDadosUsu.classList.remove("show");
                    console.log("Erro: ", response_post);
                    
                    msgErro.innerHTML += response_post.msg;
                    modalErro.classList.add("show");

                    buttonOkErro.addEventListener("click", function(){
                        formCadastrarUsuario = null;
                        modalErro.classList.remove("show");
                    })
                    return;
                }

            } catch (error) {
                console.error(`Erro ao analisar JSON: "${error}"`);
                // console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
                return;
            }
        });

        cancelarSalvar.addEventListener("click", () => {
            formCadastrarUsuario = null;
            modalConfirmarSalvarDadosUsu.classList.remove("show");
            return;
        });
    });
});