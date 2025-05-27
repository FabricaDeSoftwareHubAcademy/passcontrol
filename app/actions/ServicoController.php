<?php
require '../model/Servico.php';

$servico = new Servico();

// Para ativar ou inativar serviço (sem AJAX, recarrega a página)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_servico'])) {
    $id_servico = intval($_GET['id_servico']);
    $servicoEncontrado = $servico->buscar_por_id($id_servico);

    if ($servicoEncontrado) {
        $servico->alternar_ativo($servicoEncontrado->id_servico, $servicoEncontrado->ativo);
        header('Location: ../admin/view/servicos.php');
        exit;
    } else {
        echo "Erro: Serviço não encontrado.";
        exit;
    }
}

// Para cadastro e edição de serviço (com AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $id = $_POST['id'] ?? null;

    $icone = null;
    $pasta = '../../public/img/icone-servicos/';

    if ($acao === 'editar' && $id) {
        $servico_atual = $servico->buscar_por_id($id);
    }

    if (!empty($_FILES['icone']['name'])) {
        $nomeArquivo = uniqid() . '_' . $_FILES['icone']['name'];
        $caminho = $pasta . $nomeArquivo;
        move_uploaded_file($_FILES['icone']['tmp_name'], $caminho);
        $icone = $nomeArquivo;

        if (isset($servico_atual->imagem) && !empty($servico_atual->imagem)) {
            $caminhoAntigo = $pasta . $servico_atual->imagem;
            if (file_exists($caminhoAntigo)) {
                unlink($caminhoAntigo);
            }
        }
    }

    if ($acao === 'cadastrar') {
        $resultado = $servico->cadastrar($codigo, $nome, $icone);
    } elseif ($acao === 'editar' && $id) {
        $servico->id_servico = $id;
        $servico->codigo_servico = $codigo;
        $servico->nome_servico = $nome;

        if ($icone) {
            $resultado = $servico->editar_com_icone($icone);
        } else {
            $resultado = $servico->editar();
        }
    }

    if ($resultado) {
        echo json_encode(['status' => 'success', 'message' => 'Serviço salvo com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar o serviço.']);
    }
}

// Para ativar ou inativar serviço com AJAX
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_servico']) && isset($_GET['acao'])) {
    $id_servico = intval($_GET['id_servico']);
    $acao = $_GET['acao'];

    $servicoEncontrado = $servico->buscar_por_id($id_servico);

    if ($servicoEncontrado) {
        if ($acao === 'inativar') {
            $servico->alternar_ativo($id_servico, 'INATIVO'); 
        } elseif ($acao === 'ativar') {
            $servico->alternar_ativo($id_servico, 'ATIVO');
        }
        echo json_encode(['status' => 'success', 'message' => 'Status alterado com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Serviço não encontrado.']);
    }
}
?>
