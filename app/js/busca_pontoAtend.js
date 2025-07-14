document.addEventListener("DOMContentLoaded", () => {
    fetch('../actions/get_pontos_atendimento.php')
      .then(response => response.json())
      .then(data => {
        const selectPonto = document.getElementById('inputGuiche');
        data.forEach(ponto => {
          const option = document.createElement('option');
          option.value = ponto.id_ponto_atendimento;
          option.textContent = ponto.nome_ponto_atendimento;
          selectPonto.appendChild(option);
        });
      })
      .catch(error => console.error('Erro ao carregar pontos de atendimento:', error));
  });
  