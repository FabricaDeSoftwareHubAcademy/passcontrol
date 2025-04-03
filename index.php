<?php
require 'app/controller/Usuario.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();
    if($usuario->logar($email, $senha)){
        header("location: app/admin/view/atendimento.php");
    }else{
        echo "<script>alert('Email ou Senha incorreto!') </script>";
    }
}
?> 

<!DOCTYPE html>
<html lang="p-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 

    <link rel="stylesheet" href="public/css/login.css">
    <script src="public/js/login.js" defer></script>
    <link rel="shortcut icon" type="imagex/png" href="public/img/Logo-Nota-Controlnt.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="login">
    <header>
    </header>
    
    
    
        <div class="GroupLineResponsive">
            <div class="lineResponsive">
                <span></span>
            </div>
            <div class="arrowResponsive">
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
            </div>
        </div>

        
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
                    <label for="name">Usuário</label>
                    <input type="email" name="email" placeholder="usuario@gmail.com">
                </div>
                <div class="group senha-telaLogin">
                    <label for="password">Senha</label>
                    <input type="password" name="senha" placeholder="••••••••" id="inpSenha">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <nav class="navEsqueciSenha">
                    <li><a href="app/admin/view/recuperar-senha-email.php"><span class="spnEsqueciSenha">Esqueci Minha Senha</span></a></li>
                </nav>

                <div class="btnEntrar">
                        <button type="submit" name="enviar" class="btn">Entrar</button>
                </div>
            </form>
            
        </div>
    </div>



    <div class="GroupLineResponsive groupRight">
        <div class="arrowResponsive ">
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
        </div>
        <div class="lineResponsive">
            <span></span>
        </div>
    </div>
</body>

</html>