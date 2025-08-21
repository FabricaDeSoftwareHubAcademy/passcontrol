<?php
require_once '../classes/Servico.php';

// Validação básica dos campos
$nome = $_POST['nome_servico'] ?? '';
$codigo = $_POST['codigo_servico'] ?? '';

if (empty($nome) || empty($codigo)) {
    echo json_encode(['status' => 'erro', 'message' => 'Preencha todos os campos obrigatórios.']);
    exit;
}

// Processamento da imagem
$nomeImagem = '';

if (isset($_FILES['url_imagem_servico']) && $_FILES['url_imagem_servico']['error'] === UPLOAD_ERR_OK) {
    $arquivoTmp = $_FILES['url_imagem_servico']['tmp_name'];
    $nomeArquivo = basename($_FILES['url_imagem_servico']['name']);
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    $permitidos = ['jpg', 'jpeg', 'png','jfif'];

    if (in_array($extensao, $permitidos)) {
        $nomeImagem = uniqid('img_') . "." . $extensao;
        $pastaDestino = '../../public/img/uploads/';

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }

        move_uploaded_file($arquivoTmp, $pastaDestino . $nomeImagem);
    } 
    else {
        echo json_encode(['status' => 'erro', 'message' => 'Formato de imagem inválido']);
        exit;
    }
} else {
    echo json_encode(['status' => 'erro', 'message' => 'Erro no upload da imagem']);
    exit;
}

// Instanciar a classe e atribuir os valores
$servico = new Servico();
$servico->nome_servico = $nome;
$servico->codigo_servico = $codigo;
$servico->url_imagem_servico = $nomeImagem;

// Cadastrar no banco
$resultado = $servico->cadastrar();

if ($resultado) {
    echo json_encode(['status' => 'ok']);
} else {
    echo json_encode(['status' => 'erro', 'message' => 'Erro ao salvar no banco']);
}
?>
