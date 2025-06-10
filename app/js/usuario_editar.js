const modalContainerEdicao = document.querySelector(".fundo_editar_dados_usuario");
const buttonCancelarEdicao = modalContainerEdicao.querySelector(".cancel_edit_dados_usu");
const buttonSalvarEdicao = modalContainerEdicao.querySelector(".save_edit_dados_usu");
let formEditarUsuario = modalContainerEdicao.querySelector(".form_editar_dados_usuario");

// MODAL DE CONFIRMAÇÃO
const modalConfirmarAltDadosUsu = document.querySelector(".fundo-container-confirmacao-dados-registrados");
const confirmarEdicao = document.querySelector(".save_ConfDadosRegist");
const cancelarEdicao = document.querySelector(".cancel_ConfDadosRegist");

// MODAL RESPOSTA SUCESSO

const modalAlteracaoFeita = document.querySelector(".fundo-container-confirmacao-dados");
const buttonOk = document.querySelector(".Okay_ConfDados");

// MODAL ERRO

const modalErro = document.querySelector(".modal-container-aviso-erro");
const msgErro = document.querySelector(".aviso-erro");
const buttonOkErro = document.querySelector(".voltar_AvisoErro");


//JAVASCRIP PARA CLICAR NO BOTAO EDITAR E CARREGAR O MODAL COM OS DADOS

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".openEditar").forEach(button => {
        button.addEventListener("click", async function(event) {
            event.preventDefault(); // impede o recarregamento da pagina
            
            let userId = this.getAttribute("data-id");
            
            // Fazer requisição AJAX para buscar os dados do usuário
            let dados_php = await fetch("../actions/usuario_buscar.php?id=" + userId, {
                method: 'GET'
            })

            let response = await dados_php.json();
            
            console.log(response);

            // Preenche os campos do modal com os dados do usuário
            document.getElementById("id_usuario").value = response.id_usuario;
            document.getElementById("nome").value = response.nome_usuario;
            document.getElementById("email").value = response.email_usuario;
            document.getElementById("cpf").value = response.cpf_usuario;
            if(!response.url_foto_usuario){
                document.getElementById("foto_usuario").src = 'Imagem não encontrada.';
                document.getElementById("foto").src = '';
                // document.getElementById("foto").value = '';    // --- DA PROBLEMA
            }else{
                document.getElementById("foto_usuario").src = response.url_foto_usuario;
                document.getElementById("foto").src = response.url_foto_usuario;
                // document.getElementById("foto").value = response.url_foto_usuario;    // --- DA PROBLEMA
            }
            document.getElementById("id_perfil").value = response.id_perfil_usuario_fk;

            modalContainerEdicao.classList.add("show"); //ABRE O MODAL
        });
    });

    // MASCARA DO CPF
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function () {
        let valor = cpfInput.value.replace(/\D/g, '');
        if (valor.length > 11) valor = valor.slice(0, 11);
        cpfInput.value = valor
        .replace(/^(\d{3})(\d)/, '$1.$2')
        .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
        .replace(/\.(\d{3})(\d)/, '.$1-$2');
    });

    // ENVIAR DADOS EDITADOS CASO CLIQUE NO CONFIRMAR
    buttonSalvarEdicao.addEventListener("click", async (event) => {
        event.preventDefault();

        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const cpf = document.getElementById('cpf').value.trim();
        const foto = document.getElementById('foto').value.trim();

        let erro = false;
        msgErro.textContent = '';

        if (!nome) {
            msgErro.innerHTML += "Preencha o nome!<br>";
            erro = true;
        } 
        if (!email) {
            msgErro.innerHTML += "Preencha o email!<br>";
            erro = true;
        } 
        if (!cpf || !validarCPF(cpf)) {
            msgErro.innerHTML += "CPF inválido!<br>";
            erro = true;
        }

        // ----------------------COLOCAR VERIFICACAO DE TIPO DE ARQUIVO !!!!!!!!!

        if (!erro) {
            modalContainerEdicao.classList.remove("show");
            modalConfirmarAltDadosUsu.classList.add("show");
        }else{
            modalContainerEdicao.classList.remove("show");
            modalErro.classList.add("show");
        }
    });

    buttonOkErro.addEventListener("click", ()=>{
        modalErro.classList.remove("show");
        modalContainerEdicao.classList.add("show");
    })

    // CLIQUE NO NAO CONFIRMAR
    cancelarEdicao.addEventListener("click", () =>{
        modalConfirmarAltDadosUsu.classList.remove("show");
        modalContainerEdicao.classList.add("show");
    });

    confirmarEdicao.addEventListener("click", async function(event){
        event.preventDefault();

        const formEditarUsu = new FormData(document.getElementById("form_editar_dados_usuario"));
        console.log(formEditarUsu);
        
        // Envia os dados via POST
        let atualizar_dados = await fetch ('../actions/usuario_editar.php', {
            method: "POST",
            body: formEditarUsu
        })
        
        // Recebe a resposta bruta do server, basicamente um debug com esteroides
        let textResponse = await atualizar_dados.text();
        console.log("Resposta bruta do servidor:", textResponse);  // Mostra o que o PHP está retornando

        try {
            let response_post = JSON.parse(textResponse);
            console.log(response_post + " resposta do php");

            // ABRE O MODAL DE ALTERACOES SALVAS
            modalConfirmarAltDadosUsu.classList.remove("show");
            modalAlteracaoFeita.classList.add("show");

            buttonOk.addEventListener("click", ()=>{
                location.reload();
            })

        } catch (error) {
            console.error("Erro ao analisar JSON: ", error);
            console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
        }
     
    });

});

buttonCancelarEdicao.addEventListener("click", () => {
    modalContainerEdicao.classList.remove("show");
});

buttonSalvarEdicao.addEventListener("click", () => {
    modalContainerEdicao.classList.remove("show");
});