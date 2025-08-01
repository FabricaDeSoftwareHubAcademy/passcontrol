<?php
session_start();


$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;

// Defina os menus de acordo com o perfil
$menusPorPerfil = [
    5 => [ // ADM
        ['href' => './menuadm_usuario.php', 'label' => 'Usuários'],
        ['href' => './menuadm_servicos.php', 'label' => 'Serviços'],
        ['href' => './menuadm_autoatendimento.php', 'label' => 'Autoatendimento'],
    ],
    6 => [ // SUPERVISOR
        ['href' => './menusup_usuario.php', 'label' => 'Usuários'],
        ['href' => './menusup_servicos.php', 'label' => 'Serviços'],
        // Pode adicionar mais se quiser
    ],
    // Adicione outros perfis se tiver
];

$menus = $menusPorPerfil[$id_perfil] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

    <!-- JS -->
    <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
    <script src="../../public/js/monitor_modal.js" defer></script>

    

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <div class="menu-container">
        <div class="menu">
            <button class="hamburger" onclick="toggleMenu()">☰</button>
            <?php foreach ($menus as $item): ?>
                <a href="<?= htmlspecialchars($item['href']) ?>" 
                   <?= (basename($_SERVER['PHP_SELF']) == basename($item['href'])) ? 'class="active"' : '' ?>>
                   <?= htmlspecialchars($item['label']) ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="menu-mobile" id="mobileMenu">
            <?php foreach ($menus as $item): ?>
                <a href="<?= htmlspecialchars($item['href']) ?>"
                   <?= (basename($_SERVER['PHP_SELF']) == basename($item['href'])) ? 'class="active"' : '' ?>>
                   <?= htmlspecialchars($item['label']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>
    <!-- <?php include "./navegacao.php"; ?> -->
    <div class="descricao">
        <!-- descrição opcional -->
    </div>
</body>

</html>
