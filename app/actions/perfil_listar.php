<?php

require_once "../classes/Perfil.php";

$perfil = new Perfil();
$perfis = $perfil->buscar(); //LISTA PERFIS

// print_r($perfis);