<?php
session_start();
require_once 'Permissao.php'; // Ajuste o caminho conforme sua estrutura

// Simule um usuário logado com id_usuario
$id_usuario_teste = 1;  // Coloque um ID de usuário válido do seu banco
$nome_permissao_teste = 'acessar_tela_admin'; // Permissão que deseja testar

$perm = new Permissao();

if ($perm->temPermissao($id_usuario_teste, $nome_permissao_teste)) {
    echo "Usuário $id_usuario_teste TEM a permissão '$nome_permissao_teste'.";
} else {
    echo "Usuário $id_usuario_teste NÃO TEM a permissão '$nome_permissao_teste'.";
}
