<?php
require_once "../classes/Perfil.php";

if (isset($_GET['id'])) {
    $id_perfil = $_GET['id'];

    $perfilObj = new Perfil();

    $perfil_busca = $perfilObj->buscar("id_perfil_usuario = " . $id_perfil);

    if ($perfil_busca && isset($perfil_busca[0])) {
        $statusAtual = $perfil_busca[0]["status_perfil_usuario"];
        $novoStatus = $statusAtual == 1 ? 0 : 1;

        $res = $perfilObj->alterarStatus($id_perfil, $novoStatus);

        if ($res) {
            $resposta = array("msg" => "Status alterado com sucesso", "status" => "OK");
        } else {
            $resposta = array("msg" => "Erro ao alterar o status", "status" => "ERRO");
        }
    } else {
        $resposta = array("msg" => "Perfil não encontrado", "status" => "ERRO");
    }

    echo json_encode($resposta);
    exit;
}
?>
