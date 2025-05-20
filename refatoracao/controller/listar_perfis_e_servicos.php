<?php
$db_profiles = new Database("perfil");
$perfis = $db_profiles->execute("SELECT * FROM perfil");

$db_services = new Database('servico');
$servicos = $db_services->execute("SELECT * FROM servico WHERE ativo = 'ativo'");
