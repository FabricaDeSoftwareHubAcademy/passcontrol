<?php
require_once '../classes/Usuario.php';
require_once '../classes/Perfil.php';

$usuarios = new Usuario();
$dados = $usuarios->buscar(null, ' status_usuario DESC');

$objperfil = new Perfil();
$perfis = $objperfil->buscar('id_perfil_usuario = 5 OR id_perfil_usuario = 6 OR id_perfil_usuario = 7', ' id_perfil_usuario ASC');

$servicos_prestados = $usuarios->select_servicos_atendidos();
?>