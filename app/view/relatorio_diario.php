<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório Diário | PassControl</title>
    <link rel="stylesheet" href="../../public/css/relatorio_diario.css">
    <link rel="stylesheet" href="../../public/css/navegacao.css">

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
                                    <input type="date" class="inputDate1">
                                    <input type="date" class="inputDate2">
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
                                    <input type="submit" value="Filtrar" class="inputFIltrar" id="btnFiltrar">
                                    <button onclick="exportarExcel()" class="inputFIltrar">Exportar Excel</button>
                                    <button onclick="exportarPDF()" class="inputFIltrar">Exportar PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="containerMainRd">
                    <!-- <table id="tabelaRelatorio" class="relatorio-tabela">
                        <thead>
                            <tr>
                                <th>ID</th><th>Fila</th><th>Prioridade</th><th>Data</th><th>Serviço</th><th>Local</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td colspan="6">Nenhum dado encontrado.</td></tr>
                        </tbody>
                    </table> -->

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
</body>
</html>
