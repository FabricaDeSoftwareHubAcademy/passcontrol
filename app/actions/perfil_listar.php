<?php
require_once '../classes/Perfil.php';
require_once '../database/Database.php';

$perfil = new Perfil();
$perfis = $perfil->buscar('status_perfil_usuario = 1', 'nome_perfil_usuario ASC');

foreach ($perfis as $p) {
    $permissoes = $perfil->buscarNomesPermissoes($p['id_perfil_usuario']);
    echo "Perfil: {$p['nome_perfil_usuario']} - Permissões: " . implode(', ', $permissoes) . "<br>";
}
