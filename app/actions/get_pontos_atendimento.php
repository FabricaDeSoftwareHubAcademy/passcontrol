<?php
require_once '../database/Database.php';

header('Content-Type: application/json');

try {
    // Cria conexão PDO direto
    $pdo = (new Database('ponto_atendimento'))->getConnection(); 
    
    $sql = "SELECT id_ponto_atendimento, nome_ponto_atendimento, identificador_ponto_atendimento 
            FROM ponto_atendimento 
            WHERE status_ponto_atendimento = 1 
            ORDER BY identificador_ponto_atendimento";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $pontos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($pontos);

} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro na consulta: '.$e->getMessage()]);
}