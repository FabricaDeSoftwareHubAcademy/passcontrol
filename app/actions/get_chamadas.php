<?php
require_once '../database/Database.php';

header('Content-Type: application/json');

$db = new Database('fila_senha');
$servicoDB = new Database('servico');
$guicheDB = new Database('ponto_atendimento');

$senhasEmAtendimento = $db->select("status_fila_senha IN ('em atendimento','atendido')", 'fila_senha_chamada_in DESC')->fetchAll(PDO::FETCH_ASSOC);

$dados = ['principal' => null, 'ultimas' => []];

if (!empty($senhasEmAtendimento)) {
    $senhaPrincipal = $senhasEmAtendimento[0];
    $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
    $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senhaPrincipal['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
    $dados['principal'] = [
        'nome' => $senhaPrincipal['nome_fila_senha'],
        'servico' => $servico['nome_servico'] ?? '',
        'senha' => ($senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM') . ' ' . str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT),
        'guiche' => ($guiche['nome_ponto_atendimento'] ?? '') . ' - ' . ($guiche['identificador_ponto_atendimento'] ?? '')
    ];

    $ultimasChamadas = array_slice($senhasEmAtendimento, 1, 4);
    foreach ($ultimasChamadas as $senha) {
        $servico = $servicoDB->select('id_servico = ' . $senha['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
        $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senha['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
        $dados['ultimas'][] = [
            'nome' => $senha['nome_fila_senha'],
            'senha' => ($senha['prioridade_fila_senha'] ? 'PR' : 'CM') . ' ' . str_pad($senha['id_fila_senha'], 3, '0', STR_PAD_LEFT),
            'guiche' => ($guiche['nome_ponto_atendimento'] ?? '') . ' - ' . ($guiche['identificador_ponto_atendimento'] ?? '')
        ];
    }
}

echo json_encode($dados);
