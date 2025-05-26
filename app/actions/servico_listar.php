<?php
require_once "";
$serv = new Servico();
$servicos = $serv->buscar("status_servico = 'ativo'"); //LISTA SERVICOS

// // SELECTS ANTIGOS - DEFASADO
// $db_services = new Database('servico');
// $servicos = $db_services->execute("SELECT * FROM servico WHERE ativo = 'ativo'");
?>