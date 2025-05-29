<script>
    // Selecionar os elementos do modal e botão
    const btnSalvar = document.getElementById('btnSalvar');
    const modalSucesso = document.getElementById('modalSucesso');
    const closeModal = document.getElementById('closeModal');

    // Evento para exibir o modal ao clicar em "Salvar"
    btnSalvar.addEventListener('click', () => {
        modalSucesso.style.display = 'block'; // Mostrar modal
    });

    // Evento para fechar o modal ao clicar no "X"
    closeModal.addEventListener('click', () => {
        modalSucesso.style.display = 'none'; // Ocultar modal
    });

    // Fechar o modal ao clicar fora da área do conteúdo
    window.addEventListener('click', (event) => {
        if (event.target === modalSucesso) {
            modalSucesso.style.display = 'none';
        }
    });
</script>