<?php
session_start();
require_once '../database/Database.php';

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

    $db = new Database();
    $conn = $db->getConnection();

    // Buscar a senha atual no banco
    $stmt = $conn->prepare("SELECT senha_usuario FROM usuario WHERE id_usuario = :id");
    $stmt->bindParam(':id', $id_usuario);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Usuário não encontrado.']);
        exit;
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $senha_hash = $row['senha_usuario'];

    if (!password_verify($senha_atual, $senha_hash)) {
        echo json_encode(['success' => false, 'message' => 'Senha atual incorreta.']);
        exit;
    }

    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    $update = $conn->prepare("UPDATE usuario SET senha_usuario = :nova WHERE id_usuario = :id");
    $update->bindParam(':nova', $nova_senha_hash);
    $update->bindParam(':id', $id_usuario);

    if ($update->execute()) {
        echo json_encode(['success' => true, 'message' => 'Senha alterada com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar a senha.']);
    }
}
