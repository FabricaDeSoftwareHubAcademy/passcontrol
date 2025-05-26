<?php
require_once '../classes/Usuario.php';

$usuarios = new Usuario();
$dados = $usuarios->buscar(null, ' status_usuario ASC');

?>