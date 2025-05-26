<?php
require_once "../classes/Servico.php";

$serv = new Servico();
$servicos = $serv->buscar(); //LISTA SERVICOS
?>