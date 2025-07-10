<?php
require_once '../classes/Usuario.php';
require_once '../classes/Perfil.php';

$usuarios = new Usuario();
$dados = $usuarios->buscar(null, ' status_usuario DESC');
$servicos_prestados = $usuarios->select_servicos_atendidos();

$objperfil = new Perfil();
$perfis = $objperfil->buscar(null, ' id_perfil_usuario ASC');
?>