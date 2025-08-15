<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Relatório Diário | PassControl</title>
    <!-- Fontes e ícones -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../public/img/Logo-Nota-Controlnt.ico">
    <!-- SheetJS / jsPDF / Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JS custom -->
    <script src="../js/exportacao_relatorio.js" defer></script>
    <script src="../js/relatorio_dinamico.js" defer></script>
    <script src="../../app/js/busca_servicos.js" defer></script>
    <script src="../../app/js/busca_usuario.js" defer></script>
    <script src="../../app/js/busca_pontoAtend.js" defer></script>
</head>
<body class="control-body-navegacao">
    <?php 
    include "./navegacao.php";
    include "./monitor_modal.php";
    /* include "../actions/get_servicos.php"; */
    ?>
    <section class="Area-Util-Projeto">
        <!-- <div class="scrollmenu">
            <a href="atendimento_tempo_real.php">Guichês</a>
            <a href="atendimento.php" class="active">Atendimento</a>
        </div> -->
        <div class="containerDelimitador">
            <div class="containerRelatioTitle">
                <h2>Relatório Diário</h2>
            </div>
            <div class="areaBrancaRd">
                <div class="containerOptionsLateral">
                    <div class="containerFiltro">
                        <div class="containerTitleFiltro"><h3>Filtro/Período</h3></div>
                        <div class="containerPeriodo">
                            <div class="containerPeriodoFiltro">
                                <div class="containerInputDate">
                                    <input type="date" class="inputDate1" id="dataInicio">
                                    <input type="date" class="inputDate2" id="dataFim">
                                </div>
                                <div class="containerInputLocal">
                                    <select id="inputLocal">
                                        <option value="">Selecione um Serviço</option>
                                        <!-- <option value="INSS">INSS</option>
                                        <option value="IPTU">IPTU</option>
                                        <option value="Poda Arvore">Poda Arvore</option> -->
                                    </select>
                                </div>
                                <div class="containerInputAtendente">
                                    <select id="inputAtendente">
                                        <option value="">Selecione um Atendente</option>
                                    </select>
                                </div>
                                <div class="containerInputGuiche">
                                    <select id="inputGuiche">
                                        <option value="">Selecione um Guichê</option>
                                    </select>
                                </div>
                                <div class="containerFiltrar">
                                    <button type="button" class="inputFIltrar" id="btnFiltrar">Filtrar</button>
                                    <button type="button" onclick="exportarExcel()" class="inputFIltrar">Exportar Excel</button>
                                    <button type="button" onclick="exportarPDF()" class="inputFIltrar">Exportar PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="containerMainRd">
                    <table id="tabelaRelatorio" class="relatorio-tabela">
                        <thead>
                            <tr>
                                <th>Atendente</th>
                                <th>Serviço</th>
                                <th>Atendido</th>
                                <th>Prioridade</th>
                                <th>Data</th>                                
                                <th>Local</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="6">Nenhum dado encontrado.</td></tr>
                        </tbody>
                    </table>
                    <div style="margin-top: 40px;">
                        <canvas id="graficoBarras" height="120"></canvas>
                    </div>
                    <div style="margin-top: 40px;">
                        <canvas id="graficoPizza" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        // Garantir que o DOM esteja completamente carregado
        document.addEventListener('DOMContentLoaded', function() {
            // Definir datas padrão (hoje)
            const hoje = new Date().toISOString().split('T')[0];
            document.querySelector('.inputDate1').value = hoje;
            document.querySelector('.inputDate2').value = hoje;
            
            // Adicionar evento ao botão de filtrar
            const btnFiltrar = document.getElementById('btnFiltrar');
            if (btnFiltrar) {
                btnFiltrar.addEventListener('click', function() {
                    // Obter valores dos filtros
                    const dataInicio = document.querySelector('.inputDate1').value;
                    const dataFim = document.querySelector('.inputDate2').value;
                    const idServico = document.getElementById('inputLocal').value;
                    const idUsuario = document.getElementById('inputAtendente').value;
                    const idPonto = document.getElementById('inputGuiche').value;
                    
                    // Montar URL com parâmetros
                    const url = `get_relatorio.php?data_inicio=${dataInicio}&data_fim=${dataFim}&servico=${idServico}&atendente=${idUsuario}&guiche=${idPonto}`;
                    
                    // Fazer requisição
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            // Atualizar tabela
                            const tbody = document.querySelector('#tabelaRelatorio tbody');
                            tbody.innerHTML = '';
                            
                            if (data.length === 0) {
                                tbody.innerHTML = '<tr><td colspan="6">Nenhum dado encontrado.</td></tr>';
                                return;
                            }
                            
                            data.forEach(item => {
                                const row = tbody.insertRow();
                                row.insertCell(0).textContent = item.atendente;
                                row.insertCell(1).textContent = item.servico;
                                row.insertCell(2).textContent = item.atendido;
                                row.insertCell(3).textContent = item.prioridade;
                                row.insertCell(4).textContent = item.data_atendimento;
                                row.insertCell(5).textContent = item.local;
                            });
                            
                            // Atualizar gráficos
                            atualizarGraficos(data);
                        })
                        .catch(error => console.error('Erro:', error));
                });
                
                // Disparar evento de clique para carregar dados iniciais
                btnFiltrar.click();
            }
        });
        
        // Função para atualizar gráficos (se não existir no arquivo relatorio_dinamico.js)
        function atualizarGraficos(data) {
            // Gráfico de barras: atendimentos por atendente
            const atendimentosPorAtendente = {};
            data.forEach(item => {
                const atendente = item.atendente || 'Não informado';
                atendimentosPorAtendente[atendente] = (atendimentosPorAtendente[atendente] || 0) + 1;
            });
            
            const labelsBar = Object.keys(atendimentosPorAtendente);
            const dataBar = Object.values(atendimentosPorAtendente);
            
            const ctxBar = document.getElementById('graficoBarras').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: labelsBar,
                    datasets: [{
                        label: 'Atendimentos',
                        data: dataBar,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
            // Gráfico de pizza: atendimentos por prioridade
            const atendimentosPorPrioridade = { 'Normal': 0, 'Prioridade': 0 };
            data.forEach(item => {
                atendimentosPorPrioridade[item.prioridade]++;
            });
            
            const labelsPie = Object.keys(atendimentosPorPrioridade);
            const dataPie = Object.values(atendimentosPorPrioridade);
            
            const ctxPie = document.getElementById('graficoPizza').getContext('2d');
            new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: labelsPie,
                    datasets: [{
                        data: dataPie,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(255, 206, 86, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }
    </script>
</body>
</html>