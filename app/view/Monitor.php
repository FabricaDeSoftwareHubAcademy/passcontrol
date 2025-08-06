<?php
session_start();
require_once '../database/Database.php';

$db = new Database('fila_senha');
$servicoDB = new Database('servico');
$guicheDB = new Database('ponto_atendimento');

// Busca todas as senhas com status "em atendimento", ordenadas da mais recente para a mais antiga
$senhasEmAtendimento = $db->select("status_fila_senha = 'em atendimento'", 'fila_senha_chamada_in DESC')->fetchAll(PDO::FETCH_ASSOC);

// Pega a senha mais recente como principal
$senhaPrincipal = $senhasEmAtendimento[0] ?? null;

// Pega até 4 senhas seguintes (últimas chamadas), excluindo a principal
$ultimasChamadas = array_slice($senhasEmAtendimento, 1, 4);
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
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/monitor_senhas.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body>
<section class="fundo-de-tudo">
    <div class="fundo-azul-lateral">
        <h1>Últimas<br>Chamadas</h1>
        <div class="area-das-senhas">
            <?php if (!empty($ultimasChamadas)): ?>
                <?php foreach ($ultimasChamadas as $senha): ?>
                    <?php
                        $servico = $servicoDB->select('id_servico = ' . $senha['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
                        $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senha['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
                        $prioridade = $senha['prioridade_fila_senha'] ? 'PR' : 'CM';
                        $numero = str_pad($senha['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                    ?>
                    <div class="caixa-das-senhas">
                        <h2><?= htmlspecialchars($senha['nome_fila_senha'] ?? '...') ?></h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA:</h3>
                                <h4><?= $prioridade ?> <?= $numero ?></h4>
                            </div><br>
                            <div class="guiche">
                                <h3>GUICHÊ:</h3>
                                <h4><?= htmlspecialchars($guiche['nome_ponto_atendimento'] ?? '...') ?> - <?= htmlspecialchars($guiche['identificador_ponto_atendimento'] ?? '') ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="caixa-das-senhas">
                    <h2>SEM INFORMAÇÕES</h2>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="fundo-senha-principal">
        <div class="fundo-senha-principal-wrap">
            <?php if ($senhaPrincipal): ?>
                <?php
                    $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
                    $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senhaPrincipal['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
                    $prioridade = $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM';
                    $numero = str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                ?>
                <div class="nome-pessoa">
                    <h1><?= htmlspecialchars($senhaPrincipal['nome_fila_senha'] ?? '...') ?></h1>
                </div>
                <div class="infos-senha-principal">
                    <li>
                        <h2>SENHA:</h2>
                        <span><?= $prioridade ?> <?= $numero ?></span>
                    </li>
                    <li>
                        <h2>GUICHÊ:</h2>
                        <span><?= htmlspecialchars($guiche['nome_ponto_atendimento'] ?? '...') ?> - <?= htmlspecialchars($guiche['identificador_ponto_atendimento'] ?? '') ?></span>
                    </li>
                </div>
                <div class="nome-servico">
                    <li>
                        <h2>SERVIÇO:</h2>
                        <span><?= htmlspecialchars($servico['nome_servico'] ?? '...') ?></span>
                    </li>
                </div>
            <?php else: ?>
                <div class="nome-pessoa">
                    <h1>SEM INFORMAÇÕES</h1>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
</body>
</html>