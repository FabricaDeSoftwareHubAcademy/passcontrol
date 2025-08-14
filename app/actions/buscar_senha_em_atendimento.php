<?php
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    require_once '../database/Database.php';

    $idGuiche = $_POST['id_guiche'] ?? null;

    if (!$idGuiche || !is_numeric($idGuiche)) {
        echo json_encode(['success' => false, 'message' => 'Guichê inválido']);
        exit;
    }

    $filaDB = new Database('fila_senha');

    $res = $filaDB->select(
        "id_ponto_atendimento = " . (int)$idGuiche . " AND status_fila_senha = 'em atendimento'",
        'id_fila_senha ASC',
        '1'
    );

    $senha = $res->fetch(PDO::FETCH_ASSOC);

    if ($senha) {
        echo json_encode([
            'success' => true,
            'senha' => [
                'id_fila_senha' => $senha['id_fila_senha'],
                'nome_fila_senha' => $senha['nome_fila_senha'] ?? $senha['id_fila_senha']
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Nenhuma senha em atendimento para este guichê']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no servidor: ' . $e->getMessage()]);
}
