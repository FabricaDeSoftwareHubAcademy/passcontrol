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
        $dataHora = date('Y-m-d H:i:s');

        $db = new Database('fila_senha');
        $resultado = $db->insert([
            'nome_fila_senha' => $nomeCompleto,
            'prioridade_fila_senha' => $prioridade,
            'id_servico_fk' => $id_servico,
            'fila_senha_created_in' => $dataHora,
            'fila_senha_updated_in' => $dataHora
        ]);

        if ($resultado) {
            $_SESSION['senha_info'] = [
                'nome' => $nomeCompleto,
                'prioridade' => $prioridade,
                'id_servico' => $id_servico,
                'criado_em' => $dataHora
            ];

            // Teste do Zenvia para mandar sms
            if (!empty($telefone)) {
                $telefoneLimpo = preg_replace('/\D/', '', $telefone);
                if (strlen($telefoneLimpo) === 11) {
                    $telefoneLimpo = '+55' . $telefoneLimpo;
                    $smsData = [
                        'from' => 'Zenvia', // Use exatamente o identificador da sua conta Zenvia aqui
                        'to' => $telefoneLimpo,
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => "Olá $nomeCompleto! Sua senha foi gerada com sucesso. Aguarde ser chamado."
                            ]
                        ]
                    ];
                    $ch = curl_init('https://api.zenvia.com/v2/channels/sms/messages');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        // token zenvia 1: Q-E3GbFCQoCy4LY9DODinGi4C0TI25u9-qBG
                        // token zenvia 2: Gxc8y6AKed3wbFe6SlSEgZKbwKAhLHY8dib2,"wA6kEyWvmPlXO8mX2N8JDGq9f-SXKex-RWCxdmmxokDvuPclHK2DqJIapJOq8K2x"
                        // 'X-API-TOKEN: Gxc8y6AKed3wbFe6SlSEgZKbwKAhLHY8dib2,"wA6kEyWvmPlXO8mX2N8JDGq9f-SXKex-RWCxdmmxokDvuPclHK2DqJIapJOq8K2x"' // Coloque aqui seu token real da Zenvia
                        // 'Authorization: Bearer Gxc8y6AKed3wbFe6SlSEgZKbwKAhLHY8dib2wA6kEyWvmPlXO8mX2N8JDGq9fSXKexRWCxdmmxokDvuPclHK2DqJIapJOq8K2x'
                        'X-API-TOKEN: z1TCrlshp4MJdUrokoR7WWaPQ_byCWuhl6bM'
                    ]);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($smsData));
                    curl_exec($ch);
                    curl_close($ch);
                }
            }

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

                <div class="footer-tela-autoatendimento-pag3">
                    <button type="button" class="button-tela-autoatendimento-pag3">
                        <a href="./tela_autoatendimento_page2.php" class="btn-voltar">VOLTAR</a>
                    </button>
                    <button type="button" class="button-tela-autoatendimento-pag3 btn-confirmar" id="confirmarBtn">CONFIRMAR</button>
                </div>
            </form>
        </div>
    </main>

    <script src="../../public/js/tela_autoatendimento_page3.js"></script>
</body>
</html>