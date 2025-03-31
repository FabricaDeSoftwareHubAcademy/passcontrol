<?php

require "/config/Database.php";

if (isset($_GET['id_imagem'])) {
    $id = intval($_GET['id_imagem']);
    $sql = "SELECT imagem FROM servico WHERE id_servico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagem);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    if ($imagem) { // <-- Aqui estava errado!
        header("Content-Type: image/png");
        echo $imagem;
    } else {
        header("HTTP/1.1 404 Not Found");
        echo "Imagem não encontrada.";
    }
    exit;
}

// Se não for uma solicitação de imagem, retorna o JSON dos serviços
header("Content-Type: application/json");

$sql = "SELECT id_servico, nome_servico FROM servico";
$result = $conn->query($sql);

$servicos = [];
while ($row = $result->fetch_assoc()) {
    $servicos[] = [
        "id_servico" => $row["id_servico"],
        "nome_servico" => $row["nome_servico"],
        "imagem" => "servicos.php?id_imagem=" . $row["id_servico"]
    ];
}

$conn->close();
echo json_encode($servicos);

?>