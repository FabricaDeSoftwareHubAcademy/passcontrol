<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../database/Database.php';

if (!function_exists('ordenarSenhasComPrioridade')) {
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
}

if (!isset($_SESSION['senha_principal']) || !isset($_SESSION['fila_senhas']) || !isset($_SESSION['historico_senhas'])) {
    $_SESSION['historico_senhas'] = $_SESSION['historico_senhas'] ?? [];

    $db = new Database('fila_senha');
    $stmt = $db->select('', 'id_fila_senha ASC');
    $senhasBrutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($senhasBrutas)) {
        $_SESSION['senha_principal'] = array_shift($senhasBrutas);
        $_SESSION['fila_senhas'] = ordenarSenhasComPrioridade($senhasBrutas);
    } else {
        $_SESSION['senha_principal'] = null;
        $_SESSION['fila_senhas'] = [];
    }
}

$senhaPrincipal = $_SESSION['senha_principal'];
$ultimasChamadas = array_slice($_SESSION['historico_senhas'], 0, 4);

$servicoDB = new Database('servico');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PassControl - Modal Monitor</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/monitor_modal.css" />
</head>
<body>
    <div class="area-monitor-modal">
        <div class="area-modal" id="modalMonitor">
            <div class="modal-fundo">
                <div class="fundo-lateral">
                    <h1>Últimas Chamadas</h1>
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
                                            <h3>SENHA</h3>
                                            <h4><?= $prioridade ?> <?= $numero ?></h4>
                                        </div>
                                        <div class="guiche">
                                            <h5>GUICHÊ</h5>
                                            <h6>test</h6>
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
                <div class="fundo-principal">
                    <div class="area-botao-fechar-monitor">
                        <div class="botao-fechar-monitor" id="fecharMonitor">
                            <h2>X</h2>
                        </div>
                    </div>
                    <div class="fundo-senha-principal">
                        <div class="caixa-senha-principal">
                            <div class="conjunto-senha-principal">
                                <?php if ($senhaPrincipal): ?>
                                    <div class="nome-pessoa">
                                        <h1><?= htmlspecialchars($senhaPrincipal['nome_fila_senha']) ?></h1>
                                    </div>
                                    <div class="infos-senha-principal">
                                        <div class="infos-detalhes-esquerda">
                                            <h2>SERVIÇO:</h2>
                                            <h2>SENHA:</h2>
                                            <h2>GUICHÊ:</h2>
                                        </div>
                                        <div class="infos-detalhes-direita">
                                            <h2>
                                                <?php
                                                    $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
                                                    echo htmlspecialchars($servico['nome_servico'] ?? 'SEM INFORMAÇÕES');
                                                ?>
                                            </h2>
                                            <h2><?= $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM' ?> <?= str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT) ?></h2>
                                            <h2>test</h2>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="nome-pessoa">
                                        <h1>SEM INFORMAÇÕES</h1>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>