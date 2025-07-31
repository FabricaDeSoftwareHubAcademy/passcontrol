<?php
session_start();
require_once __DIR__ . '../classes/Permissao.php';

$permissao = new Permissao();
$id_usuario = $_SESSION['user']['id']; // ajuste conforme seu login

if (!$permissao->temPermissao($id_usuario, 'editar_dados')) {
    http_response_code(403);
    echo json_encode(['status' => 'erro', 'mensagem' => 'Você não tem permissão para editar dados.']);
    exit;
}

// Se passou na permissão, prossiga com atualização dos dados
// ... seu código para atualizar os dados no banco aqui
