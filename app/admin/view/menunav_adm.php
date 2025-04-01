<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>PassControl</title> 
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <!-- navmenu .......-->
    <div class="menu-container">
        <div class="menu">
            <button class="hamburger" onclick="toggleMenu()">☰</button>
            <a href="./menuadm_usuario.php">Usuários</a>
            <a href="./menuadm_servicos.php">Serviços</a>
            <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a>
            <a href="./menusup_usuario.php">SUP</a>
        </div>
        <div class="menu-mobile" id="mobileMenu">
            <a href="./menuadm_usuario.php">Usuários</a>
            <a href="./menuadm_servicos.php">Serviços</a>
            <a href="./menuadm_autoatendimento.php" class="active">Autoatendimento</a>
            <a href="./menusup_usuario.php">SUP</a>
        </div>
    </div>
    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
    <div class="descricao">
        <!-- <h2>Menu de Gestão</h2> -->
        
        <!-- <p>Área de Gestão do Admimistrador.</p> -->
    </div>
</body>

</html>