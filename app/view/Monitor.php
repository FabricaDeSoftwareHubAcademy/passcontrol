<?php
session_start();
require_once '../database/Database.php';

if (!isset($_SESSION['historico_senhas']) || !is_array($_SESSION['historico_senhas'])) {
    $_SESSION['historico_senhas'] = [];
}

function ordenarSenhasComPrioridade(array $senhas): array {
    $filaFinal = [];
    $puladas = [];
    $prQuePularam = [];

    for ($i = 0; $i < count($senhas); $i++) {
        $senha = $senhas[$i];

        if ($senha['prioridade_fila_senha']) {
            if (in_array($senha['id_fila_senha'], $prQuePularam)) {
                $filaFinal[] = $senha;
                continue;
            }

            $pulou = false;

            for ($j = 0; $j < count($filaFinal); $j++) {
                $alvo = $filaFinal[$j];

                if (
                    !$alvo['prioridade_fila_senha'] &&
                    !in_array($alvo['id_fila_senha'], $puladas)
                ) {
                    if ($j == count($filaFinal) - 1) {
                        array_splice($filaFinal, $j, 0, [$senha]);
                        $puladas[] = $alvo['id_fila_senha'];
                        $prQuePularam[] = $senha['id_fila_senha'];
                        $pulou = true;
                        break;
                    }
                }
            }

            if (!$pulou) {
                $filaFinal[] = $senha;
            }
        } else {
            $filaFinal[] = $senha;
        }
    }

    return $filaFinal;
}

$db = new Database('fila_senha');
$stmt = $db->select('', 'id_fila_senha ASC');
$senhasBrutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['senha_principal']) || !isset($_SESSION['fila_senhas'])) {
    $_SESSION['senha_principal'] = array_shift($senhasBrutas);
    $_SESSION['fila_senhas'] = ordenarSenhasComPrioridade($senhasBrutas);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proxima'])) {
    $atual = $_SESSION['senha_principal'];

    array_unshift($_SESSION['historico_senhas'], $atual);

    $_SESSION['senha_principal'] = array_shift($_SESSION['fila_senhas']);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$senhaPrincipal = $_SESSION['senha_principal'] ?? null;
$ultimasChamadas = array_slice($_SESSION['historico_senhas'], 0, 4);

$servicoDB = new Database('servico');
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
                    <div class="nome-pessoa">
                        <h1><?= htmlspecialchars($senhaPrincipal['nome_fila_senha']) ?></h1>
                    </div>
                    <div class="infos-senha-principal">
                        <li><h2>SENHA:</h2>
                            <span><?= $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM' ?> <?= str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT) ?></span>
                        </li>
                        <li><h2>GUICHÊ:</h2> <span>test</span></li>
                    </div>
                    <div class="nome-servico">
                        <li><h2>SERVIÇO:</h2>
                            <span>
                                <?php
                                    $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
                                    echo htmlspecialchars($servico['nome_servico'] ?? 'SEM INFORMAÇÕES');
                                ?>
                            </span>
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
    
    <!-- script para atualizar o monitor -->
   <script>
        setInterval(() => {
            location.reload();
        }, 2000); // 2 segundos = 2000
    </script>

</body>
</html>