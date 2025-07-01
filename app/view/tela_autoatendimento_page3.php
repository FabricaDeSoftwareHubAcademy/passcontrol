<?php
require_once '../database/Database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $prioridade = $_POST['prioridade'] ?? null;
    $id_servico = $_POST['id_servico'] ?? null;
    $telefone = $_POST['telefone'] ?? '';

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
           echo "Telefone informado: $telefone<br>";
            if (!empty($telefone)) {
                
                $telefoneLimpo = preg_replace('/\D/', '', $telefone);
                echo "informações do telefonelimpo sem espaços: $telefoneLimpo<br>";
                if (strlen($telefoneLimpo) === 11) {
                    $telefoneLimpo = '+55' . $telefoneLimpo;
                    echo "informações do telefonelimpo apos o +55: $telefoneLimpo<br>";
                    $smsData = [
                        'from' => 'lavender-porpoise', // Use exatamente o identificador da sua conta Zenvia aqui
                        'to' => $telefoneLimpo,
                        'contents' => [
                            [
                                'type' => 'text',
                                'text' => "Olá $nomeCompleto! Sua senha foi gerada com sucesso. Aguarde ser chamado."
                            ]
                        ]
                    ];
                    echo 'informações do $smsData: <pre>';
                    print_r($smsData);
                    echo '</pre>';
            
                    $ch = curl_init('https://api.zenvia.com/v2/channels/sms/messages');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Content-Type: application/json',
                        // token zenvia 1: Q-E3GbFCQoCy4LY9DODinGi4C0TI25u9-qBG
                        // token zenvia 2: Gxc8y6AKed3wbFe6SlSEgZKbwKAhLHY8dib2,"wA6kEyWvmPlXO8mX2N8JDGq9f-SXKex-RWCxdmmxokDvuPclHK2DqJIapJOq8K2x"
                        'X-API-TOKEN: Gxc8y6AKed3wbFe6SlSEgZKbwKAhLHY8dib2,"wA6kEyWvmPlXO8mX2N8JDGq9f-SXKex-RWCxdmmxokDvuPclHK2DqJIapJOq8K2x"' // Coloque aqui seu token real da Zenvia
                    ]);
                    echo 'informações do ch linha 63: <pre>';
                    print_r($ch);
                    echo '</pre>';

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    echo 'informações do ch linha 67: <pre>';
                    print_r($ch);
                    echo '</pre>';

                    curl_setopt($ch, CURLOPT_POST, true);
                    echo 'informações do ch linha 73: <pre>';
                    print_r($ch);
                    echo '</pre>';

                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($smsData));
                    echo 'informações do ch linha 77: <pre>';
                    print_r($ch);
                    echo '</pre>';
                    echo 'informações do smsData linha 77: <pre>';
                    print_r($smsData);
                    echo '</pre>';

                    $response = curl_exec($ch);
                    echo 'informações do ch linha 85: <pre>';
                    print_r($response);
                    echo '</pre>';

                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    echo 'informações do ch linha 90: <pre>';
                    print_r($httpCode);
                    echo '</pre>';

                    $curlError = curl_error($ch);
                    echo 'informações do ch linha 96: <pre>';
                    print_r($curlError);
                    echo '</pre>';

                    curl_close($ch);
                    echo 'informações do ch linha 100: <pre>';
                    print_r($ch);
                    echo '</pre>';

                    echo "HTTP Status: $httpCode\n<br>";
                    echo "Resposta da API: $response\n<br>";
                    if ($curlError) {
                        echo "Erro cURL: $curlError\n<br>";
                    }
                }
            }            

            // header("Location: tela_autoatendimento_page4.php");
            // exit;
        } else {
            echo "Erro ao inserir no banco.";
        }
    } else {
        echo "Dados incompletos.";
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
    <link rel="stylesheet" href="../../public/css/tela_autoatendimento_page3.css"> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->

    <!-- LOGO -->
    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico"> <!-- ( Atualização de caminho ) -->
</head>

<body>
    <header class="head">
        <nav class="nav-head">
            <div class="logo-control">
                <img src="../../public/img/icons/logo_control.svg" alt="LOGOCONTROL" id="img-logo"> <!-- ( Atualização de caminho ) -->
            </div>
            <H3>PassControl</H3>
    </header>

    <div class="border-line"></div>

    <main class="workspace">

        <div class="area-cinza">

            <h4 class="page-title">
                Informe seus dados para atendimento:
            </h4>


            <form method="POST" id="form-dados">
                <div class="box-inputs">
                    <div class="input-group">
                        <h3 for="nome">Nome*</h3>
                        <br>
                        <input type="text" class="input-infos" id="nome" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="input-group">
                        <h3 for="sobrenome">Sobrenome*</h3>
                        <br>
                        <input type="text" class="input-infos" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
                    </div>
                    <div class="input-group">
                        <h3 for="telefone">Telefone</h3>
                        <br>
                        <input type="tel" class="input-infos" id="telefone" name="telefone" placeholder="(00) 00000-0000">
                    </div>
                    <div class="input-group">
                        <div class="information">
                            * A SENHA NÃO SERÁ IMPRESSA <br><br>
                            * INSIRA SEU NÚMERO DE TELEFONE PARA RECEBER AS INFORMAÇÕES DO SEU ATENDIMENTO VIA SMS
                        </div>
                    </div>
                </div>

                <!-- inputs ocultos necessários para o PHP -->
                <input type="hidden" id="prioridade" name="prioridade">
                <input type="hidden" id="id_servico" name="id_servico">
                <input type="hidden" id="telefone_hidden" name="telefone">
                
                <div class="footer">
                    <button type="button" class="button">
                        <a href="../../app/view/tela_autoatendimento_page2.php" class="btn-voltar">VOLTAR</a>
                    </button>
                    <button type="button" class="button btn-confirmar" id="confirmarBtn">CONFIRMAR</button>
                </div>
            </form>

        </div>

        </div>
        </div>
    </main>

    <script src="../../public/js/tela_autoatendimento_page3.js"></script> <!-- ( Atualização de caminho e renomeando o nome da pasta para letras minúsculas ) -->
</body>
</html>