// import modalConfirmacaoDados from "./modal_confirmacao_dados.js";
const salvarBtn = document.getElementById("btn_nova_senha");
// let btn_nova_senha = document.getElementById("btn_nova_senha");

// Função para verificar se todos os requisitos foram atingidos
function senhaAtendeTodosRequisitos(senha) {
  return (
    senha.length >= 8 &&
    /[A-Z]/.test(senha) &&
    /[0-9]/.test(senha) &&
    /[!@#$%^&*(),.?":{}|<>]/.test(senha)
  );
}

// Ao clicar no botão "Salvar"
salvarBtn.addEventListener("click", () => {
  const senha = document.getElementById("nova_senha").value.trim();
  const confSenha = document.getElementById("confirmar_senha").value.trim();
  let msg_erro = '';

  if (!senha || !confSenha) {
    // alert("Preencha todos os campos.");
    msg_erro = "Preencha todos os campos."
    return;
  }

  if (senha !== confSenha) {
    // alert("Senha e Confirmar Senha não conferem!");
    msg_erro = "Senha e Confirmar Senha não conferem!";
    return;
  }

  if (!senhaAtendeTodosRequisitos(senha)) {
    // alert("A senha não atende todos os requisitos.");
    msg_erro = "A senha não atende todos os requisitos!";
    return;
  }

  else {
    nova_senha();
  }
});



async function nova_senha() {
  e.preventDefault();

  const url_id = new URLSearchParams(window.location.search);
  const id_user = url_id.get("id_user");

  // console.log(id_user); // DEBUG

  let form_recuperar_senha = document.getElementById("form_recuperar_senha");
  let form_data = new FormData(form_recuperar_senha);
  
  form_data.id_usuario = id_user;

  // console.log(form_recuperar_senha); // DEBUG

  // console.log(form_data); // DEBUG

  let dados_php = await fetch("../actions/alterar_senha.php?id_user=" + id_user, {
    method: "POST",
    body: form_data,
  }
  );

  let response = await dados_php.json();

  modalConfirmacaoDados(); // atualmente chama a funcao do modal de confirmacao e reenvia a senha
}

function modalConfirmacaoDados() {
  const buttonAbrir_ConfDados = document.querySelector(
    ".open-confirmacao-dados"
  );
  const modalContainer_ConfDados = document.querySelector(
    ".fundo-container-confirmacao-dados"
  );
  const buttonFechar_ConfDados = document.querySelector(".Okay_ConfDados");
  const formRecuperarSenha = document.querySelector("#form_recuperar_senha");
  let btn_ok = document.querySelector(".Okay_ConfDados");

  function getIdFromURL() {
    const params = new URLSearchParams(window.location.search);
    return params.get("id_user"); // ou 'id_usuario', conforme estiver na URL
  }

  // Função para validar se as senhas coincidem
  function validarSenhas() {
    const novaSenha = document.querySelector("#nova_senha").value;
    const confirmarSenha = document.querySelector("#confirmar_senha").value;

    if (novaSenha === "" || confirmarSenha === "") {
      alert("Por favor, preencha todos os campos.");
      return false;
    }

    if (novaSenha !== confirmarSenha) {
      alert("As senhas não coincidem. Tente novamente.");
      return false;
    }

    return true;
  }

  // Abrir o modal após validação
  buttonAbrir_ConfDados.addEventListener("click", () => {
    if (validarSenhas()) {
      modalContainer_ConfDados.classList.add("show");
    }
  });

  // Fechar o modal e enviar os dados ao banco
  buttonFechar_ConfDados.addEventListener("click", async (e) => {
    e.preventDefault();

    let form_rec_senha = document.querySelector("#form_recuperar_senha");
    let formulario = new FormData(form_rec_senha);

    let idUsuario = getIdFromURL();
    let recuperar_senha = 1;

    // Adiciona ao formulário
    if (idUsuario) {
      formulario.append("id_user", idUsuario);
      formulario.append("recuperar_senha", recuperar_senha);
    }

    let dados_php = await fetch("../actions/alterar_senha.php", {
      method: "POST",
      body: formulario,
    });

    let response = await dados_php.json();

    console.log("Resposta do PHP:", response);

    if (response.status === 200) {
      // Exibe o modal de confirmação
      modalContainer_ConfDados.classList.add("show");

      btn_ok.addEventListener(
        "click",
        () => {
          modalContainer_ConfDados.classList.remove("show");
          window.location.href = "../../index.php";
        },
        { once: true }
      );
    } else {
      alert("Erro ao alterar a senha. Tente novamente.");
    }
  });
}
// btn_nova_senha.addEventListener("click",  async function(e) {
//     nova_senha();
// })
