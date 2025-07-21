<?php
require_once "../classes/Servico.php";

$obj_servico = new Servico();
$servicos = $obj_servico->buscar(null, "nome_servico ASC");
?>