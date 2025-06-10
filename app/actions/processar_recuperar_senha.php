<?php
session_start();
require_once 'Database.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    
    if (empty($nova_senha) || empty($confirmar_senha)) {
        $_SESSION['mensagem'] = 'Por favor, preencha todos os campos.';
        header('Location: recuperar_senha_nova_senha.php');
        exit;
    }

    
    if ($nova_senha !== $confirmar_senha) {
        $_SESSION['mensagem'] = 'As senhas não coincidem.';
        header('Location: recuperar_senha_nova_senha.php');
        exit;
    }

    
    if (strlen($nova_senha) < 8 || 
        !preg_match('/[0-9]/', $nova_senha) || 
        !preg_match('/[A-Z]/', $nova_senha) || 
        !preg_match('/[\W_]/', $nova_senha)) {
        $_SESSION['mensagem'] = 'A senha não atende aos requisitos mínimos.';
        header('Location: recuperar_senha_nova_senha.php');
        exit;
    }

    
    try {
        
        $db = new Database('usuarios');

        
        $result = $db->update(
            "id = {$_SESSION['usuario_id']}",
            ['senha' => password_hash($nova_senha, PASSWORD_DEFAULT)] 
        );

        if ($result > 0) {
            $_SESSION['mensagem'] = 'Senha atualizada com sucesso!';
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar a senha. Tente novamente.';
        }

        header('Location: recuperar_senha_nova_senha.php');
        exit;
    } catch (Exception $e) {
        $_SESSION['mensagem'] = 'Erro ao atualizar a senha: ' . $e->getMessage();
        header('Location: recuperar_senha_nova_senha.php');
        exit;
    }
} else {
    
    $_SESSION['mensagem'] = 'Acesso inválido.';
    header('Location: recuperar_senha_nova_senha.php');
    exit;
}