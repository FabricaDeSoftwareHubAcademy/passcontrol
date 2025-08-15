<?php
// Conexão com o banco de dados
require_once '../database/Database.php';

// Inicializa a conexão
$db = new Database();
$conn = $db->getConnection();

// Verifica se a conexão foi estabelecida
if (!$conn) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro na conexão com o banco de dados']);
    exit;
}

// Filtros da requisição GET com validação básica
$data_inicio = $_GET['data_inicio'] ?? null;
$data_fim = $_GET['data_fim'] ?? null;
$id_servico = $_GET['servico'] ?? null;
$id_usuario = $_GET['atendente'] ?? null;
$id_ponto = $_GET['guiche'] ?? null;

// Monta a consulta SQL com prepared statements
$sql = "SELECT 
            ra.nome_atendentente AS atendente,
            s.nome_servico AS servico,
            ra.nome_pessoa_atendida AS atendido,
            CASE 
                WHEN fs.prioridade_fila_senha = 1 THEN 'Prioridade'
                ELSE 'Normal'
            END AS prioridade,
            DATE(ra.fila_senha_iniciada_in) AS data_atendimento,
            TIME(ra.fila_senha_iniciada_in) AS hora_atendimento,
            pa.nome_ponto_atendimento AS local,
            ra.fila_senha_iniciada_in,
            ra.fila_senha_encerrada_in,
            TIMESTAMPDIFF(MINUTE, ra.fila_senha_iniciada_in, ra.fila_senha_encerrada_in) AS duracao_atendimento_minutos
        FROM relatorio_atendimento ra
        LEFT JOIN fila_senha fs ON 
            ra.nome_pessoa_atendida = fs.nome_fila_senha AND 
            ra.id_servico_fk = fs.id_servico_fk
        LEFT JOIN servico s ON ra.id_servico_fk = s.id_servico
        LEFT JOIN ponto_atendimento pa ON ra.id_ponto_atendimento_fk = pa.id_ponto_atendimento
        WHERE 1=1";

// Array para armazenar os parâmetros da consulta
$params = [];
$types = '';

// Adiciona filtros de forma segura
if (!empty($data_inicio)) {
    $sql .= " AND ra.fila_senha_iniciada_in >= ?";
    $params[] = $data_inicio . ' 00:00:00';
    $types .= 's';
}

if (!empty($data_fim)) {
    $sql .= " AND ra.fila_senha_iniciada_in <= ?";
    $params[] = $data_fim . ' 23:59:59';
    $types .= 's';
}

if (!empty($id_servico) && is_numeric($id_servico)) {
    $sql .= " AND ra.id_servico_fk = ?";
    $params[] = $id_servico;
    $types .= 'i';
}

if (!empty($id_usuario) && is_numeric($id_usuario)) {
    $sql .= " AND ra.id_usuario_fk = ?";
    $params[] = $id_usuario;
    $types .= 'i';
}

if (!empty($id_ponto) && is_numeric($id_ponto)) {
    $sql .= " AND ra.id_ponto_atendimento_fk = ?";
    $params[] = $id_ponto;
    $types .= 'i';
}

// Ordena os resultados
$sql .= " ORDER BY ra.fila_senha_iniciada_in DESC";

// Prepara a consulta
$stmt = $conn->prepare($sql);

// Verifica se a preparação foi bem-sucedida
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro na preparação da consulta: ' . $conn->error]);
    exit;
}

// Associa os parâmetros se existirem
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

// Executa a consulta
if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro na execução da consulta: ' . $stmt->error]);
    exit;
}

// Obtém os resultados
$resultado = $stmt->get_result();
$dados = [];

while ($row = $resultado->fetch_assoc()) {
    // Formata a data para exibição
    if (!empty($row['data_atendimento'])) {
        $data = new DateTime($row['data_atendimento']);
        $row['data_atendimento'] = $data->format('d/m/Y');
    }
    
    // Formata a hora para exibição
    if (!empty($row['hora_atendimento'])) {
        $hora = new DateTime($row['hora_atendimento']);
        $row['hora_atendimento'] = $hora->format('H:i');
    }
    
    $dados[] = $row;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();

// Retorna os dados em formato JSON
header('Content-Type: application/json');
echo json_encode($dados);
?>