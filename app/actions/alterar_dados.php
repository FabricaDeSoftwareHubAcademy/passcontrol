<?php
session_start();
require_once '../classes/Usuario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario_login'] ?? null;
    $nome = trim($_POST['nome-login'] ?? '');
    $email = trim($_POST['email-login'] ?? '');

    if (!$id_usuario || !$nome || !$email) {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos.']);
        exit;
    }

    $foto_url = null;

    // upload da imagem caso ela seja enviada
    if (isset($_FILES['foto-login']) && $_FILES['foto-login']['error'] === UPLOAD_ERR_OK) {
        $tmpFile = $_FILES['foto-login']['tmp_name'];
        $originalName = basename($_FILES['foto-login']['name']);
        $uploadFolder = 'public/img/uploads/';
        $uniqueName = uniqid('perfil_', true) . '_' . $originalName;
        $pathToSave = __DIR__ . '/../../' . $uploadFolder . $uniqueName;

        if (move_uploaded_file($tmpFile, $pathToSave)) {
            $foto_url = $uploadFolder . $uniqueName;
        }
    }

    $usuario = new Usuario();

    $result = $usuario->atualizarDadosLogin($id_usuario, $nome, $email, $foto_url);

    if ($result !== false) {
        // atualiza para os dados da sessão
        $_SESSION['nome_usuario'] = $nome;
        $_SESSION['email_usuario'] = $email;
        if ($foto_url !== null) {
            $_SESSION['url_foto_usuario'] = $foto_url;
        }

        echo json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Falha ao atualizar dados.']);
    }
    exit;
}

