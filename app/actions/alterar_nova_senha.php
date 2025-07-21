<?php
session_start();
require_once '../classes/Usuario.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['id_usuario'] ?? null;
    $senha_atual = $_POST['senha_atual'] ?? '';
    $nova_senha = $_POST['nova_senha'] ?? '';
    $confirmar_senha = $_POST['confirmar_senha'] ?? '';

    if (!$id_usuario || !$senha_atual || !$nova_senha || !$confirmar_senha) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
        exit;
    }

    if ($nova_senha !== $confirmar_senha) {
        echo json_encode(['success' => false, 'message' => 'As senhas não coincidem.']);
        exit;
    }

    $usuario = new Usuario();

    // Verifica se a senha atual é válida

    if ($usuario->verificarSenhaAtual($id_usuario, $senha_atual)) {
        // se a senha atual corresponder ao hars do DB, então ira para $resulatado
    }else{
        // se a senha atual não corresponder ao hars do DB, então ira cair no falso no caso o succes: false
    echo json_encode(['success' => false, 'message' => 'Senha atual incorreta.']);
    exit;
    }

    // Atualiza para a nova senha
    $resultado = $usuario->definirNovaSenha($id_usuario, $nova_senha);

    // O método já retorna um JSON, então só precisa imprimir
    echo $resultado;
}
