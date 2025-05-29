// Seleciona todos os elementos com a classe ".toggle-btn"
const toggleButtons = document.querySelectorAll('.toggle-btn');
    // Adiciona um ouvinte de click para cada botão
    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {button.classList.toggle('active');});
});