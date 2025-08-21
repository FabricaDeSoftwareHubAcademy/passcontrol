// BOTÃO ABRE MODAL DE CADASTRO
const btn_cadastrar_servico = document.getElementById("btn_cadastrar_servico");

// MODAL DE OK PARA FINALIZAR FLUXO DO CADASTRO
const apareceMod = document.querySelector(".fundo-container-confirmacao-dados");
const btnOkCadastrar = document.querySelector(".Okay_ConfDados");

// MODAL DE VALIDAÇÃO DE ARQUIVO IMAGEM
const modalError = document.querySelector(".modal-container-aviso-erro");
const msgError = document.querySelector(".aviso-erro");
const buttonOkError = document.querySelector(".voltar_AvisoErro")

// PRÉVIA DA IMAGEM A SER ADICIONADO
const inputImagem = document.getElementById("imagem_servico_cadastrar");
const previewImagem = document.getElementById("preview_imagem_cadastrar");

// CONSTANTE DA MASCARA SÓ DE LETRA 
const nomeServicoInput = document.getElementById("nome_servico_cadastrar");

// VARIAVES CONTROLE DO FLUXO DO CADASTRO
let controleCadastro = false;
let imagemInavlidacontorle = false;

function resetImgCadastro(){
  inputImagem.value = "";
  previewImagem.setAttribute("src", "#");
  previewImagem.style.display = "none";
  msgError.innerHTML = "";
}
function voltarModalError(){
  modalError.classList.remove("show");
  document.querySelector(".fundo-container-cad-servico").classList.add("show");

  if (imagemInavlida){
    resetImgCadastro();
  }else{
    msgError.innerHTML = "";
  }
  imagemInavlida = false;
  buttonOkError.removeEventListener("click", voltarModalError);
}

//Abre Modal de Cadastro
btn_cadastrar_servico.addEventListener("click", (event) => {
  event.preventDefault();
  document.querySelector(".fundo-container-cad-servico").classList.add("show");
});

// Cancelar cadastro
document.querySelector(".cancel_CadServ").addEventListener("click", () => {
  document.querySelector(".fundo-container-cad-servico").classList.remove("show");
});

// Salvar cadastro (validação + confirmação)
document.querySelector(".save_CadServ").addEventListener("click", function (event) {
  event.preventDefault();
  
  // Pegando os campos
  const nome_servico = document.getElementById("nome_servico_cadastrar").value.trim();
  const codigo_servico = document.getElementById("codigo_servico_cadastrar").value.trim();
  const imagem_servico = document.getElementById("imagem_servico_cadastrar");
  const arquivos = imagem_servico.files[0];
  
  let erro = false;
  let imagemInavlida = false;
  msgError.innerHTML = '';
  
  // Validação nome do serviço
  if (!nome_servico) {
    msgError.innerHTML += "Preencha o nome do serviço!<br><br>";
    erro = true;
  } 
  
  // Validação código
  if (!codigo_servico) {
    msgError.innerHTML += "Preencha o código do Serviço!<br><br>";
    erro = true;
    // msgError.innerHTML += "Origatório uma imagem do serviço!";
    // erro = true;
  } 
  
  // Validação imagem
  if(!arquivos) {
    msgError.innerHTML += "Obrigatório adicionar uma imagem para o serviço!<br><br>";
    erro = true;
    imagemInavlida = true;
  } else{
    const img_permitidos = [".png", ".jpg", ".jpeg",".jfif"];
    const regex = new RegExp("(" + img_permitidos.join('|').replace(/\./g, "\\.") + ")$", "i");
    
    if(!regex.test(imagem_servico.value.toLowerCase())){
      msgError.innerHTML += "Tipo de arquivo inválido! <br> Arquivos permitidos: .png, .jpg , .jpeg e .jfif <br><br>";
      erro = true;
      imagemInavlida = true;
    }
    if(!arquivos.type.startsWith("image/")){
      msgError.innerHTML += "Arquivo não é uma imagem válida.<br><br>";
      erro = true;
      imagemInavlida = true;
    }
  }
  // Se houver erro, não avança
  if (!erro) {
    controleCadastro = true;
    document.querySelector(".fundo-container-cad-servico").classList.remove("show");
    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.add("show");
  }else{
    imagemInavlidacontorle = imagemInavlida;
    document.querySelector(".fundo-container-cad-servico").classList.remove("show");
    modalError.classList.add("show");
    
  buttonOkError.removeEventListener("click", voltarModalError);
  buttonOkError.addEventListener("click", voltarModalError);
  }
});

  // NÃO na confirmação -> volta para o modal de cadastro
  document.querySelector(".cancel_ConfDadosRegist").addEventListener("click", () => {
    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
    document.querySelector(".fundo-container-cad-servico").classList.add("show");
    controleCadastro = false;
  });
  
  // SIM na confirmação -> envia os dados para o PHP
  document.querySelector(".save_ConfDadosRegist").addEventListener("click", async () => {
    if(!controleCadastro) return;

    const myform = document.getElementById("formulario_cadastrar_servico");
    const formData = new FormData(myform);
    
    document.querySelector(".fundo-container-confirmacao-dados-registrados").classList.remove("show");
    controleCadastro = false;
    
    try {
      const dados2_php = await fetch("../actions/servico_cadastrar.php", {
        method: "POST",
        body: formData,
      });
      
      const response = await dados2_php.json();
      
      if (response.status === "ok") {
        apareceMod.classList.add("show");
      } else {
        alert("Erro ao cadastrar: " + (response.message || "Erro desconhecido"));
      }
    } catch (error) {
      console.error("Erro na requisição:", error);
      alert("Erro de conexão com o servidor.");
    }
  });

// OK no sucesso -> fecha tudo e recarrega
btnOkCadastrar.addEventListener("click", () => {
  apareceMod.classList.remove("show");
  resetImgCadastro();
  location.reload();
});


inputImagem.addEventListener("change", function () {
  const file = this.files[0];
  
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      previewImagem.setAttribute("src", this.result);
      previewImagem.style.display = "block";
    });
    
    reader.readAsDataURL(file);
  } else {
    previewImagem.setAttribute("src", "#");
    previewImagem.style.display = "none";
  }
});

nomeServicoInput.addEventListener("input", function() {
        this.value = this.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, '');
    });