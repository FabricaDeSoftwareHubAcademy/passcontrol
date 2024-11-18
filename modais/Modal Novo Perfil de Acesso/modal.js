const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");
const buttonFechar = document.querySelector(".close");
const buttonCancelar = document.querySelector(".cancel");
const buttonSalvar = document.querySelector(".save");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});

buttonCancelar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});
buttonSalvar.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona o checkbox "Selecionar Todos"
    const selecionarTodos = document.getElementById('selecionar-todos');
   
    // Seleciona todos os checkboxes individuais
    const checkboxes = document.querySelectorAll('.checkbox-item');
   
    // Função para atualizar o estado dos checkboxes
    function atualizarCheckboxes() {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = selecionarTodos.checked; // Marca/desmarca todos os checkboxes
        });
    }
 
    // Quando o checkbox "Selecionar Todos" for clicado
    selecionarTodos.addEventListener('change', atualizarCheckboxes);
 
    // Quando qualquer checkbox individual for clicado
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            // Verifica se todos os checkboxes estão marcados
            const todosMarcados = Array.from(checkboxes).every(c => c.checked);
           
            // Se todos estiverem marcados, marca o "Selecionar Todos"
            selecionarTodos.checked = todosMarcados;
            // Se algum não estiver marcado, desmarque o "Selecionar Todos"
            selecionarTodos.indeterminate = !todosMarcados && Array.from(checkboxes).some(c => c.checked);
        });
    });
});