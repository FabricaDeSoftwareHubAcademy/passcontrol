<?php 
require_once '../classes/Servico.php';

if(isset($_GET['id_servico'])) {
    if ($_GET['id_servico'] != null || $_GET['id_servico'] != ''){

        $id = $_GET['id_servico'];
        
        $objServico = new Servico();
        $resultado = $objServico->atualizar_status($id);
        
        if($resultado){
            $resposta = array("msg" => "Status alterado com sucesso", "status" => "OK");
            echo json_encode($resposta);
        }
        else{
            $resposta = array("msg" => "Erro ao alterar o status", "status" => "ERRO");
            echo json_encode($resposta);
        }
    } else{
        return;
    }
}else{
    $resposta = array('msg' => "Servico nao encontrado", 'status' => 'ERRO');
    echo json_encode($resposta);
}
?>