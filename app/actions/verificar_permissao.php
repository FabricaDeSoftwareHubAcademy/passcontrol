<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redireciona para o login se não estiver logado
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['id_perfil_usuario_fk'])) {
    header("Location: ../../index.php");
    exit();
}

$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;
$currentPage = basename($_SERVER['PHP_SELF']);

$pagesAuth = [
    5 => [
    'tabela_teste.php',
    'atendimento.php',
    'menuadm_usuario.php',
    'menuadm_servicos.php',
    'menuadm_autoatendimento.php',
    'monitor_modal.php',
    'atendimento_do_dia.php',
    'listar_usuarios.php',
    'relatorio_diario.php',
    'cadastro_usuario.php',
    'ponto_atendimento.php',
    'servicos.php'],

    6 => ['atendimento.php',
    'menusup_servicos.php',
    'menusup_usuario.php',
    'monitor_modal.php',
    'atendimento_do_dia.php',
    'relatorio_diario.php',
    'listar_usuarios.php',
    'cadastro_usuario.php',
    'ponto_atendimento.php',
    'servicos.php'],

    7 => ['atendimento.php',
    'monitor_modal.php']
];

// SE NÃO TIVER PERMISSÃO
if (!isset($pagesAuth[$id_perfil]) || !in_array($currentPage, $pagesAuth[$id_perfil])) {
    include __DIR__ . '/../../public/modais/modal_aviso_acesso_negado.php';
    exit();
}


?>
