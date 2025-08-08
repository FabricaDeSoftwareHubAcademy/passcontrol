<?php
session_start();
require_once '../actions/verificar_permissao.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../index.php");
    exit();
}

$id_perfil = $_SESSION['id_perfil_usuario_fk'] ?? null;

$adm = ['atendimento.php', 'monitor_modal.php', 'menu_gestao_usuario.php', 'relatorio_diario.php'];
$sup = ['atendimento.php', 'monitor_modal.php', 'menu_gestao_usuario.php', 'relatorio_diario.php'];
$atend = ['atendimento.php', 'monitor_modal.php'];
$totem = [];

switch ($id_perfil) {
    case 5:
        $menus = $adm;
        break;
    case 6:
        $menus = $sup;
        break;
    case 7:
        $menus = $atend;
        break;

    default:
        $menus = [];
}

$nomeExibicao = [
    'atendimento.php' => 'Atendimento',
    'monitor_modal.php' => 'monitor',
    'menu_gestao_usuario.php' => 'Gestão',
    'relatorio_diario.php' => 'Relatórios',
];

$icones = [
    'Atendimento' => '../../public/img/icons/atend.svg',
    'monitor' => '../../public/img/icons/monitor.svg',
    'Gestão' => '../../public/img/icons/gestao.svg',
    'Relatórios' => '../../public/img/icons/nota.svg',
];

?>