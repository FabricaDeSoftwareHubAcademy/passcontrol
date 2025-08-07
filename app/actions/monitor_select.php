<?php
require_once '../classes/FilaSenha.php';
require_once '../classes/Servico.php';
require_once '../classes/PontoAtendimento.php';


$fila_senha_obj = new FilaSenha();
$servico_obj = new Servico();
$ponto_atendimento_obj = new Ponto_Atendimento();

try{
    $em_atendimento = $fila_senha_obj->buscar_em_atendimento();
    if (!$em_atendimento){
        $em_atendimento = [];
    }
    
    // Pega a senha mais recente como principal
    $senhaPrincipal = $em_atendimento[0] ?? null;
    
    // Pega até 4 senhas seguintes (últimas chamadas), excluindo a principal
    $ultimasChamadas = array_slice($em_atendimento, 1, 4);

    foreach($ultimasChamadas as $senha){
        $ponto_atendimento = $ponto_atendimento_obj->buscar('id_ponto_atendimento = ' . (int)$senha['id_ponto_atendimento']);
        $servico = $servico_obj->buscar('id_servico = ' . $senha['id_servico_fk']);
    }


    // echo json_encode($em_atendimento);
    echo json_encode([
        'senhas' => $ultimasChamadas,
        'servico' => $servico,
        'guiche' => $ponto_atendimento,
        'senha_principal' => $senhaPrincipal
    ]);
}catch(Exception $erro){
    echo json_encode("Erro na requisição: $erro");
    return;
}

