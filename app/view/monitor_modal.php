<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../database/Database.php';


$db = new Database('fila_senha');
$servicoDB = new Database('servico');
$guicheDB = new Database('ponto_atendimento');

// Busca senhas com status "em atendimento"
$senhasEmAtendimento = $db->select("status_fila_senha in ('em atendimento','atendido')", 'fila_senha_chamada_in DESC')->fetchAll(PDO::FETCH_ASSOC);

// Senha principal
$senhaPrincipal = $senhasEmAtendimento[0] ?? null;

// Últimas chamadas
$ultimasChamadas = array_slice($senhasEmAtendimento, 1, 4);
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
                                    $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senha['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
                                    $prioridade = $senha['prioridade_fila_senha'] ? 'PR' : 'CM';
                                    $numero = str_pad($senha['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                                ?>
                                <div class="caixa-das-senhas">
                                    <h2><?= htmlspecialchars($senha['nome_fila_senha'] ?? '...') ?></h2>
                                    <div class="conjunto-senhas">
                                        <div class="senha">
                                            <h3>SENHA</h3>
                                            <h4><?= $prioridade ?> <?= $numero ?></h4>
                                        </div>
                                        <div class="guiche">
                                            <h5>GUICHÊ</h5>
                                            <h6><?= htmlspecialchars($guiche['nome_ponto_atendimento'] ?? '...') ?> - <?= htmlspecialchars($guiche['identificador_ponto_atendimento'] ?? '') ?></h6>
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
                                    <?php
                                        $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
                                        $guiche = $guicheDB->select('id_ponto_atendimento = ' . (int)$senhaPrincipal['id_ponto_atendimento'])->fetch(PDO::FETCH_ASSOC);
                                        $prioridade = $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM';
                                        $numero = str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT);
                                    ?>
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
                                            <h2><?= htmlspecialchars($servico['nome_servico'] ?? '...') ?></h2>
                                            <h2><?= $prioridade ?> <?= $numero ?></h2>
                                            <h2><?= htmlspecialchars($guiche['nome_ponto_atendimento'] ?? '...') ?> - <?= htmlspecialchars($guiche['identificador_ponto_atendimento'] ?? '') ?></h2>
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
<script>
function atualizarModal() {
    fetch('../../app/actions/get_chamadas.php')
        .then(res => res.json())
        .then(data => {
            const fundoPrincipal = document.querySelector('.caixa-senha-principal');
            const ultimasDiv = document.querySelector('.area-das-senhas');

            if (data.principal) {
                fundoPrincipal.innerHTML = `
                    <div class="nome-pessoa"><h1>${data.principal.nome}</h1></div>
                    <div class="infos-senha-principal">
                        <div class="infos-detalhes-esquerda">
                            <h2>SERVIÇO:</h2>
                            <h2>SENHA:</h2>
                            <h2>GUICHÊ:</h2>
                        </div>
                        <div class="infos-detalhes-direita">
                            <h2>${data.principal.servico}</h2>
                            <h2>${data.principal.senha}</h2>
                            <h2>${data.principal.guiche}</h2>
                        </div>
                    </div>`;
            }

            ultimasDiv.innerHTML = '';
            data.ultimas.forEach(s => {
                const div = document.createElement('div');
                div.classList.add('caixa-das-senhas');
                div.innerHTML = `<h2>${s.nome}</h2>
                                 <div class="conjunto-senhas">
                                     <div class="senha"><h3>SENHA</h3><h4>${s.senha}</h4></div>
                                     <div class="guiche"><h5>GUICHÊ</h5><h6>${s.guiche}</h6></div>
                                 </div>`;
                ultimasDiv.appendChild(div);
            });
        })
        .catch(err => console.error(err));
}

setInterval(atualizarModal, 2000);
atualizarModal();
</script>

</body>
</html>