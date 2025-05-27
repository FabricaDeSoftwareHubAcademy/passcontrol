<?php

require_once '../classes/PontoAtendimento.php';

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
}
 
?>