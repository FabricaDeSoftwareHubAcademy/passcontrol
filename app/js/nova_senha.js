// Função para verificar se todos os requisitos foram atingidos
function senhaAtendeTodosRequisitos(senha) {
  return (
    senha.length >= 8 &&
    /[A-Z]/.test(senha) &&
    /[0-9]/.test(senha) &&
    /[!@#$%^&*(),.?":{}|<>]/.test(senha)
  );
}

async function nova_senha() {
  // event.preventDefault();
  const url_id = new URLSearchParams(window.location.search);
  const id_user = url_id.get("id_user");

  let form_recuperar_senha = document.getElementById("form_recuperar_senha");
  let form_data = new FormData(form_recuperar_senha);

  form_data.append("id_usuario", id_user); // INSERE ID DO USUARIO NO FORM

  // console.log(form_data); // ---DEBUG

  // document.querySelector(".fundo-modal-envio-email").classList.add("show");

  let dados_php = await fetch("../actions/alterar_senha.php", {
    method: "POST",
    body: form_data,
  });

  let response = await dados_php.json();


  if (response.status === 200) {
    // document.querySelector(".fundo-modal-envio-email").classList.remove("show");
    document.querySelector(".fundo-container-confirmacao-dados").classList.add("show");
  } else {
    msg_erro = response.msg;
    // ADD MODAL DE ERRO
  }

  document.querySelector(".Okay_ConfDados").addEventListener("click", () => {
    document.querySelector(".fundo-container-confirmacao-dados").classList.remove("show");
    window.location.href = "../../index.php";
  });
}

// Ao clicar no botão "Salvar"
document.getElementById("btn_nova_senha").addEventListener("click", () => {
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