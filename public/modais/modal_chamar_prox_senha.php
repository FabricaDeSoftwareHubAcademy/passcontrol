<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../database/Database.php';

$senhaPrincipal = $_SESSION['senha_principal'] ?? null;
$servicoDB = new Database('servico');

$prioridade = $senhaPrincipal && $senhaPrincipal['prioridade_fila_senha'] ? 'PR' : 'CM';
$numero = $senhaPrincipal ? str_pad($senhaPrincipal['id_fila_senha'], 3, '0', STR_PAD_LEFT) : '---';
$nome = $senhaPrincipal['nome_fila_senha'] ?? '...';

$servicoNome = '---';
if ($senhaPrincipal) {
    $servico = $servicoDB->select('id_servico = ' . $senhaPrincipal['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);
    if ($servico) {
        $servicoNome = $servico['nome_servico'];
    }
}
?>
<!-- Estrutura do Modal fora da tela inicialmente -->
<div class="fundo-container-confirmacao-presenca" id="modal-senha" style="display: none;">
    <section class="modal-confirmacao-presenca">
        <img src="../../public/img/icons/logo_control.svg" alt="Logo Nota Control" class="logo-confirmacao-presenca">
        <h1 class="title-confirmacao-presenca">Confirmar Presença</h1>
        <hr class="row-confirmacao-presenca">
        <p class="desk-info-confirmacao-presenca"><b id="guiche-cliente">---</b></p>
        <p class="name-confirmacao-presenca"><b id="nome-cliente">---</b></p>
        <p class="info-confirmacao-presenca"><b>Senha:</b> <span class="senha-confirmacao-presenca" id="senha-cliente">---</span></p>
        <p class="info-confirmacao-presenca"><b>Serviço:</b> <strong id="servico-cliente">---</strong></p>
        <div class="button-group-confirmacao-presenca">
            <div class="button-row-confirmacao-presenca">
                <button class="botao-modal-confirmacao-presenca ausente_ChamarSenha">Ausente</button>
                <button class="botao-modal-confirmacao-presenca presente_ChamarSenha">Presente</button>
            </div>
            <button class="botao-modal-confirmacao-presenca chamar_ChamarSenha">Chamar Novamente</button>
        </div>            
    </section>
</div>
 