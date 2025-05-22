// MODAL DE CONFIRMAÇÃO
const modalConfirmarSalvarDadosUsu = document.querySelector(".fundo-container-confirmacao-dados-registrados");
const confirmarSalvar = document.querySelector(".save_ConfDadosRegist");
const cancelarSalvar = document.querySelector(".cancel_ConfDadosRegist");

// MODAL RESPOSTA SUCESSO

const modalDadosSalvos = document.querySelector(".fundo-container-confirmacao-dados");
const buttonOk = document.querySelector(".Okay_ConfDados");

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".cadastrar_usuario").addEventListener("click", ()=> {
        modalConfirmarSalvarDadosUsu.classList.add('show');        
    });
    
    // ENVIAR DADOS DO FORM PARA CADASTRO CASO CLIQUE NO CONFIRMAR
    confirmarSalvar.addEventListener("click", async function(event){
        event.preventDefault();

        const formCadastrarUsuario = new FormData(document.getElementById("dados_cad"));
        // console.log(formCadastrarUsuario);
        
        // Envia os dados via POST
        let atualizar_dados = await fetch ('../actions/usuario_cadastrar.php', {
            method: "POST",
            body: formCadastrarUsuario
        })
        
        // Recebe a resposta bruta do server, basicamente um debug
        let textResponse = await atualizar_dados.text();
        // console.log("Resposta bruta do servidor:", textResponse);  // Mostra o que o PHP está retornando
        
        try {
            let response_post = JSON.parse(textResponse);
            console.log(response_post + " resposta do php");
            
            // ABRE O MODAL DE ALTERACOES SALVAS
            modalConfirmarSalvarDadosUsu.classList.remove("show");
            modalDadosSalvos.classList.add("show");
            
            buttonOk.addEventListener("click", ()=>{
                location.href='./listar_usuarios.php';
            })
            
        } catch (error) {
            console.error("Erro ao analisar JSON: ", error);
            console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
        }
    });

// CLIQUE NO NAO CONFIRMAR
    cancelarSalvar.addEventListener("click", () =>{
        modalConfirmarSalvarDadosUsu.classList.remove("show");
    });
});