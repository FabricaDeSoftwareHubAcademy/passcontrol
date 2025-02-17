<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style_eli.css">
    
    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <header>
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
            <h2>Menu de Gestão</h2>
            <hr>
            <!-- <p>Área de Gestão do Admimistrador.</p> -->
        </div>
</body>

</html>