<?php
require_once '../classes/Perfil.php';

$perfil = new Perfil();

// Buscar apenas perfis ativos (status = 1), ordenados pelo nome
$perfis = $perfil->buscar('status_perfil_usuario = 1', 'nome_perfil_usuario ASC');

// A função de buscar permissões pode continuar aqui, caso precise
function buscarPermissoesPorPerfil($id_perfil_usuario) {
    $db = new Database('perfil_permissao');
    $result = $db->select("id_perfil_usuario = $id_perfil_usuario")->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) return ['Nenhuma'];
    $permissoes = [];
    $dbPermissao = new Database('permissao');

    foreach ($result as $linha) {
        $idPermissao = $linha['id_permissao'];
        $perm = $dbPermissao->select("id_permissao = $idPermissao")->fetch(PDO::FETCH_ASSOC);

        if ($perm) {
            $permissoes[] = $perm['nome_permissao'];
        }
    }
    return $permissoes;
}
