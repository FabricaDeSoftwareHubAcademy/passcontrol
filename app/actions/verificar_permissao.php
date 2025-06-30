<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado e tem perfil
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['id_perfil_usuario_fk'])) {
    header("Location: ../../index.php"); // ajuste para sua página de login inicial
    exit();
}

$id_perfil = $_SESSION['id_perfil_usuario_fk'];

// Controle de acesso por perfil
switch ($id_perfil) {
    case 5:  // Admin
        if (strpos($_SERVER['PHP_SELF'], 'menuadm_fluxo.php') === false) {
            header("Location: ./app/view/menuadm_fluxo.php");

            exit();
        }
        break;

    case 7:  // Atendente
        if (strpos($_SERVER['PHP_SELF'], 'menuatend_fluxo.php') === false) {
            header("Location: ./app/view/menuatend_fluxo.php");
            exit();
        }
        break;

    case 6:  // Supervisor
        if (strpos($_SERVER['PHP_SELF'], 'menusup_fluxo.php') === false) {
            header("Location: ./app/view/menusup_fluxo.php");
            exit();
        }
        break;

    default:
        // Perfil desconhecido: bloquear acesso ou redirecionar
        echo "Acesso negado: perfil inválido.";
        exit();
}
?>
