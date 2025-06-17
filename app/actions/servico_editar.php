<?php
require_once '../classes/Servico.php';

if (isset($_GET['id_servico'])) {
    $id_servico = $_GET['id_servico'];
    $servico = new Servico();
    $dadosServico = $servico->buscar_por_id($id_servico);
    echo json_encode($dadosServico);
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $edicao_servico = new Servico();
    $edicao_servico->id_servico = $_POST['id_servico'];
    $edicao_servico->nome_servico = $_POST['nome_servico'];
    $edicao_servico->codigo_servico = $_POST['codigo_servico'];
    $edicao_servico->url_imagem_servico = $_POST['url_imagem_servico'];
    
    if($edicao_servico->nome_servico != null || $edicao_servico->codigo_servico != null || $edicao_servico->url_imagem_servico != null){ 
        $resultado = $edicao_servico->atualizar();
        
        if ($resultado) {
            $resposta = array("status"=>"OK", "msg"=> "editado action");
    
            echo json_encode($resposta);
    
        } else {
            $resposta = array("status"=>"ERRO");
            echo json_encode($resposta);
            // echo '<div class="alert alert-danger">Erro ao atualizar guichê. Tente novamente.</div>';
        }
    }
    else{
        $resposta = array( "msg" => "Preencha todos os campos", "status" => "ERRO");
        echo json_encode($resposta);
        exit;
    }
}
?>