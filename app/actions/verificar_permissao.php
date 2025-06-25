<?php
session_start();
require_once '../classes/Permissao.php';

// 1. Verifica se usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$perm = new Permissao();

// 2. Defina a permissão que será verificada nesta página
// Para facilitar reutilização, pode passar via variável antes do include
if (!isset($nome_permissao_necessaria)) {
    // Caso não tenha sido definida a permissão, definir padrão ou negar acesso
    $nome_permissao_necessaria = 'acessar_tela_admin';
}

// 3. Verifica se o usuário tem essa permissão
if (!$perm->temPermissao($id_usuario, $nome_permissao_necessaria)) {
    header("Location: ../view/acesso_negado.php");
    exit();
}

// Se passou por todos os testes, continua execução da página normalmente
?>
