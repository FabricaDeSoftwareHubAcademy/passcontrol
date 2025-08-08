<?php
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    require_once '../database/Database.php';

    $filaDB = new Database('fila_senha');

    $idSenha = $_POST['id_senha'] ?? null;
    if (!$idSenha || !is_numeric($idSenha)) {
        echo json_encode(['success' => false, 'message' => 'ID da senha inválido.']);
        exit;
    }

    $update = $filaDB->update(
        'id_fila_senha = ' . (int)$idSenha,
        [
            'status_fila_senha' => 'atendido',
            'fila_senha_encerrada_in' => date('Y-m-d H:i:s'),
        ]
    );

    if ($update) {
        echo json_encode(['success' => true, 'message' => 'Atendimento encerrado com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao encerrar atendimento.']);
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erro no servidor: ' . $e->getMessage()]);
}
