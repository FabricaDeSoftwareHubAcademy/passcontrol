<?php
require_once "";
$serv = new Servico();
$servicos = $serv->buscar("status_servico = 'ativo'"); //LISTA SERVICOS
?>