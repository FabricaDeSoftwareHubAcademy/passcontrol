<?php

require_once './guiche.php';

if(isset($_GET['id_guiche'])){

    

    $id_guiche = $_GET['id_guiche'];

    //echo '<script> alert(" '.$id_guiche.' ")';
    //exit;

    $objUser = new Guiche();

    $user_alternar = $objUser->buscar_por_id($id_guiche);

    $user_alternar->alternar_ativo($user_alternar->id_guiche, $user_alternar->ativo);
    if($user_alternar){
         
        $resposta = array("status" => "OK");
        echo json_encode($resposta);
    }
}
 
?>