<?php

$perfil = new Perfil();
$perfis = $perfil->buscar(); //LISTA PERFIS

// $serv = new Servico();
// $servicos = $serv->buscar("status_servico = 'ativo'"); //LISTA SERVICOS

// // SELECTS ANTIGOS - DEFASADO
// $db_profiles = new Database("perfil");
// $perfis = $db_profiles->execute("SELECT * FROM perfil");
// $db_services = new Database('servico');
// $servicos = $db_services->execute("SELECT * FROM servico WHERE ativo = 'ativo'");