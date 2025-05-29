<?php
session_start();
require_once(__DIR__ . '/../classes/usuario_primeiroacesso.php');

if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['primeiro_acesso'])) {
    header("Location: ../../index_primeiroacesso.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    if ($nova_senha !== $confirma_senha) {
        echo "<script>alert('As senhas não coincidem!');</script>";
    } else {
        $usuario = new Usuario();
        $id = $_SESSION['id_usuario'];

        // Criptografa a senha
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        if ($usuario->definirNovaSenha($id, $nova_senha)) {
            echo "<script>alert('Senha alterada com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao alterar a senha. Tente novamente.');</script>";
        }

        unset($_SESSION['primeiro_acesso']); // Não é mais o primeiro acesso
        header("Location: ./atendimento.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Trocar Senha</title>
</head>
<body>
    <h2>Primeiro Acesso - Alterar Senha</h2>
    <form method="post">
        <label>Nova Senha:</label>
        <input type="password" name="nova_senha" required><br><br>

        <label>Confirmar Nova Senha:</label>
        <input type="password" name="confirma_senha" required><br><br>

        <button type="submit">Alterar Senha</button>
    </form>
</body>
</html>
