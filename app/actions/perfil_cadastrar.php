<?php
require_once '../classes/Database.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Método inválido.']);
    exit;
}

$nome = $_POST['nome_perfil_usuario'] ?? null;
$permissoes = $_POST['permissoes_selecionadas'] ?? [];
$idUsuario = $_SESSION['id_usuario'] ?? null;

if (!$nome) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Informe o nome do perfil.']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    // Inicia transação
    $conn->beginTransaction();

    // 1. Insere o novo perfil
    $stmt = $conn->prepare("
        INSERT INTO perfil_usuario (
            nome_perfil_usuario,
            status_perfil_usuario,
            perfil_usuario_created_by_id,
            perfil_usuario_created_in
        ) VALUES (?, 1, ?, NOW())
    ");
    $stmt->execute([$nome, $idUsuario]);

    $idPerfil = $conn->lastInsertId();

    // 2. Insere as permissões vinculadas (se houver)
    if (!empty($permissoes)) {
        $stmtPerm = $conn->prepare("
            INSERT INTO perfil_usuario_permissoes (id_perfil_usuario_fk, id_permissoes_fk)
            VALUES (?, ?)
        ");
        foreach ($permissoes as $idPermissao) {
            $stmtPerm->execute([$idPerfil, $idPermissao]);
        }
    }

    // Confirma transação
    $conn->commit();

    echo json_encode(['status' => 'ok', 'id' => $idPerfil, 'nome' => $nome]);
} catch (Exception $e) {
    $conn->rollBack();
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar: ' . $e->getMessage()]);
}
