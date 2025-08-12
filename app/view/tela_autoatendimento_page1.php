
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
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page1.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_saida.css">

    <!-- JS -->
    <script src="../../public/js/modal_confirmacao_saida.js" defer></script>

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="body-auto-atendimento">
    <?php
    include_once "../../public/modais/modal_confirmacao_saida.php";
    require_once '../../app/classes/Servico.php';
    $servico = new Servico();
    $listaServicos = $servico->buscar('status_servico = 1');
    ?>

<header class="head-tela-autoatendimento-pag1">
    <nav class="nav-head-tela-autoatendimento-pag1">
        <div class="logo-control-tela-autoatendimento-pag1 btn_sair">
            <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL"  id="img-logo">
            <!-- <a href="../../index.php">
                </a> -->
        </div>
            <h3>PassControl</h3>
        </nav>
    </header>
    
    <div class="border-line-tela-autoatendimento-pag1"></div>

    <main class="workspace-tela-autoatendimento-pag1">
        <div class="area-cinza-tela-autoatendimento-pag1">
            <h4 class="page-title-tela-autoatendimento-pag1">Selecione o serviço para o qual deseja atendimento:</h4>

            <div class="box-area-tela-autoatendimento-pag1" id="box-container">
                <?php foreach ($listaServicos as $serv): ?>
                    <a href="#" class="box"
                       data-id="<?= $serv->id_servico ?>"
                       data-nome="<?= htmlspecialchars($serv->nome_servico) ?>"
                       data-codigo="<?= htmlspecialchars($serv->codigo_servico) ?>"
                       data-img="<?= htmlspecialchars($serv->url_imagem_servico) ?>">
                        <img class="imagem-servico" src="../../public/img/uploads/<?= htmlspecialchars($serv->url_imagem_servico) ?>" alt="<?= htmlspecialchars($serv->nome_servico) ?>">
                        <h4><?= htmlspecialchars($serv->nome_servico) ?></h4>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- controle da paginação -->

            <div class="pagination-controls">
                <button id="prevPage" disabled>Anterior</button>
                <button id="nextPage">Próximo</button>
            </div>
            <div id="pageIndicator" style="display: none;"></div>
        </div>
    </main>
    <script src="../../public/js/tela_autoatendimento_paginação.js"></script>
</body>
</html>
