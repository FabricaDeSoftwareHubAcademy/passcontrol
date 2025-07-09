document.addEventListener('DOMContentLoaded', function () {
    fetch('../actions/get_servicos.php')
        .then(res => res.json())
        .then(data => {
            const select = document.getElementById('inputLocal');
            data.forEach(servico => {
                const option = document.createElement('option');
                option.value = servico.nome_servico;
                option.textContent = servico.nome_servico;
                select.appendChild(option);
            });
        })
        .catch(err => {
            console.error('Erro ao carregar serviços:', err);
        });
});