const modalContainerEdicao = document.querySelector(".fundo-editar-dados");
const buttonCancelarEdicao = modalContainerEdicao.querySelector(".cancel_AltDadosPessoais");
const buttonSalvarEdicao = modalContainerEdicao.querySelector(".save_AltDadosPessoais");
let formEditarUsuario = modalContainerEdicao.querySelector(".editarCadastro");

//JAVASCRIP PARA CLICAR NO BOTAO EDITAR E CARREGAR O MODAL COM OS DADOS

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".openEditar").forEach(button => {
        button.addEventListener("click", async function(event) {
            event.preventDefault(); // impede o recarregamento da pagina
            
            let userId = this.getAttribute("data-id");
            
            // Fazer requisição AJAX para buscar os dados do usuário
            let dados_php = await fetch("../../controller/usuario_buscar.php?id=" + userId, {
                method: 'GET'
            })
            
            let response = await dados_php.json();
            
            // console.log(response);
            
            
            // Preenche os campos do modal com os dados do usuário
            document.getElementById("id_usuario").value = response.id_usuario,
            document.getElementById("nome").value = response.nome,
            document.getElementById("email").value = response.email,
            document.getElementById("cpf").value = response.cpf,
            // document.getElementById("foto").value = response.foto //ESSE GOSTA DE DAR PROBLEMA
            document.getElementById("id_perfil").value = response.id_perfil

            
            modalContainerEdicao.classList.add("show"); //ABRE O MODAL
        });
    });

    // ENVIAR DADOS EDITADOS
    buttonSalvarEdicao.addEventListener("click", async function(event){
        event.preventDefault();

        const formEditarUsu = new FormData(document.getElementById("formEditarCadastro"));
        console.log(formEditarUsu);
        
        // Envia os dados via POST
        let atualizar_dados = await fetch ('../../controller/usuario_editar.php', {
            method: "POST",
            body: formEditarUsu
        })
        
        // Recebe a resposta bruta do server, basicamente um debug com esteroides
        let textResponse = await atualizar_dados.text();
        // console.log("Resposta bruta do servidor:", textResponse);  // Mostra o que o PHP está retornando

        try {
            let response_post = JSON.parse(textResponse);
            console.log(response_post + " resposta do php");
            location.reload();
        } catch (error) {
            console.error("Erro ao analisar JSON: ", error);
            console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
        }
        
        // esconde o modal
        modalContainerEdicao.classList.remove('show');        
    });

});

buttonCancelarEdicao.addEventListener("click", () => {
    modalContainerEdicao.classList.remove("show");
});

buttonSalvarEdicao.addEventListener("click", () => {
    modalContainerEdicao.classList.remove("show");
});