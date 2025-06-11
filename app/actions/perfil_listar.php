<?php
require_once '../classes/Usuario.php';
require_once '../database/Database.php';

// Instancia a classe que acessa o banco
$db = new Database('perfil_usuario');

// Obtém todos os perfis da tabela perfil_usuario
$perfis = $db->select()->fetchAll(PDO::FETCH_ASSOC);

// Função auxiliar para buscar permissões de um perfil específico
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
