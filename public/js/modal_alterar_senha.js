document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir_AltSenha = document.querySelector(".open-alterar-senha");
    const modalContainer_AltSenha = document.querySelector(".fundo-container-alterar-senha");
    const buttonCancelar_AltSenha = document.querySelector(".cancel_AltSenha");
    const buttonSalvar_AltSenha = document.querySelector(".save_AltSenha");
  
    const inputSenhaAtual = document.querySelector(".input-senha-atual");
    const inputNovaSenha = document.getElementById("nova_senha");
    const inputConfirmarSenha = document.getElementById("confirmar_senha");
  
    const erroNovaSenha = document.getElementById("erro_nova_senha");
    const erroConfirmarSenha = document.getElementById("erro_confirmar_senha");
  
    const modalConfirmar = document.querySelector(".fundo-container-confirmacao-dados");
    const btnOkCadastrar = document.querySelector(".Okay_ConfDados");
  
    buttonAbrir_AltSenha.addEventListener("click", () => {
      modalContainer_AltSenha.classList.add("show");
    });
  
    buttonCancelar_AltSenha.addEventListener("click", () => {
      modalContainer_AltSenha.classList.remove("show");
      limparCampos();
    });
  
    function limparCampos() {
      inputSenhaAtual.value = "";
      inputNovaSenha.value = "";
      inputConfirmarSenha.value = "";
      erroNovaSenha.textContent = "";
      erroConfirmarSenha.textContent = "";
    }
  
    function validarSenhas() {
      let valido = true;
      erroNovaSenha.textContent = "";
      erroConfirmarSenha.textContent = "";
  
      if (inputNovaSenha.value.length < 2) {
        erroNovaSenha.textContent = "A senha deve ter ao menos 2 caracteres.";
        valido = false;
      }
  
      if (inputConfirmarSenha.value !== inputNovaSenha.value) {
        erroConfirmarSenha.textContent = "As senhas não coincidem.";
        valido = false;
      }
  
      return valido;
    }
  
    buttonSalvar_AltSenha.addEventListener("click", async () => {
      if (!validarSenhas()) return;
  
      try {
        const formData = new FormData();
        formData.append("senha_atual", inputSenhaAtual.value);
        formData.append("nova_senha", inputNovaSenha.value);
        formData.append("confirmar_senha", inputConfirmarSenha.value);
  
        const response = await fetch("../../app/actions/alterar_nova_senha.php", {
          method: "POST",
          body: formData
        });
  
        const result = await response.json();
  
        if (result.success) {
          modalContainer_AltSenha.classList.remove("show");
          modalConfirmar?.classList.add("show");
  
          btnOkCadastrar?.addEventListener("click", () => {
            window.location.reload();
          });
        } else {
          erroConfirmarSenha.textContent = result.message || "Erro ao alterar a senha.";
        }
      } catch (error) {
        erroConfirmarSenha.textContent = "Erro na requisição.";
        console.error(error);
      }
    });
  });
  