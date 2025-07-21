<?php
header('Content-Type: application/json');
include 'conexao.php'; // seu arquivo de conexão com o banco

// Recebe os parâmetros via GET (pode usar POST também)
$inicio = $_GET['inicio'] ?? null;
$fim = $_GET['fim'] ?? null;
$local = $_GET['local'] ?? null;
$atendente = $_GET['atendente'] ?? null;
$guiche = $_GET['guiche'] ?? null;

// Validação básica das datas
if (!$inicio || !$fim) {
    echo json_encode([]);
    exit;
}

// Monta a query base (ajuste nomes de tabela/campos conforme seu banco)
$sql = "SELECT 
            f.id_fila_senha,
            f.nome_fila_senha,
            f.prioridade_fila_senha,
            f.fila_senha_created_in,
            s.nome_servico,
            p.nome_ponto_atendimento,
            u.nome_usuario
        FROM fila_senha f
        LEFT JOIN servico s ON f.id_servico_fk = s.id_servico
        LEFT JOIN ponto_atendimento p ON f.id_ponto_atendimento_fk = p.id_ponto_atendimento
        LEFT JOIN usuario u ON f.id_usuario_fk = u.id_usuario
        WHERE DATE(f.fila_senha_created_in) BETWEEN ? AND ?";

// Array para parametros do prepared statement
$params = [$inicio, $fim];

// Filtros adicionais
if ($local) {
    $sql .= " AND s.id_servico = ?";
    $params[] = $local;
}
if ($atendente) {
    $sql .= " AND u.id_usuario = ?";
    $params[] = $atendente;
}
if ($guiche) {
    $sql .= " AND p.id_ponto_atendimento = ?";
    $params[] = $guiche;
}