document.addEventListener('DOMContentLoaded', () => {
  const formEditDados = document.getElementById('formEditDados');
  const modalContainer = document.querySelector('.edit_dados');
  const buttonAbrir = document.querySelector('.open-editar-dados');
  const buttonCancelar = document.querySelector('.cancel_AltDadosPessoais');

  const modalConfirmar = document.querySelector('.fundo-container-confirmacao-dados');
  const btnOkCadastrar = document.querySelector('.Okay_ConfDados');

  const inputFoto = document.getElementById('foto-login');
  const previewFoto = document.getElementById('preview-foto-login');

  const feedback = document.createElement('p');
  feedback.style.marginTop = '15px';
  formEditDados.appendChild(feedback);

  // abrir o modal_alterar_dados_login
  buttonAbrir?.addEventListener('click', () => {
    modalContainer.classList.add('show');
  });

  // cancelar a edição
  buttonCancelar?.addEventListener('click', () => {
    modalContainer.classList.remove('show');
    feedback.textContent = '';
    if (previewFoto) {
      previewFoto.style.display = 'none';
      previewFoto.src = '';
    }
  });

  // preview da imagem
  inputFoto?.addEventListener('change', () => {
    const file = inputFoto.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = () => {
        previewFoto.src = reader.result;
        previewFoto.style.display = 'block';
      };
      reader.readAsDataURL(file);
    } else {
      previewFoto.style.display = 'none';
      previewFoto.src = '';
    }
  });

  // envio do formulário com validação
  formEditDados?.addEventListener('submit', async (e) => {
    e.preventDefault();

    // validar antes do envio
    const nome = document.getElementById('nome-login').value.trim();
    const email = document.getElementById('email-login').value.trim();
    const foto = inputFoto.files[0];

    //  validação do e-mail
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      feedback.style.color = 'red';
      feedback.textContent = 'Informe um e-mail válido.';
      return;
    }

    //  validação do tipo da imagem
    if (foto && !foto.type.startsWith('image/')) {
      feedback.style.color = 'red';
      feedback.textContent = 'A imagem selecionada é inválida.';
      return;
    }

    // enviar dos dados depois validação
    const formData = new FormData(formEditDados);

    try {
      const response = await fetch('../../app/actions/alterar_dados.php', {
        method: 'POST',
        body: formData,
      });

      const result = await response.json();

      if (result.success) {
        modalContainer.classList.remove('show');
        modalConfirmar.classList.add('show');

        btnOkCadastrar.onclick = () => {
          modalConfirmar.classList.remove('show');
          location.reload();
        };
      } else {
        feedback.style.color = 'red';
        feedback.textContent = result.message || 'Erro ao salvar.';
      }
    } catch (error) {
      feedback.style.color = 'red';
      feedback.textContent = 'Erro na comunicação com o servidor.';
      console.error(error);
    }
  });
});
