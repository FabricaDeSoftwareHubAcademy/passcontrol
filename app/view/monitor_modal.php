<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PassControl - Modal Monitor</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../public/css/monitor_modal.css" />
    <script src="../../public/js/monitor_modal.js" defer></script>
</head>
<body>
<div class="area-monitor-modal">
    <div class="area-modal" id="modalMonitor">
        <div class="modal-fundo">

            <!-- Lateral -->
            <div class="fundo-lateral">
                <h1>Últimas Chamadas</h1>
                <div class="area-das-senhas">
                    <p class="text-center text-muted">Carregando...</p>
                </div>
            </div>

            <!-- Principal -->
            <div class="fundo-principal">
                <div class="area-botao-fechar-monitor">
                    <div class="botao-fechar-monitor" id="fecharMonitor">
                        <h2>X</h2>
                    </div>
                </div>

                <div class="fundo-senha-principal">
                    <div class="caixa-senha-principal">
                        <div class="conjunto-senha-principal">
                            <div class="nome-pessoa"><h1>...</h1></div>
                            <div class="infos-senha-principal">
                                <div class="infos-detalhes-esquerda">
                                    <h2>SERVIÇO:</h2>
                                    <h2>SENHA:</h2>
                                    <h2>GUICHÊ:</h2>
                                </div>
                                <div class="infos-detalhes-direita">
                                    <h2>...</h2>
                                    <h2>...</h2>
                                    <h2>...</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>