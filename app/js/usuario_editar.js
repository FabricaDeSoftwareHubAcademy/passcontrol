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

            let [usuario, servico] = response; // ALOCA OS ARRAYS DA RESPONSE A VARIAVEIS SEPARADAS --Obg caique

            // console.log(response);

            // Preenche os campos do modal com os dados do usuário
            document.getElementById("id_usuario").value = usuario.id_usuario;
            document.getElementById("nome").value = usuario.nome_usuario;
            document.getElementById("email").value = usuario.email_usuario;
            document.getElementById("cpf").value = usuario.cpf_usuario;
            if(!usuario.url_foto_usuario){
                document.getElementById("foto_usuario").src = 'Imagem não encontrada.';
                document.getElementById("foto").alt = 'Imagem não encontrada.';
            }else{
                document.getElementById("foto_usuario").src = usuario.url_foto_usuario;
                document.getElementById("foto_nula").value = usuario.url_foto_usuario;
            }
            document.getElementById("id_perfil").value = usuario.id_perfil_usuario_fk;

            
            servico.forEach(function(id_servico){ // MARCA OS SERVICOS ATENDIDOS DO USUARIO
                document.querySelectorAll(".option_servico").forEach((checkbox) =>{

                    // console.log(checkbox, id_servico);

                    if(checkbox.getAttribute('value') == id_servico){
                        checkbox.checked = true;
                    }
                })
            });            

            modalContainerEdicao.classList.add("show"); //ABRE O MODAL


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

            // abre dropdown dos servicos
            btn_select_servico.addEventListener("click", function(){
                dropdown_select();
            });

            // ENVIAR DADOS EDITADOS CASO CLIQUE NO CONFIRMAR
            buttonSalvarEdicao.addEventListener("click", async (event) => {
                event.preventDefault();

                const nome = document.getElementById('nome').value.trim();
                const email = document.getElementById('email').value.trim();
                const cpf = document.getElementById('cpf').value.trim();
                const foto = document.getElementById('foto');
                const arquivo = foto.files[0];
                
                let erro = false;
                msgErro.innerHTML = '';
                
                if (!nome) {
                    msgErro.innerHTML += "Preencha o nome!<br><br>";
                    erro = true;
                } 
                if (!email) {
                    msgErro.innerHTML += "Preencha o email!<br><br>";
                    erro = true;
                } 
                if (!cpf || !validarCPF(cpf)) {
                    msgErro.innerHTML += "CPF inválido!<br><br>";
                    erro = true;
                }
                
                if (arquivo){
                    var arquivos_permitidos = [".png", ".jpg", ".jpeg"];
                    const regex = new RegExp("(" + arquivos_permitidos.join('|').replace(/\./g, "\\.") + ")$", "i");

                    if(!regex.test(foto.value.toLowerCase())){
                        msgErro.innerHTML += "Tipo de arquivo inválido! <br> Arquivos permitidos: .png, .jpg e .jpeg <br><br>";
                        erro = true;
                    }

                    // validacao MIME
                    if (!arquivo.type.startsWith("image/")) {
                        msgErro.innerHTML += "Arquivo não é uma imagem válida.<br><br>";
                        erro = true;
                    }
                }

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
                // console.log(formEditarUsu);
                
                // Envia os dados via POST
                let atualizar_dados = await fetch ('../actions/usuario_editar.php', {
                    method: "POST",
                    body: formEditarUsu
                })
                
                // Recebe a resposta bruta do server, basicamente um debug com esteroides
                let textResponse = await atualizar_dados.text();
                // console.log("Resposta bruta do servidor:", textResponse);  // Mostra o que o PHP está retornando

                try {
                    let response_post = JSON.parse(textResponse);
                    msgErro.innerHTML = '';

                    // console.log("Resultado: " + response_post.message);
                    if(response_post.status == "OK"){
                        // ABRE O MODAL DE ALTERACOES SALVAS
                        modalConfirmarAltDadosUsu.classList.remove("show");
                        modalAlteracaoFeita.classList.add("show");
    
                        buttonOk.addEventListener("click", ()=>{
                            modalAlteracaoFeita.classList.remove("show");
                            location.reload();
                        })
                    }else{
                        modalConfirmarAltDadosUsu.classList.remove("show");
                        console.log("Erro: ", response_post);
                        
                        msgErro.innerHTML += response_post.msg;
                        modalErro.classList.add("show");

                        buttonOkErro.addEventListener("click", function(){
                            formEditarUsu = null;
                            modalErro.classList.remove("show");
                        })
                        return;
                    }

                } catch (error) {
                    console.log("Erro ao analisar JSON: ", error.message);
                    // console.log("Conteúdo não pode ser analisado como JSON:", textResponse);
                }
            
            });


            buttonCancelarEdicao.addEventListener("click", () => {
                modalContainerEdicao.classList.remove("show");
            });
            
            buttonSalvarEdicao.addEventListener("click", () => {
                modalContainerEdicao.classList.remove("show");
            });
        });
    });
});