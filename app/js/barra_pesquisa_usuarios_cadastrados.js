document.addEventListener('DOMContentLoaded', function () {
    // console.log('JS carregado');

    const inputBusca = document.querySelector('input[type="search"]');
    if (!inputBusca) {
        console.warn('Input de busca não encontrado!');
        return;
    }

    const tabela = document.querySelector('.tabela-listar-usuario');
    if (!tabela) {
        console.warn('Tabela não encontrada!');
        return;
    }

    inputBusca.addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        const linhas = tabela.querySelectorAll('tbody tr');

        linhas.forEach((linha) => {
            const colunas = linha.querySelectorAll('td');
            const match = Array.from(colunas).some(coluna =>
                coluna.textContent.toLowerCase().includes(filtro)
            );
            linha.style.display = match ? '' : 'none';
        });
    });
});