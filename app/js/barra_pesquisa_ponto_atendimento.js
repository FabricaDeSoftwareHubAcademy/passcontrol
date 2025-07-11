document.addEventListener('DOMContentLoaded', function () {
    console.log('JS carregado');

    const inputBusca = document.getElementById('buscar-Ponto-atendimento');
    if (!inputBusca) {
        console.warn('Input de busca não encontrado!');
        return;
    }

    inputBusca.addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        console.log('Digitando: ', filtro);

        const linhas = document.querySelectorAll('.tabela-ponto-atendimento tbody tr');

        linhas.forEach((linha) => {
            const tipo = linha.cells[0].textContent.toLowerCase();
            const identificador = linha.cells[1].textContent.toLowerCase();

            if (tipo.includes(filtro) || identificador.includes(filtro)) {
                linha.style.display = '';
            } else {
                linha.style.display = 'none';
            }
        });
    });
});