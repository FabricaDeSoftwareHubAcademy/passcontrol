<?php

/* require_once '../classes/PontoAtendimento.php';

if(isset($_GET['id_ponto_atendimento'])){

    

    $id_ponto_atendimento = $_GET['id_ponto_atendimento'];

    //echo '<script> alert(" '.$id_ponto_atendimento.' ")';
    //exit;

    $objUser = new Ponto_Atendimento();

    $user_alternar = $objUser->buscar_por_id($id_ponto_atendimento);

    $user_alternar->alternar_ativo($user_alternar->id_ponto_atendimento, $user_alternar->ativo);
    if($user_alternar){
         
        $resposta = array("status" => "OK");
        echo json_encode($resposta);
    }
} */

require_once '../classes/PontoAtendimento.php';

if (isset($_GET['id_ponto_atendimento'])) {
    $id = $_GET['id_ponto_atendimento'];

    if ($id !== null && $id !== '') {
        $objPonto = new Ponto_Atendimento();

        $ponto = $objPonto->buscar_por_id($id);

        if ($ponto) {
            $resultado = $ponto->alternar_ativo($ponto->id_ponto_atendimento, $ponto->ativo);

            if ($resultado) {
                $resposta = array("msg" => "Status alterado com sucesso", "status" => "OK");
                echo json_encode($resposta);
            } else {
                $resposta = array("msg" => "Erro ao alterar o status", "status" => "ERRO");
                echo json_encode($resposta);
            }
        } else {
            $resposta = array("msg" => "Ponto de atendimento não encontrado", "status" => "ERRO");
            echo json_encode($resposta);
        }
    } else {
        $resposta = array("msg" => "ID inválido", "status" => "ERRO");
        echo json_encode($resposta);
    }
} else {
    $resposta = array("msg" => "ID não informado", "status" => "ERRO");
    echo json_encode($resposta);
}
 
?>