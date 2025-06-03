
<?php
session_start();
require_once('./app/usuario_primeiroacesso.php');

if (!isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$senha_atual = $_POST['senha_atual'] ?? '';
$nova_senha = $_POST['nova_senha'] ?? '';
$conf_senha = $_POST['conf_nova_senha'] ?? '';

$usuario = new Usuario();
$dados = $usuario->buscar("id_usuario = $id_usuario")[0];

if (!password_verify($senha_atual, $dados['senha_usuario'])) {
    die("Erro: senha atual incorreta.");
}

if ($nova_senha !== $conf_senha) {
    die("Erro: a nova senha e a confirmação não coincidem.");
}

// Atualiza a senha e marca como não sendo mais primeiro acesso
$usuario->definirNovaSenha($id_usuario, $nova_senha);
$_SESSION['primeiro_acesso'] = false;

// Redireciona para a tela principal
header("Location: ./app/view/atendimento.php");
exit;
