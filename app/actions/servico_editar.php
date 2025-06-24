<?php
require_once '../classes/Servico.php';

header('Content-Type: application/json');

if (isset($_GET['id_servico'])) {
    $id_servico = $_GET['id_servico'];
    $servico = new Servico();
    $dadosServico = $servico->buscar_por_id($id_servico);
    echo json_encode($dadosServico);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Dados obrigatórios
    $id_servico = $_POST['id_servico'] ?? null;
    $nome_servico = trim($_POST['nome_servico'] ?? '');
    $codigo_servico = trim($_POST['codigo_servico'] ?? '');

    // Buscar dados atuais
    $servico = new Servico();
    $dadosAtuais = $servico->buscar_por_id($id_servico);

    if (!$dadosAtuais) {
        echo json_encode(['status' => 'ERRO', 'msg' => 'Serviço não encontrado.']);
        exit;
    }

    // Validação dos campos obrigatórios
    if (empty($nome_servico) || empty($codigo_servico)) {
        echo json_encode(['status' => 'ERRO', 'msg' => 'Preencha todos os campos obrigatórios.']);
        exit;
    }

    // Verificar imagem
    $nomeImagem = $dadosAtuais['url_imagem_servico']; // Mantém imagem anterior por padrão

    if (isset($_FILES['url_imagem_servico']) && $_FILES['url_imagem_servico']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['url_imagem_servico']['tmp_name'];
        $nomeOriginal = $_FILES['url_imagem_servico']['name'];

        $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png'];

        if (!in_array($extensao, $permitidos)) {
            echo json_encode(['status' => 'ERRO', 'msg' => 'Extensão de imagem inválida.']);
            exit;
        }

        $novoNomeImagem = uniqid('servico_') . '.' . $extensao;
        $pastaDestino = '../../public/img/img-servicos/';

        if (move_uploaded_file($arquivoTmp, $pastaDestino . $novoNomeImagem)) {
            // Remove a imagem antiga se existir
            if (!empty($nomeImagem) && file_exists($pastaDestino . $nomeImagem)) {
                unlink($pastaDestino . $nomeImagem);
            }

            $nomeImagem = $novoNomeImagem;
        } else {
            echo json_encode(['status' => 'ERRO', 'msg' => 'Erro ao fazer upload da imagem.']);
            exit;
        }
    }

    //  Preparar objeto para atualização
    $edicao_servico = new Servico();
    $edicao_servico->id_servico = $id_servico;
    $edicao_servico->nome_servico = $nome_servico;
    $edicao_servico->codigo_servico = $codigo_servico;
    $edicao_servico->url_imagem_servico = $nomeImagem;

    $resultado = $edicao_servico->atualizar();

    if ($resultado) {
        echo json_encode(["status" => "OK", "msg" => "Serviço atualizado com sucesso."]);
    } else {
        echo json_encode(["status" => "ERRO", "msg" => "Erro ao atualizar serviço."]);
    }

    exit;
}
?>
