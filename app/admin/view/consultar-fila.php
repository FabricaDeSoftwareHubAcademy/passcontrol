<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PassControl</title>

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/consultar-fila.css">

    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- <div class="principal-consultar-fila"> -->
        <nav class="area-comum-consultar-fila">
            <nav class="topo-info-consultar-fila">
                <div class="topo-consultar-fila">
                    <div class="topo-esquerda-consultar-fila">
                        <h3>Fila de Espera</h3>
                    </div>
                    <div class="topo-direita-consultar-fila">
                        <div class="senhas-guiche-area-chamada">
                            <p>2</p>
                            <p>Senhas Na Fila</p>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="input-search">
                <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente">
            </div>
            <div class="fundo-guiche-area-chamada">
                <table class="tabela_atendimento-guiche-area-chamada">
                    <thead>
                        <tr>
                            <th>Ordem</th>
                            <th>Nome</th>
                            <th>Serviço</th>
                            <th>Senha</th>
                            <th>Início</th>
                            <th>Término</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#01</td>
                            <td>Gabriel Adernos</td>
                            <td>IPTU</td>
                            <td>CM002</td>
                            <td>10:30</td>
                            <td>11:16</td>
                            <td>Comum</td>

                        </tr>
                        <tr>
                            <td>#02</td>
                            <td>Gabriel Alvin</td>
                            <td>Ouvidoria</td>
                            <td>CM009</td>
                            <td>09:12</td>
                            <td>10:02</td>
                            <td>Comum</td>

                        </tr>
                        <tr>
                            <td>#03</td>
                            <td>Guilherme Machado</td>
                            <td>Licenças</td>
                            <td>CM015</td>
                            <td>11:18</td>
                            <td>11:46</td>
                            <td>Preferencial</td>

                        </tr>
                        <tr>
                            <td>#04</td>
                            <td>João Guilherme Ortigosa</td>
                            <td>Iluminação Publica</td>
                            <td>CM026</td>
                            <td>09:46</td>
                            <td>10:28</td>
                            <td>Comum</td>

                        </tr>
                        <tr>
                            <td>#05</td>
                            <td>Juliana Barbosa</td>
                            <td>Fiscalização</td>
                            <td>CM032</td>
                            <td>08:18</td>
                            <td>09:34</td>
                            <td>Preferencial</td>

                        </tr>
                </table>
            </div>
            <div class="div-botao-info">
                <button class="add-func" type="submit" onclick="window.location.href='../../../app/admin/view/atendimento.php';">Voltar</button>
            </div>
        </nav>
        <!-- </div> -->
    </section>

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>