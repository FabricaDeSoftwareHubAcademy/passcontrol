<?php
require_once '../classes/Perfil.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_perfil = $_POST['nome_perfil_usuario'] ?? null;
    $permissoes = $_POST['permissoes'] ?? []; // array com os IDs das permissões selecionadas
    $idUsuario = $_SESSION['id_usuario'] ?? null;

    if (!$nome_perfil || empty($permissoes)) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Preencha todos os campos.']);
        exit;
    }

    $perfil = new Perfil();

    // essa parte do codigo é para cadastrar perfil
    $idPerfil = $perfil->inserir([
        'nome_perfil_usuario' => $nome_perfil,
        'status_perfil_usuario' => 1,
        'perfil_usuario_created_in' => date('Y-m-d H:i:s'),
        'perfil_usuario_created_by_id' => $idUsuario
    ]);

    foreach ($permissoes as $idPermissao) {
        $perfil->vincularPermissao($idPerfil, $idPermissao);
    }

    echo json_encode(['status' => 'ok']);
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Requisição inválida.']);
}
?>
