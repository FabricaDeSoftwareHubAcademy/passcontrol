<?php
require_once '../database/Database.php';

$bd = new Database();

$sql=' select fila_senha.id_fila_senha,
 fila_senha.nome_fila_senha,
 servico.nome_servico,
 fila_senha.fila_senha_chamada_in,
 fila_senha.fila_senha_encerrada_in,
 fila_senha.prioridade_fila_senha
 from fila_senha
 left join servico
 on fila_senha.id_servico_fk = servico.id_servico
 ORDER BY fila_senha.id_fila_senha ASC;';


$results=$bd->execute($sql)->fetchAll();

echo json_encode($results);