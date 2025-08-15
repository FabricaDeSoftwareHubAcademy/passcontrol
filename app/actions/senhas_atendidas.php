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
left join usuario
on fila_senha.id_usuario_atendente = usuario.id_usuario
left join perfil_usuario 
on usuario.id_perfil_usuario_fk = perfil_usuario.id_perfil_usuario
where fila_senha.id_usuario_atendente = :id_usuario
ORDER BY fila_senha.id_fila_senha ASC;';

$id_usuario = $_POST['id_usuario'] ?? null;
$stmt = $bd->execute($sql, ['id_usuario' => $id_usuario]);
$results = $stmt->fetchAll();
// $results=$bd->execute($sql)->fetchAll();

echo json_encode($results);