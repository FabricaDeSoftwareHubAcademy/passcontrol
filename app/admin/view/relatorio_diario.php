<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
        <title>PassControl</title> 
        
        
        <!-- IMPORT DA FONTE -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        
        <!-- IMPORT DO CSS -->
        <link rel="stylesheet" href="../../../public/css/navegacao.css">
        <link rel="stylesheet" href="../../../public/css/menu_eli.css">
        <link rel="stylesheet" href="../../../public/css/relatorio_diario.css">

        <!-- IMPORT DO JS -->
        <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>

        <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->
        <div class="scrollmenu" style="display: flex; justify-content: start; align-items: start;">
            <a href="../../../app/admin/view/atendimento_tempo_real.php">Guichês</a>
            <a href="../../../app/admin/view/atendimento.php" class="active">Atendimento</a>
        </div>



        <div class="containerDelimitador">
            <div class="containerRelatioTitle">
                <h2>Relatório Diário</h2>
            </div>

            <div class="areaBrancaRd">
                <div class="containerOptionsLateral">
                    <div class="containerFiltro">
                        <div class="containerTitleFiltro">
                            <h3>Filtro</h3>
                        </div>

                        <div class="containerPeriodo">
                            <div class="periodoTitle">
                                <h3>Período</h3>
                            </div>
                            <div class="containerPeriodoFiltro">
                                <div class="containerInputDate">
                                    <input type="date" class="inputDate1">
                                    <input type="date" class="inputDate2">
                                </div>
                                <div class="containerInputLocal">
                                    <select name="local" id="inputLocal" palceholder="Profeitura de Campo Grande / MS">
                                        <option value="CampoGrandeMS">Campo Grande / ms</option>
                                    </select>
                                </div>
                                <div class="containerFiltrar">
                                    <input type="submit" value="FIltrar" class="inputFIltrar">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="containerMainRd">

                </div>
            </div>
        </div>
        <!-- FIM DA ÁREA ÚTIL DA PÁGINA -->
    </section>         

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php"
    ?>
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
</body>
</html>