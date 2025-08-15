document.addEventListener('DOMContentLoaded', function() {
    const selectServico = document.getElementById('inputLocal');
    
    fetch('get_servicos.php')
        .then(response => response.json())
        .then(data => {
            // Limpa opções existentes (exceto a primeira)
            while (selectServico.options.length > 1) {
                selectServico.remove(1);
            }
            
            data.forEach(servico => {
                const option = document.createElement('option');
                option.value = servico.id_servico;
                option.textContent = servico.nome_servico;
                selectServico.appendChild(option);
            });
        });
});