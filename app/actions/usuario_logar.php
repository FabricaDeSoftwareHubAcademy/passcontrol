<?php
// app/actions/usuario_logar.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../Usuario.php';

if (isset($_POST['cpf'], $_POST['senha'])) {
    $cpf   = addslashes($_POST['cpf']);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();

    if ($usuario->logar($cpf, $senha)) {
        // Obtém o ID do usuário que foi armazenado em $_SESSION pela função logar()
        $id_usuario = $_SESSION['id_usuario'];

        // Busca os dados atuais do usuário (para saber se é primeiro_login)
        $dados_usuario = $usuario->buscar("id_usuario = $id_usuario")[0];

        // Se for o primeiro acesso, define a flag na sessão
        if ($dados_usuario['primeiro_login'] == 1) {
            $_SESSION['primeiro_login'] = true;
        }

        header('Location: ../../index.php');
        exit;
    } else {
        
        header('Location: ../../index.php?erro=1');
        exit;
    }
} else {
    // Se não foi enviado CPF ou senha, redireciona para a página principal
    header('Location: ../../index.php');
    exit;
}
