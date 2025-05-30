<?php
require './app/classes/Usuario.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['cpf'])){
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();
    if($usuario->logar($cpf, $senha)){
        header("location: ./app/view/atendimento.php");
    }else{
        echo "<script>alert('CPF ou senha incorreto!')</script>";
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
    <!-- <script src="public/js/login.js" defer></script> -->
    <link rel="shortcut icon" type="imagex/png" href="public/img/favicon.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="login">
    <?php
        include './app/actions/usuario_logar.php';
    ?>
    
    
    
        <!-- <div class="GroupLineResponsive">
            <div class="lineResponsive">
                <span></span>
            </div>
            <div class="arrowResponsive">
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="public/img/logo-png/setas.png" alt=""></div>
            </div>
        </div> -->

        
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

            <form action="#" method="post" class="formBoxLogin" id="login">
                <div class="group user">
                    <label for="name">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="14" required>

                </div>
                <div class="group senha-telaLogin">
                    <label for="password">Senha</label>
                    <input type="password" name="senha" placeholder="••••••••" id="inpSenha" required>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <nav class="navEsqueciSenha">
                    <li><a href="app/view/recuperar_senha_email.php"><span class="spnEsqueciSenha">Esqueci Minha Senha</span></a></li>
                </nav>

                <div class="btnEntrar">
                        <button type="submit" name="enviar" class="btn" form="login">Entrar</button>
                </div>
            </form>
            
        </div>
    </div>



    <!-- <div class="GroupLineResponsive groupRight">
        <div class="arrowResponsive ">
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="public/img/logo-png/setas.png" alt=""></div>
        </div>
        <div class="lineResponsive">
            <span></span>
        </div>
    </div> -->
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const cpfInput = document.getElementById('cpf');

    cpfInput.addEventListener('input', () => {
        let value = cpfInput.value.replace(/\D/g, '');

        if (value.length > 11) value = value.slice(0, 11);

        if (value.length > 9) {
            value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
        } else if (value.length > 6) {
            value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
        } else if (value.length > 3) {
            value = value.replace(/(\d{3})(\d{1,3})/, '$1.$2');
        }

        cpfInput.value = value;
    });
});
</script>

</body>

</html>