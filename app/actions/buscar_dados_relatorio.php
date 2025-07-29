<?php
require_once '../database/Database.php';

header('Content-Type: application/json');

$dataInicio = $_GET['inicio'] ?? '';
$dataFim = $_GET['fim'] ?? '';
$local = $_GET['local'] ?? '';
$atendente = $_GET['atendente'] ?? '';
$guiche = $_GET['guiche'] ?? '';

// Instanciar a classe Database (sem passar tabela pois faremos query customizada)
$db = new Database();
// Obter a conexão PDO
$pdo = $db->getConnection();

// Monta a query com os filtros e status = 'atendido'
$sql = "SELECT fs.*, s.nome_servico, p.nome_ponto_atendimento
        FROM fila_senha fs
        LEFT JOIN servico s ON fs.id_servico_fk = s.id_servico
        LEFT JOIN ponto_atendimento p ON fs.id_ponto_atendimento_fk = p.id_ponto_atendimento
        WHERE DATE(fs.fila_senha_created_in) BETWEEN ? AND ? 
        AND fs.status_fila_senha = 'atendido'";

$params = [$dataInicio, $dataFim];

if (!empty($local)) {
    $sql .= " AND s.nome_servico = ?";
    $params[] = $local;
}
if (!empty($atendente)) {
    $sql .= " AND fs.fila_senha_updated_by_id = ?";
    $params[] = $atendente;
}
if (!empty($guiche)) {
    $sql .= " AND p.nome_ponto_atendimento = ?";
    $params[] = $guiche;
}

// var_dump($sql);
// var_dump($params);

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}