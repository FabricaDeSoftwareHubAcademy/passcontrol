<?php
require_once "../classes/Perfil.php";

$obj_perfil = new Perfil();
$perfis = $obj_perfil->buscar(); //LISTA PERFIS
?>