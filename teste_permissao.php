<?php
session_start();

// Recebe o perfil por GET para facilitar o teste, ex: teste_permissoes.php?perfil=5
$perfil = isset($_GET['perfil']) ? (int)$_GET['perfil'] : null;

if (!$perfil || !in_array($perfil, [5, 6, 7])) {
    echo "Teste do Fluxo (admin), (supervisor) ou (atendente).<br>";
    echo "Exemplo: <a href='?perfil=5'>Fluxo_Admin.php</a><br>";
    echo "Exemplo: <a href='?perfil=6'>Fluxo_Atendente.php</a><br>";
    echo "Exemplo: <a href='?perfil=7'>Fluxo_Supervisor.php</a><br>";
    exit;
}

// Popula a sessão com dados simulados
$_SESSION['id_usuario'] = 999;
$_SESSION['nome_usuario'] = 'Usuário Teste';
$_SESSION['id_perfil_usuario_fk'] = $perfil;

// Inclui o arquivo de verificação de permissão que já deve fazer os redirecionamentos
include_once __DIR__ . '/app/actions/verificar_permissao.php';

// Se chegou aqui, é porque o perfil é admin (que não redireciona), então só mostre uma mensagem:
echo "<h1>Usuário com perfil ";
if ($perfil == 5) echo "ADMINISTRADOR";
elseif ($perfil == 6) echo "SUPERVISOR";
else echo "ATENDENTE";
echo " logado com sucesso.</h1>";
echo "<p><a href='logout.php'>Logout / Limpar sessão</a></p>";
