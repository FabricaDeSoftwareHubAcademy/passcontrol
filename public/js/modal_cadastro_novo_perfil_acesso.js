const buttonAbrir_CadNovoPerfilAcesso = document.querySelector(".open-cadastro-novo-perfil-acesso");
const modalContainer_CadNovoPerfilAcesso = document.querySelector(".fundo-cadastro-novo-perfil-acesso");
const buttonFechar_CadNovoPerfilAcesso = document.querySelector(".close_CadNovoPerfilAcesso");
const buttonCancelar_CadNovoPerfilAcesso = document.querySelector(".cancel_CadNovoPerfilAcesso");
const buttonSalvar_CadNovoPerfilAcesso = document.querySelector(".save_CadNovoPerfilAcesso");

buttonAbrir_CadNovoPerfilAcesso.addEventListener("click", () => {
    modalContainer_CadNovoPerfilAcesso.classList.add("show");
});

buttonCancelar_CadNovoPerfilAcesso.addEventListener("click", () => {
    modalContainer.classList.remove("show");
});
buttonSalvar_CadNovoPerfilAcesso.addEventListener("click", () => {
    modalContainer_CadNovoPerfilAcesso.classList.remove("show");
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