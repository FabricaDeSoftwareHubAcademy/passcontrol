<?php
require_once '../database/Database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $prioridade = $_POST['prioridade'] ?? null;
    $id_servico = $_POST['id_servico'] ?? null;

    if (!empty($nome) && !empty($sobrenome) && $prioridade !== null && $id_servico !== null) {
        $nomeCompleto = $nome . ' ' . $sobrenome;

        $dadosInsert = [
            'nome_fila_senha' => $nomeCompleto,
            'prioridade_fila_senha' => $prioridade,
            'id_servico_fk' => $id_servico,
        ];

        // Só adiciona o telefone se informado
        if (!empty($telefone)) {
            $dadosInsert['telefone_fila_senha'] = $telefone;
        }

        $db = new Database('fila_senha');
        $resultado = $db->insert($dadosInsert);

        if ($resultado) {
            $_SESSION['senha_info'] = [
                'nome' => $nomeCompleto,
                'prioridade' => $prioridade,
                'id_servico' => $id_servico,
                'telefone' => $telefone
            ];

            header("Location: tela_autoatendimento_page4.php");
            exit;
        } else {
            
        }
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page3.css">

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
    <header class="head-tela-autoatendimento-pag3">
        <nav class="nav-head-tela-autoatendimento-pag3">
            <div class="logo-control-tela-autoatendimento-pag3">
                <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL" id="img-logo">
            </div>
            <H3>PassControl</H3>
        </nav>
    </header>

    <div class="border-line-tela-autoatendimento-pag3"></div>

    <main class="workspace-tela-autoatendimento-pag3">
        <div class="area-cinza-tela-autoatendimento-pag3">
            <h4 class="page-title-tela-autoatendimento-pag3">Informe seus dados para atendimento:</h4>

            <form method="POST" id="form-dados">
                <div class="box-inputs-tela-autoatendimento-pag3">
                    <div class="input-group-tela-autoatendimento-pag3">
                        <h3 for="nome">Nome*</h3><br>
                        <input type="text" class="input-infos" id="nome" name="nome" required>
                    </div>
                    <div class="input-group-tela-autoatendimento-pag3">
                        <h3 for="sobrenome">Sobrenome*</h3><br>
                        <input type="text" class="input-infos" id="sobrenome" name="sobrenome" required>
                    </div>
                    <div class="input-group-tela-autoatendimento-pag3">
                        <h3 for="telefone">Telefone</h3><br>
                        <input type="tel" class="input-infos" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    </div>
                    <div class="input-group-tela-autoatendimento-pag3">
                        <div class="information">
                            * A SENHA NÃO SERÁ IMPRESSA <br><br>
                            * INSIRA SEU NÚMERO DE TELEFONE PARA RECEBER AS INFORMAÇÕES DO SEU ATENDIMENTO VIA SMS
                        </div>
                    </div>
                </div>

                <input type="hidden" id="prioridade" name="prioridade">
                <input type="hidden" id="id_servico" name="id_servico">
                <input type="hidden" id="telefone_hidden" name="telefone">

            </form>
        </div>
        <div class="footer-tela-autoatendimento-pag3">
            <button type="button" class="button-tela-autoatendimento-pag3 btn-voltar" onclick="location.href = document.referrer">VOLTAR</button>
            <button type="button" class="button-tela-autoatendimento-pag3 btn-confirmar" id="confirmarBtn">CONFIRMAR</button>
        </div>
    </main>

    <script src="../../public/js/tela_autoatendimento_page3.js"></script>
</body>
</html>