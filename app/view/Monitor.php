<?php
session_start();
require_once '../database/Database.php';

$db = new Database('fila_senha');
$servicoDB = new Database('servico');

$senhaPrincipal = $db->select("status_fila_senha = 'em atendimento'", 'id_fila_senha DESC', '1')->fetch(PDO::FETCH_ASSOC);

$where = "status_fila_senha IN ('em atendimento', 'atendido')";
if ($senhaPrincipal) {
    $where .= " AND id_fila_senha != " . intval($senhaPrincipal['id_fila_senha']);
}
$ultimasChamadas = $db->select($where, 'id_fila_senha DESC', '4')->fetchAll(PDO::FETCH_ASSOC);
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
                        $prioridade = $senha['prioridade_fila_senha'] ? 'PR' : 'CM';
                        $numero = str_pad($senha['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                    ?>
                    <div class="caixa-das-senhas">
                        <h2><?= htmlspecialchars($senha['nome_fila_senha']) ?></h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA:</h3>
                                <h4><?= $prioridade ?> <?= $numero ?></h4>
                            </div>
                            <div class="guiche">
                                <h3>GUICHÊ:</h3>
                                <h4>test</h4>
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
                    $prioridade = $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM';
                    $numero = str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                ?>
                <div class="nome-pessoa">
                    <h1><?= htmlspecialchars($senhaPrincipal['nome_fila_senha']) ?></h1>
                </div>
                <div class="infos-senha-principal">
                    <li>
                        <h2>SENHA:</h2>
                        <span><?= $prioridade ?> <?= $numero ?></span>
                    </li>
                    <li>
                        <h2>GUICHÊ:</h2>
                        <span>test</span>
                    </li>
                </div>
                <div class="nome-servico">
                    <li>
                        <h2>SERVIÇO:</h2>
                        <span><?= htmlspecialchars($servico['nome_servico'] ?? 'SEM INFORMAÇÕES') ?></span>
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