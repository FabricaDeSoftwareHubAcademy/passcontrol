document.addEventListener('DOMContentLoaded', function() {
    const selectGuiche = document.getElementById('inputGuiche');
    
    fetch('get_pontos.php')
        .then(response => response.json())
        .then(data => {
            // Limpa opções existentes (exceto a primeira)
            while (selectGuiche.options.length > 1) {
                selectGuiche.remove(1);
            }
            
            data.forEach(ponto => {
                const option = document.createElement('option');
                option.value = ponto.id_ponto_atendimento;
                option.textContent = ponto.identificador_ponto_atendimento;
                selectGuiche.appendChild(option);
            });
        });
});