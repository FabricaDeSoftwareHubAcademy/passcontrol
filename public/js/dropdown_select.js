const btn_select_servico = document.querySelector(".selecao_servico");
const dropdown_select_menu = document.querySelector(".dropdown_select");
const select_all_servicos = document.getElementById("selectAll");
const option_servicos = document.querySelectorAll(".option_servico");

function dropdown_select() {
  // dropdown de selecao de servico

  dropdown_select_menu.classList.add("select_show");

  // checkbox de seleconionar todos os servicos
  select_all_servicos.addEventListener("change", function () {
    option_servicos.forEach((checkbox) => {
      checkbox.checked = select_all_servicos.checked;
    });
  });

  // atualizar o select all dinamicamente se marcar/desmarcar manualmente
  option_servicos.forEach((checkbox) => {
    checkbox.addEventListener("change", function () {
      const total = option_servicos.length;
      const checked = document.querySelectorAll(
        ".option_servico:checked"
      ).length;
      select_all_servicos.checked = total === checked;
    });
  });

  // fecha o dropdown ao clicar fora
  document.addEventListener("click", function (event) {
    if (!document.getElementById("select_servico_usuario").contains(event.target)) {
      dropdown_select_menu.classList.remove("select_show");
    }
  });
}
