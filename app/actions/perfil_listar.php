<?php
require_once '../classes/Perfil.php';
require_once '../database/Database.php';

$perfil = new Perfil();

// Buscar apenas perfis ativos (status = 1), ordenados pelo nome
$perfis = $perfil->buscar('status_perfil_usuario = 1', 'nome_perfil_usuario ASC');

// Buscar permissões vinculadas ao perfil
function buscarPermissoesPorPerfil($id_perfil_usuario) {
    $db = new Database('perfil_usuario_permissoes');
    $result = $db->select("id_perfil_usuario_fk = $id_perfil_usuario")->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) return ['Nenhuma'];

    $permissoes = [];
    $dbPermissao = new Database('permissoes');

    foreach ($result as $linha) {
        $idPermissao = $linha['id_permissoes_fk'];
        $perm = $dbPermissao->select("id_permissoes = $idPermissao")->fetch(PDO::FETCH_ASSOC);

        if ($perm) {
            $permissoes[] = $perm['nome_permissoes'];
        }
    }

    return $permissoes;
}
