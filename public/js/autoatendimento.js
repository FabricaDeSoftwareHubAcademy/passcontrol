/* function carregarAutoatendimento(event) {
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
 */

function carregarAutoatendimento(event) {
    if (event) event.preventDefault(); // Só impede o comportamento padrão se 'event' for passado

    const url = '../../app/view/tela_autoatendimento_page1.php';
    const area = document.getElementById("areaCards");

    if (!area) {
        console.warn('Elemento com ID "areaCards" não encontrado na página.');
        return;
    }

    fetch(url)
        .then(response => {
            // Garante que apenas respostas válidas "200" sejam processadas
            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }
            return response.text();
        })
        // Se houver algum erro, ele retorna essa mensagem
        .catch(error => {
            console.error("Erro ao carregar a página de Autoatendimento:", error);
        });
}