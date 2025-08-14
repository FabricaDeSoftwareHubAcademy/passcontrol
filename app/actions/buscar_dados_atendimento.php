<?php
require_once '../database/Database.php';

$bd = new Database();

$sql=' select 
    usuario.nome_usuario,
    perfil_usuario.nome_perfil_usuario,
    group_concat(distinct servico.nome_servico separator ",") as nome_servico
from usuario
left join perfil_usuario
    on usuario.id_perfil_usuario_fk = perfil_usuario.id_perfil_usuario
left join usuario_servico
    on usuario.id_usuario = usuario_servico.id_usuario_fk
left join servico
    on servico.id_servico = usuario_servico.id_servico_fk
group by 
    usuario.nome_usuario,
    perfil_usuario.nome_perfil_usuario;';


$results=$bd->execute($sql)->fetchAll();

echo json_encode($results);