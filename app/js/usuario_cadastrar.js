// MODAIS
const modalConfirmarSalvarDadosUsu = document.querySelector(".fundo-container-confirmacao-dados-registrados");
const btn_select_servico = document.querySelector("");
const confirmarSalvar = document.querySelector(".save_ConfDadosRegist");
const cancelarSalvar = document.querySelector(".cancel_ConfDadosRegist");
const modalDadosSalvos = document.querySelector(".fundo-container-confirmacao-dados");
const buttonOk = document.querySelector(".Okay_ConfDados");

function toggleDropdown() {
      document.getElementById("select_servico_usuario").classList.toggle("select_show");
    }

    function toggleAll(source) {
      let checkboxes = document.querySelectorAll('.dropdown_select .option');
      checkboxes.forEach(cb => cb.checked = source.checked);
    }

    // Atualiza "Selecionar todos" se todas forem marcadas/desmarcadas manualmente
    document.querySelectorAll('.dropdown_select .option').forEach(cb => {
      cb.addEventListener('change', () => {
        let all = document.querySelectorAll('.dropdown_select .option');
        let selected = document.querySelectorAll('.dropdown_select .option:checked');
        document.getElementById("selectAll").checked = (all.length === selected.length);
      });
    });

    // Fecha dropdown ao clicar fora
    window.addEventListener('click', function(event) {
      if (!document.getElementById("checkboxDropdown").contains(event.target)) {
        document.getElementById("checkboxDropdown").classList.remove("select_show");
      }
    });

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

            const formCadastrarUsuario = new FormData(document.getElementById("dados_cad"));
            // console.log(formCadastrarUsuario);

            let enviar_dados = await fetch('../actions/usuario_cadastrar.php', {
                method: "POST",
                body: formCadastrarUsuario
            });

            let textResponse = await enviar_dados.text();
            // console.log("Resposta bruta do servidor:", textResponse);

            try {
                let response_post = JSON.parse(textResponse);

                if(response_post.status === 'OK'){
                    modalConfirmarSalvarDadosUsu.classList.remove("show");
                    modalDadosSalvos.classList.add("show");
    
                    buttonOk.addEventListener("click", () => {
                        location.href = './listar_usuarios.php';
                    });
                }else{
                    console.log("Erro: ", response_post.msg);
                    return;
                }

            } catch (error) {
                console.error("Erro ao analisar JSON:", error);
                // console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
            }
        });

        cancelarSalvar.addEventListener("click", () => {
            modalConfirmarSalvarDadosUsu.classList.remove("show");
        });
    });
});