<?php
require "../../../config/Database.php"; // Conexão com o banco

// Definir a quantidade de itens por página
$itens_por_pagina = 8;
$pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
$offset = ($pagina - 1) * $itens_por_pagina;

// Buscar os serviços no banco
$sql = "SELECT id_servico, nome_servico, imagem FROM servico LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $itens_por_pagina);
$stmt->execute();
$result = $stmt->get_result();

$servicos = [];
while ($row = $result->fetch_assoc()) {
    $servicos[] = [
        "id_servico" => $row["id_servico"],
        "nome_servico" => $row["nome_servico"],
        "imagem" => "imagem_servico.php?id=" . $row["id_servico"]
    ];
}

// Contar o total de serviços
$total_sql = "SELECT COUNT(*) as total FROM servico";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_paginas = ceil($total_row['total'] / $itens_por_pagina);

$conn->close();

// Retorna os serviços e o total de páginas
echo json_encode(["servicos" => $servicos, "total_paginas" => $total_paginas]);
?>