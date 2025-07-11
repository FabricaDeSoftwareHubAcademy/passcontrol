<?php
// Ativa exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define o tipo de resposta como JSON
header('Content-Type: application/json');

// Inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    // Inclui classe de banco (ajuste o caminho se necessário)
    require_once '../database/Database.php';

    $filaDB = new Database('fila_senha');
    $servicoDB = new Database('servico');

    // Busca a senha mais antiga com status 'pendente'
    $senha = $filaDB->select("status_fila_senha = 'pendente'", 'id_fila_senha ASC', '1')->fetch(PDO::FETCH_ASSOC);

    if (!$senha) {
        echo json_encode(['success' => false, 'message' => 'Nenhuma senha pendente']);
        exit;
    }

    // Atualiza status para 'em atendimento'
    $filaDB->update('id_fila_senha = ' . $senha['id_fila_senha'], [
        'status_fila_senha' => 'em atendimento'
    ]);
    
    

    // Busca nome do serviço
    $servico = $servicoDB->select('id_servico = ' . $senha['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);

    // Monta a resposta
    $prioridade = $senha['prioridade_fila_senha'] ? 'PR' : 'CM';
    $numero = str_pad($senha['id_fila_senha'], 3, '0', STR_PAD_LEFT);

    echo json_encode([
        'success' => true,
        'nome' => $senha['nome_fila_senha'],
        'senha' => "$prioridade $numero",
        'servico' => $servico['nome_servico'] ?? '---'
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro no servidor: ' . $e->getMessage()
    ]);
}
