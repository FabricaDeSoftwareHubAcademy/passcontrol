const openModalBtns = document.querySelectorAll('.open-modal');
const modalContainer = document.querySelector('.modal-container');
const cancelButton = document.querySelector('.cancel');
const saveButton = document.querySelector('.save');

openModalBtns.forEach(button => {
    button.addEventListener('click', () => {
        const guicheId = button.getAttribute('data-id');
        const guicheStatus = button.getAttribute('data-status'); // Obtém o status atual

        modalContainer.classList.add('show');

        saveButton.setAttribute('data-id', guicheId);
        saveButton.setAttribute('data-status', guicheStatus); // Passa o status para o botão de salvar
    });
});

cancelButton.addEventListener('click', () => {
    modalContainer.classList.remove('show');
});

saveButton.addEventListener('click', () => {
    const guicheId = saveButton.getAttribute('data-id');
    const guicheStatus = saveButton.getAttribute('data-status'); // Obtém o status do botão de salvar

    // Envia o id_guiche e o status para o backend
    fetch(`inativar_guiche.php?id_guiche=${guicheId}&status=${guicheStatus}`, {
        method: 'GET'
    })
    .then(response => response.text())
    .then(data => {
        console.log('Resposta do PHP:', data); 
        modalContainer.classList.remove('show');
        location.reload(); // Recarrega a página para atualizar o status visual
    })
    .catch(error => console.error('Erro:', error));
});
