<?php
$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;

// Defina os menus de acordo com o perfil
$menusPorPerfil = [
    5 => [ // ADM
        ['href' => './menu_gestao_usuario.php', 'label' => 'Usuários'],
        ['href' => './menu_gestao_servico.php', 'label' => 'Serviços'],
        ['href' => './menu_gestao_autoatendimento.php', 'label' => 'Autoatendimento'],
    ],
    6 => [ // SUPERVISOR
        ['href' => './menu_gestao_usuario.php', 'label' => 'Usuários'],
        ['href' => './menu_gestao_servico.php', 'label' => 'Serviços'],
        // Pode adicionar mais se quiser
    ],
    // Adicione outros perfis se tiver
];

$menus = $menusPorPerfil[$id_perfil] ?? [];
?>

<!-- <body> -->
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