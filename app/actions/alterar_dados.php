<?php
session_start();
require_once '../database/Database.php';

header('Content-Type: application/json'); // Para retorno em JSON ao JS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario_login'] ?? null;
    $nome = trim($_POST['nome-login'] ?? '');
    $email = trim($_POST['email-login'] ?? '');

    if (!$id_usuario || !$nome || !$email) {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
        exit;
    }

    $db = new Database();

    $foto_url = null;
    if (isset($_FILES['foto-login']) && $_FILES['foto-login']['error'] === UPLOAD_ERR_OK) {
        $tmpFile = $_FILES['foto-login']['tmp_name'];
        $originalName = basename($_FILES['foto-login']['name']);
        $destDir = '../../public/img/uploads/';
        $uniqueName = uniqid('perfil_', true) . '_' . $originalName;
        $pathToSave = $destDir . $uniqueName;

        if (move_uploaded_file($tmpFile, $pathToSave)) {
            // Caminho que será salvo no banco e carregado na <img>
            $foto_url = 'public/img/uploads/' . $uniqueName;
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar a imagem.']);
            exit;
        }
    }

    // Prepara SQL
    $params = [
        ':nome' => $nome,
        ':email' => $email,
        ':id' => $id_usuario,
    ];

    if ($foto_url) {
        $sql = "UPDATE usuario SET nome_usuario = :nome, email_usuario = :email, url_foto_usuario = :foto WHERE id_usuario = :id";
        $params[':foto'] = $foto_url;
    } else {
        $sql = "UPDATE usuario SET nome_usuario = :nome, email_usuario = :email WHERE id_usuario = :id";
    }

    $conn = $db->getConnection();
    $stmt = $conn->prepare($sql);

    if ($stmt->execute($params)) {
        // Atualiza dados da sessão
        $_SESSION['nome_usuario'] = $nome;
        $_SESSION['email_usuario'] = $email;
        if ($foto_url) {
            $_SESSION['url_foto_usuario'] = $foto_url;
        }

        echo json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar dados no banco.']);
    }

    exit;
}
