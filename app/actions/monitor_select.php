<?php
require_once '../classes/FilaSenha.php';


$fila_senha_obj = new FilaSenha();

try{
    $em_atendimento = $fila_senha_obj->buscar_em_atendimento();
    if (!$em_atendimento){
        $em_atendimento = [];
    }

    echo json_encode([
        'senhas' => $em_atendimento
    ]);
}catch(Exception $erro){
    echo json_encode("Erro na requisição: $erro");
    return;
}