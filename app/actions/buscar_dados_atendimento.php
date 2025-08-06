<?php
require_once '../database/Database.php';

$bd = new Database();

$sql='select 
fila_senha.id_fila_senha,
fila_senha.id_usuario_atendente,
fila_senha.status_fila_senha,
servico.nome_servico,
perfil_usuario.nome_perfil_usuario,
ponto_atendimento.identificador_ponto_atendimento
from fila_senha 
inner join servico 
on fila_senha.id_servico_fk = servico.id_servico
inner join ponto_atendimento
on fila_senha.id_ponto_atendimento = ponto_atendimento.id_ponto_atendimento
left join usuario 
on fila_senha.id_usuario_atendente = usuario.id_usuario
left join perfil_usuario
on usuario.id_perfil_usuario_fk = perfil_usuario.id_perfil_usuario;';


$results=$bd->execute($sql)->fetchAll();

echo json_encode($results);