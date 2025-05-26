<?php

require_once "../classes/Perfil.php";

$perfil = new Perfil();
$perfis = $perfil->buscar(); //LISTA PERFIS

// print_r($perfis);

// // SELECT ANTIGO - DEFASADO
// $db_profiles = new Database("perfil");
// $perfis = $db_profiles->execute("SELECT * FROM perfil");
