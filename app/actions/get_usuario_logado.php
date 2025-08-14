<?php
session_start();
require_once '../classes/Usuario.php';

$id_usuario_logado = $_SESSION['id_usuario'] ?? null;

echo json_encode(['id_usuario' => $id_usuario_logado]);
