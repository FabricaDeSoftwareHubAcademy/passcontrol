<?php
require "../../../config/Database.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT imagem FROM servico WHERE id_servico = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagem);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    if ($imagem) {
        header("Content-Type: image/png");
        echo $imagem;
    }
}
?>