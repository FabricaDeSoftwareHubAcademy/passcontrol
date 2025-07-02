<?php
require_once "../classes/Servico.php";

$serv = new Servico();
$servicos = $serv->buscar("status_servico = 1", "nome_servico ASC");
?>