const selecionarTodos = document.getElementById('selecionar-todos');
const checkboxes = document.querySelectorAll('.lista-servicos-configuracao-autoatendimento input[type="checkbox"]:not(#selecionar-todos)');

selecionarTodos.addEventListener('change', function() {
    checkboxes.forEach(checkbox => {
        checkbox.checked = selecionarTodos.checked;
    });
});