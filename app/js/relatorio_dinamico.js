let chartBar = null;
let chartPie = null;

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btnFiltrar').addEventListener('click', () => {
        const dataInicio = document.querySelector('.inputDate1').value;
        const dataFim = document.querySelector('.inputDate2').value;
        const local = document.getElementById('inputLocal').value;
        const atendente = document.getElementById('inputAtendente').value;
        const guiche = document.getElementById('inputGuiche').value;

        if (!dataInicio || !dataFim) {
            alert('Informe as datas para filtrar.');
            return;
        }

        fetch(`../actions/buscar_dados_relatorio.php?inicio=${dataInicio}&fim=${dataFim}&local=${encodeURIComponent(local)}&atendente=${encodeURIComponent(atendente)}&guiche=${encodeURIComponent(guiche)}`)
            .then(res => res.json())
            .then(dados => {
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

                        // Garantir data no formato ISO YYYY-MM-DD
                        const data = new Date(row.fila_senha_created_in);
                        const dia = data.toISOString().split('T')[0];

                        datasCount[dia] = (datasCount[dia] || 0) + 1;
                        servicosCount[row.nome_servico] = (servicosCount[row.nome_servico] || 0) + 1;
                    });

                    console.log("Contagem por data:", datasCount); // para depurar
                    console.log("Contagem por serviço:", servicosCount); // para depurar

                    atualizarGraficos(datasCount, servicosCount);
                }
            })
            .catch(err => {
                console.error('Erro ao buscar relatório:', err);
            });
    });

    iniciarGraficosVazios();
});

function obterDataAtual() {
    const hoje = new Date();
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, '0');
    const dia = String(hoje.getDate()).padStart(2, '0');
    return `${ano}-${mes}-${dia}`;
}

function iniciarGraficosVazios() {
    const aguardandoPlugin = {
        id: 'aguardandoFiltro',
        beforeDraw: (chart) => {
            const { ctx, width, height } = chart;
            ctx.save();
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.font = '16px Arial';
            ctx.fillStyle = '#888';
            ctx.fillText('Aguardando filtro...', width / 2, height / 2);
            ctx.restore();
        }
    };

    const ctxBar = document.getElementById('graficoBarras').getContext('2d');
    chartBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Atendimentos por Dia',
                data: [],
                backgroundColor: ['#3aa867', '#5fbe7f']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribuição por Data'
                }
            }
        },
        plugins: [aguardandoPlugin]
    });

    const ctxPie = document.getElementById('graficoPizza').getContext('2d');
    chartPie = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: [],
            datasets: [{
                label: 'Serviços',
                data: [],
                backgroundColor: ['#37474F', '#5fbe7f', '#3aa867']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Distribuição por Serviço'
                }
            }
        },
        plugins: [aguardandoPlugin]
    });
}

function atualizarGraficos(datasCount, servicosCount) {
    const datas = Object.keys(datasCount).sort();
    const valoresDatas = datas.map(d => datasCount[d]);

    chartBar.data.labels = datas;
    chartBar.data.datasets[0].data = valoresDatas;
    chartBar.config.plugins = []; // remove o plugin "aguardando"
    chartBar.update();

    const servicos = Object.keys(servicosCount);
    const valoresServicos = servicos.map(s => servicosCount[s]);

    chartPie.data.labels = servicos;
    chartPie.data.datasets[0].data = valoresServicos;
    chartPie.config.plugins = []; // remove o plugin "aguardando"
    chartPie.update();
}
