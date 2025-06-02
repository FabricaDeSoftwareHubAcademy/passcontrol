<?php
require_once('./usuario_primeiroacesso.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['cpf'])){
    $cpf = addslashes($_POST['cpf']);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();
    if ($usuario->logar($cpf, $senha)) {
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
    
        // Verifica se é primeiro acesso
        $dados_usuario = $usuario->buscar("id_usuario = $id_usuario")[0];
        
        if ($dados_usuario['primeiro_login']) {
            include './testeprimeiroacesso/modal_primeiroacesso_alterarsenha.php';
            exit;
        }
        } else {
            header("Location: ./app/view/atendimento.php");
            exit;
        }
    }
?> 

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="../public/css/login.css">
    <script src="../public/js/login.js" defer></script>
    <link rel="shortcut icon" type="imagex/png" href="public/img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="login">
    <header>
    </header>
    
        
    <div class="containerLogin">
        <div class="animBox">
            <div class="containerImagens">
                <img src="public/img/logo-png/top.png" alt="" class="imagem imagemTop">
                <img src="public/img/logo-png/mid.png" alt="" class="imagem imagemMid">
                <img src="public/img/logo-png/bot.png" alt="" class="imagem imagemBot">
            </div>
            <div class="titlePass">
                <h1>PASS CONTROL</h1>
            </div>
        </div>

        <div class="GroupLine">
            <div class="line1">
                <span></span>
            </div>
            <div class="arrow">
                <div class="setas"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setas"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setas"><img src="public/img/logo-png/setas.png" alt=""></div>
            </div>
            <div class="line2">
                <span></span>
            </div>
        </div>
        <div class="cardLogin">
            <div class="containerBemVindoLogin">
                <span class="titleBemVindo">Olá, Seja Bem-Vindo !!</span>
            </div>

            <form action="#" method="post" class="formBoxLogin">
                <div class="group user">
                    <label for="name">CPF</label>
                    <input type="text" name="cpf" placeholder="000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required title="Digite um CPF no formato 000.000.000-00">
                </div>
                <div class="group senha-telaLogin">
                    <label for="password">Senha</label>
                    <input type="password" name="senha" placeholder="••••••••" id="inpSenha">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <nav class="navEsqueciSenha">
                    <li><a href="app/view/recuperar_senha_email.php"><span class="spnEsqueciSenha">Esqueci Minha Senha</span></a></li>
                </nav>

                <div class="btnEntrar">
                        <button type="submit" name="enviar" class="btn">Entrar</button>
                </div>
            </form>
            
        </div>
    </div>

    <?php if (isset($_SESSION['primeiro_login']) && $_SESSION['primeiro_login']) {
    include('testeprimeiroacesso/modal_primeiroacesso_alterarsenha.php');
    // Opcional: zera a flag para o modal não aparecer de novo após reload
    unset($_SESSION['primeiro_login']);
} ?>


</body>

</html>