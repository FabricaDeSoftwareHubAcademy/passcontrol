document.addEventListener("DOMContentLoaded", () => {
    fetch('../actions/get_usuarios.php')  // ajuste o caminho se precisar
      .then(response => response.json())
      .then(data => {
        const selectAtendente = document.getElementById('inputAtendente');
        data.forEach(user => {
          const option = document.createElement('option');
          option.value = user.id_usuario;
          option.textContent = user.nome_usuario;
          selectAtendente.appendChild(option);
        });
      })
      .catch(error => console.error('Erro ao carregar atendentes:', error));
  });  