let chartBar = null;
let chartPie = null;

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnFiltrar').addEventListener('click', () => {
        const dataInicio = document.querySelector('.inputDate1').value;
        const dataFim = document.querySelector('.inputDate2').value;
        const local = document.getElementById('inputLocal').value;

        if (!dataInicio || !dataFim) {
            alert('Informe as datas para filtrar.');
            return;
        }

        fetch(`../php/buscar_relatorio.php?inicio=${dataInicio}&fim=${dataFim}&local=${encodeURIComponent(local)}`)
            .then(res => res.json())
            .then(dados => {
                // Atualizar a tabela
                const tabela = document.querySelector('#tabelaRelatorio tbody');
                tabela.innerHTML = '';

                if (dados.length === 0) {
                    tabela.innerHTML = '<tr><td colspan="6">Nenhum resultado encontrado.</td></tr>';
                } else {
                    const servicosCount = {};
                    const datasCount = {};

                    dados.forEach(row => {
                        tabela.innerHTML += `
                            <tr>
                                <td>${row.id_fila_senha}</td>
                                <td>${row.nome_fila_senha}</td>
                                <td>${row.prioridade_fila_senha ? 'Sim' : 'Não'}</td>
                                <td>${row.fila_senha_created_in}</td>
                                <td>${row.nome_servico}</td>
                                <td>${row.nome_ponto_atendimento || 'N/A'}</td>
                            </tr>
                        `;

                        // Contagem para gráficos
                        servicosCount[row.nome_servico] = (servicosCount[row.nome_servico] || 0) + 1;
                        const dia = row.fila_senha_created_in.split(' ')[0];
                        datasCount[dia] = (datasCount[dia] || 0) + 1;
                    });

                    // Atualizar gráficos
                    atualizarGraficos(datasCount, servicosCount);
                }
            })
            .catch(err => {
                console.error('Erro ao buscar relatório:', err);
            });
    });

    // Inicializa gráficos vazios
    iniciarGraficosVazios();
});

function iniciarGraficosVazios() {
    const ctxBar = document.getElementById('graficoBarras').getContext('2d');
    chartBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Atendimentos por Dia',
                data: [],
                backgroundColor: 'rgba(55, 71, 79, 0.7)'
            }]
        },
        options: {
            responsive: true,
            plugins: { title: { display: true, text: 'Distribuição por Data' } }
        }
    });

    const ctxPie = document.getElementById('graficoPizza').getContext('2d');
    chartPie = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                label: 'Serviços',
                data: [],
                backgroundColor: ['#37474F', '#33404d', '#90A4AE', '#78909C', '#B0BEC5']
            }]
        },
        options: {
            responsive: true,
            plugins: { title: { display: true, text: 'Distribuição por Serviço' } }
        }
    });
}

function atualizarGraficos(dias, servicos) {
    // Gráfico de barras
    chartBar.data.labels = Object.keys(dias);
    chartBar.data.datasets[0].data = Object.values(dias);
    chartBar.update();

    // Gráfico de pizza
    chartPie.data.labels = Object.keys(servicos);
    chartPie.data.datasets[0].data = Object.values(servicos);
    chartPie.update();
}
