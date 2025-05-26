<?php

require_once "../classes/Perfil.php";

$perfil = new Perfil();
$perfis = $perfil->buscar(); //LISTA PERFIS

// // SELECT ANTIGO - DEFASADO
// $db_profiles = new Database("perfil");
// $perfis = $db_profiles->execute("SELECT * FROM perfil");
