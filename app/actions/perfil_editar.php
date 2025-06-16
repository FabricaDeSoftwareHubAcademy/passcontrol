<?php
require_once '../classes/Perfil.php';
session_start();

$perfil = new Perfil();

if (isset($_GET['id_perfil_usuario'])) {
    $id = $_GET['id_perfil_usuario'];
    $dadosPerfil = $perfil->buscarPorId($id);
    $permissoes = $perfil->buscarPermissoes($id);

    echo json_encode([
        'perfil' => $dadosPerfil,
        'permissoes' => $permissoes
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_perfil = $_POST['id_perfil_usuario'] ?? null;
    $nome = $_POST['nome_perfil_usuario'] ?? null;
    $permissoes = $_POST['permissoes'] ?? [];
    $idUsuario = $_SESSION['id_usuario'] ?? null;

    if (!$id_perfil || !$nome) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Dados incompletos.']);
        exit;
    }

    $atualizado = $perfil->atualizar($id_perfil, [
        'nome_perfil_usuario' => $nome,
        'perfil_usuario_updated_in' => date('Y-m-d H:i:s'),
        'perfil_usuario_updated_by_id' => $idUsuario
    ]);

    if ($atualizado) {
        //codogo para remover permissões antigas e adicionar novas
        $perfil->removerPermissoes($id_perfil);
        foreach ($permissoes as $idPermissao) {
            $perfil->vincularPermissao($id_perfil, $idPermissao);
        }

        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao atualizar o perfil.']);
    }
}
?>
