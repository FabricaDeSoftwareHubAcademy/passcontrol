function carregarAutoatendimento(event) {
  event.preventDefault(); // Impede recarregamento da página

  fetch("../../usuario/view/tela_autoatendimentoPage1.php")
      .then(response => response.text())
      .then(html => {
          const area = document.getElementById("areaCards");
          if (area) {
              area.innerHTML = html;
          } else {
              console.warn('Elemento "areaCards" não encontrado!');
          }
      })
      .catch(err => {
          console.error("Erro ao carregar a página de Autoatendimento:", err);
          const area = document.getElementById("areaCards");
          if (area) {
              area.innerHTML = "<p>Erro ao carregar a página.</p>";
          }
      });
}
