<?php
require_once '../classes/Usuario.php';
require_once '../classes/Perfil.php';
require_once "../classes/Servico.php";

$usuarios = new Usuario();
$dados = $usuarios->buscar(null, ' status_usuario DESC');
$servicos_prestados = $usuarios->select_servicos_atendidos();

$objperfil = new Perfil();
$perfis = $objperfil->buscar('id_perfil_usuario = 5 OR id_perfil_usuario = 6 OR id_perfil_usuario = 7', ' id_perfil_usuario ASC');

$obj_servico = new Servico();
$servicos = $obj_servico->buscar("status_servico = 1", "nome_servico ASC");
?>