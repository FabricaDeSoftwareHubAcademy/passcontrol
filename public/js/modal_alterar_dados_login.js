const formEditDados = document.getElementById('formEditDados');
const modalContainer = document.querySelector('.edit_dados'); // ou modal específico
const buttonAbrir = document.querySelector('.open-editar-dados');
const buttonCancelar = document.querySelector('.cancel_AltDadosPessoais');
const feedback = document.createElement('p'); // para mensagens de erro/sucesso

formEditDados.appendChild(feedback);

buttonAbrir.addEventListener('click', () => {
  modalContainer.classList.add('show');
});

buttonCancelar.addEventListener('click', () => {
  modalContainer.classList.remove('show');
  feedback.textContent = '';
});

formEditDados.addEventListener('submit', async (e) => {
  e.preventDefault();

  const formData = new FormData(formEditDados);

  try {
    const response = await fetch('../../app/actions/alterar_dados.php', {
      method: 'POST',
      body: formData,
    });

    const result = await response.json();

    if (result.success) {
      feedback.style.color = 'green';
      feedback.textContent = result.message;
      setTimeout(() => {
        modalContainer.classList.remove('show');
        feedback.textContent = '';
        // opcional: atualizar elementos da página com os novos dados
        location.reload(); // para recarregar e atualizar sessão
      }, 1500);
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
