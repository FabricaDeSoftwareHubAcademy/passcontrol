<?php
session_start();
require_once '../database/Database.php';

$scriptTransferencia = '';
if (!empty($_SESSION['senha_info'])) {
    $dados = $_SESSION['senha_info'];
    $json = json_encode($dados);
    $scriptTransferencia = "<script>localStorage.setItem('dadosSenha', '$json');</script>";
    unset($_SESSION['senha_info']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    $nome = $_POST['nome'] ?? '';
    $prioridade = $_POST['prioridade'] ?? null;
    $id_servico = $_POST['id_servico'] ?? null;
    $criado_em = $_POST['criado_em'] ?? null;

    if (!empty($nome) && $prioridade !== null && $id_servico !== null && !empty($criado_em)) {
        $db = new Database('fila_senha');

        $sql = "SELECT fs.*, s.nome_servico FROM fila_senha fs 
                JOIN servico s ON fs.id_servico_fk = s.id_servico 
                WHERE fs.nome_fila_senha = :nome 
                AND fs.prioridade_fila_senha = :prioridade 
                AND fs.id_servico_fk = :id_servico 
                AND fs.fila_senha_created_in = :criado_em 
                ORDER BY fs.id_fila_senha DESC 
                LIMIT 1";

        $stmt = $db->execute($sql, [
            'nome' => $nome,
            'prioridade' => $prioridade,
            'id_servico' => $id_servico,
            'criado_em' => $criado_em
        ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $prefixo = $resultado['prioridade_fila_senha'] == 1 ? ' PR ' : ' CM ';
            $senha = $prefixo . str_pad($resultado['id_fila_senha'], 3, '0', STR_PAD_LEFT);

            echo json_encode([
                'sucesso' => true,
                'senha' => $senha,
                'nome' => $resultado['nome_fila_senha'],
                'servico' => $resultado['nome_servico']
            ]);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Não encontrado.']);
        }
        exit;
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Parâmetros ausentes.']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page4.css"> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico"> <!-- ( Atualização de caminho ) -->
</head>

<body>
    <header class="head">
        <nav class="nav-head">
            <div class="logo-control">
                <img src="../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo"> <!-- ( Atualização de caminho ) -->
            </div>
            <H3>PassControl</H3>
    </header>

    <div class="border-line"></div>

    <main class="workspace">

        <div class="area-cinza">

            <div class="container">

                <section class="info-area">
                    <div class="fixed-text">VERIFIQUE SEU NOME E SENHA<br>AGUARDE SER CHAMADO NO PAINEL!</div>
                    <div class="variable-text">
                        <div><strong>SENHA:</strong></div>
                        <div><strong>NOME:</strong></div>
                        <div><strong>SERVIÇO:</strong></div>
                    </div>
                </section>

            </div>

            <div class="footer">
                <button class="button">
                    <a href="../../app/view/tela_autoatendimento_page1.php" class="btn-finalizar">FINALIZAR</a> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->
                </button>
            </div>

        </div>

    </main>

    <?= $scriptTransferencia ?>

    <script src="../../public/js/tela_autoatendimento_page4.js"></script>
    <script src="../../public/js/enviarDadosFilaSenha.js"></script>
</body>
</html>