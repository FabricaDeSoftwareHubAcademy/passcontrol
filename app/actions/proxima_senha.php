<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../classes/FilaSenha.php';

$filaSenha = new FilaSenha();

$idGuiche = $_POST['id_guiche'] ?? null;
$idUsuario = $_SESSION['id_usuario'] ?? null;

if (!$idGuiche || !is_numeric($idGuiche)) {
    echo json_encode(['success' => false, 'message' => 'Guichê não informado']);
    exit;
}

$senha = $filaSenha->buscarProximaSenhaPendente();
if (!$senha) {
    echo json_encode(['success' => false, 'message' => 'Nenhuma senha pendente']);
    exit;
}

$filaSenha->atualizarSenhaParaAtendimento($senha['id_fila_senha'], $idGuiche, $idUsuario);

$dadosModal = $filaSenha->buscarDadosSenhaModal($senha['id_fila_senha']);

echo json_encode([
    'success' => true,
    'id_senha' => $senha['id_fila_senha'],
    'nome' => $dadosModal['nome'],
    'senha' => $dadosModal['senha'],
    'servico' => $dadosModal['servico'],
    'guiche' => $dadosModal['guiche']
]);
