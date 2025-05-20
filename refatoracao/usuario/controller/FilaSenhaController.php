<?php
    require_once "../../../config/Database.php";
    require_once "../model/FilaSenhaModel.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dados = json_decode(file_get_contents("php://input"), true);

        if (isset($dados["nome"]) && isset($dados["servico"]) && isset($dados["categoria"])) {
            $database = new Database();
            $db = $database->getConnection();

            $filaSenhaModel = new FilaSenhaModel($db);
            
            $resultado = $filaSenhaModel->inserirFilaSenha(
                $dados["nome"],
                $dados["servico"],
                $dados["categoria"]
            );

            if ($resultado) {
                echo json_encode(["status" => "success", "message" => "Registro inserido com sucesso!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Erro ao inserir o registro."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Dados incompletos."]);
        }
    }
?>