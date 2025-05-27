<?php
require '../classes/Servico.php';

$servico = new Servico();

// ATIVAR/INATIVAR (recarregando)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_servico']) && !isset($_GET['acao'])) {
    $id_servico = intval($_GET['id_servico']);
    $servicoEncontrado = $servico->buscar_por_id($id_servico);

    if ($servicoEncontrado) {
        $servico->alternar_ativo($id_servico, $servicoEncontrado->ativo);
        header('Location: ../../../app/view/servicos.php');
        exit;
    } else {
        echo "Erro: Serviço não encontrado.";
        exit;
    }
}

// ATIVAR/INATIVAR via AJAX
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_servico'], $_GET['acao'])) {
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
    exit;
}

// CADASTRAR / EDITAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $id = $_POST['id'] ?? null;

    $icone = null;
    $pasta = '../../public/img/icone-servicos/';
    $resultado = false;

    if ($acao === 'editar' && $id) {
        $servico_atual = $servico->buscar_por_id($id);
    }

    if (!empty($_FILES['icone']['name'])) {
        $extensao = pathinfo($_FILES['icone']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminho = $pasta . $nomeArquivo;

        if (move_uploaded_file($_FILES['icone']['tmp_name'], $caminho)) {
            $icone = $nomeArquivo;

            // Exclui imagem antiga no modo edição
            if (isset($servico_atual->imagem) && file_exists($pasta . $servico_atual->imagem)) {
                unlink($pasta . $servico_atual->imagem);
            }
        }
    }

    if ($acao === 'cadastrar') {
        $resultado = $servico->cadastrar($codigo, $nome, $icone);
    } elseif ($acao === 'editar' && $id) {
        $servico->id_servico = $id;
        $servico->codigo_servico = $codigo;
        $servico->nome_servico = $nome;
        $resultado = $icone ? $servico->editar_com_icone($icone) : $servico->editar();
    }

    echo json_encode([
        'status' => $resultado ? 'success' : 'error',
        'message' => $resultado ? 'Serviço salvo com sucesso!' : 'Erro ao salvar o serviço.'
    ]);
    exit;
}
?>