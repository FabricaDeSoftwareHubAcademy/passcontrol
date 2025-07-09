<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['id_perfil_usuario_fk'])) {
    header("Location: ../../index.php");
    exit();
}

$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;

// Só o nome do arquivo (ex: atendimento.php)
$currentPage = basename($_SERVER['PHP_SELF']);

$pagesAuth = [
    5 => ['atendimento.php','menuadm_usuario.php','menuadm_servicos.php','menuadm_autoatendimento.php','monitor_modal.php','atendimento_tempo_real.php','relatorio_diario.php'],
    6 => ['atendimento.php','menusup_servicos.php','menusup_usuario.php','monitor_modal.php','atendimento_tempo_real.php','relatorio_diario.php'],
    7 => ['atendimento.php','monitor_modal.php']
];

if (!isset($pagesAuth[$id_perfil]) || !in_array($currentPage, $pagesAuth[$id_perfil])) {
    echo "Acesso negado à página: $currentPage";
    exit();
}
