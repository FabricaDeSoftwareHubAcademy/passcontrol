
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <title>PassControl</title>
    
    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page1.css"> <!-- Atualização de caminho e renomeando o nome da pasta para letras minúsculas -->

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico"> <!-- Atualização de caminho -->
</head>

<body>
    <header class="head">
        <nav class="nav-head">
            <div class="logo-control">
                <a href="../../app/view/menuadm_autoatendimento.php"> <!-- Atualização de caminho -->
                <img src="../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo"> <!-- Atualização de caminho -->
                </a>
            </div>
            <h3>PassControl</h3>
        </nav>
    </header>

    <div class="border-line"></div>

    <main class="workspace">
        <div class="area-cinza">
            <h4 class="page-title">Selecione o serviço para o qual deseja atendimento:</h4>
            
            <div class="box-area" id="box-container">
                <!-- itens adicionados pelo js -->
            </div>

            <!-- controle da paginação -->

            <div class="pagination-controls">

                <button id="prevPage" disabled>Anterior</button>
            
                <button id="nextPage">Próximo</button>

            </div>
        </div>
    </main>

    <script src="../../public/js/tela-autoatendimento-paginação.js"></script> <!-- Atualização de caminho e renomeando o nome da pasta para letras minúsculas -->
</body>
</html>
