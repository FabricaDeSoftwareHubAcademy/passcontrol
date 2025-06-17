<?php
require_once '../classes/Database.php';
session_start();

header('Content-Type: application/json');

// Verifica método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Método inválido.']);
    exit;
}

$nome = trim($_POST['nome_perfil_usuario'] ?? '');
$permissoes = $_POST['permissoes_selecionadas'] ?? [];
$idUsuario = $_SESSION['id_usuario'] ?? null;

// Validação básica
if (!$idUsuario) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Usuário não autenticado.']);
    exit;
}

if (empty($nome)) {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Informe o nome do perfil.']);
    exit;
}

try {
    $db = new Database();
    $conn = $db->getConnection();

    // Valida IDs de permissões recebidas para evitar inserção inválida
    if (!empty($permissoes)) {
        $stmtValida = $conn->prepare("SELECT id_permissao FROM permissao WHERE id_permissao = ?");
        $permissoesValidas = [];

        foreach ($permissoes as $idPermissao) {
            // Só aceita IDs inteiros positivos para segurança
            $idPermissao = (int)$idPermissao;
            if ($idPermissao <= 0) {
                continue;
            }
            $stmtValida->execute([$idPermissao]);
            if ($stmtValida->fetch()) {
                $permissoesValidas[] = $idPermissao;
            }
        }
        $permissoes = $permissoesValidas;
    }

    // Inicia transação
    $conn->beginTransaction();

    // Insere perfil
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

    // Insere vinculo perfil-permissões
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
    // Reverte transação em caso de erro
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    // Em produção, seria melhor logar $e->getMessage() ao invés de exibir
    echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar perfil.']);
}
