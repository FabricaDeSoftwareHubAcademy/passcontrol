const openModalBtns = document.querySelectorAll('.open-modal');
const modalContainer = document.querySelector('.modal-container');
const cancelButton = document.querySelector('.cancel');
const saveButton = document.querySelector('.save');

openModalBtns.forEach(button => {
    button.addEventListener('click', () => {
        const guicheId = button.getAttribute('data-id');
        const guicheStatus = button.getAttribute('data-status'); 

        modalContainer.classList.add('show');

        saveButton.setAttribute('data-id', guicheId);
        saveButton.setAttribute('data-status', guicheStatus); 
    });
});

cancelButton.addEventListener('click', () => {
    modalContainer.classList.remove('show');
});

saveButton.addEventListener('click', () => {
    const guicheId = saveButton.getAttribute('data-id');
    const guicheStatus = saveButton.getAttribute('data-status'); 

    fetch(`inativar_guiche.php?id_guiche=${guicheId}&status=${guicheStatus}`, {
        method: 'GET'
    })
    .then(response => response.text())
    .then(data => {
        console.log('Resposta do PHP:', data); 
        modalContainer.classList.remove('show');
        location.reload(); 
    })
    .catch(error => console.error('Erro:', error));
});
