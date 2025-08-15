<?php
require_once '../database/Database.php';

$bd = new Database();


$sql='select 
usuario.nome_usuario,
perfil_usuario.nome_perfil_usuario,
group_concat(distinct servico.nome_servico separator ",") as nome_servico,
group_concat(distinct ponto_atendimento.identificador_ponto_atendimento separator ",") as identificador_ponto_atendimento,
ponto_atendimento.disponivel_ponto_atendimento
from usuario 
left join perfil_usuario 
on usuario.id_perfil_usuario_fk = perfil_usuario.id_perfil_usuario
 inner join fila_senha
 on fila_senha.id_usuario_atendente = usuario.id_usuario
left join servico
on servico.id_servico = fila_senha.id_servico_fk
left join ponto_atendimento
on fila_senha.id_ponto_atendimento = ponto_atendimento.id_ponto_atendimento
left join expediente
on usuario.id_usuario = expediente.id_usuario_fk
group by
usuario.nome_usuario,
perfil_usuario.nome_perfil_usuario;';

$results=$bd->execute($sql)->fetchAll();

echo json_encode($results);