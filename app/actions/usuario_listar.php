<?php
require_once '../classes/Usuario.php';
require_once '../classes/Perfil.php';

$usuarios = new Usuario();
$dados = $usuarios->buscar(null, ' status_usuario DESC');

$perfil = new Perfil();
$perfis = $perfil->buscar('status_perfil_usuario = 1', 'nome_perfil_usuario ASC');
?>