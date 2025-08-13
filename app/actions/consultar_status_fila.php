<?php
require_once '../database/Database.php';

if (!isset($_GET['id'])) {
    echo json_encode(['erro' => 'ID não informado']);
    exit;
}

$id = intval($_GET['id']);

try {
    $db = (new Database())->getConnection();
    $stmt = $db->prepare("SELECT status_fila_senha AS status, fila_senha_iniciada_in FROM fila_senha WHERE id_fila_senha = ?");
    $stmt->execute([$id]);
    $senha = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($senha) {
        echo json_encode($senha);
    } else {
        echo json_encode(['erro' => 'Senha não encontrada']);
    }
} catch (Exception $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}
