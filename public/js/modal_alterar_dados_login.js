document.addEventListener('DOMContentLoaded', () => {
  const formEditDados = document.getElementById('formEditDados');
  const modalContainer = document.querySelector('.edit_dados');
  const buttonAbrir = document.querySelector('.open-editar-dados');
  const buttonCancelar = document.querySelector('.cancel_AltDadosPessoais');

  const modalConfirmar = document.querySelector('.fundo-container-confirmacao-dados');
  const btnOkCadastrar = document.querySelector('.Okay_ConfDados');

  const feedback = document.createElement('p');
  formEditDados.appendChild(feedback);

  buttonAbrir?.addEventListener('click', () => {
    modalContainer.classList.add('show');
  });

  buttonCancelar?.addEventListener('click', () => {
    modalContainer.classList.remove('show');
    feedback.textContent = '';
  });

  formEditDados?.addEventListener('submit', async (e) => {
    e.preventDefault();

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
