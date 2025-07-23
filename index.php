<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <link rel="stylesheet" href="./public/css/root.css">
    <link rel="stylesheet" href="./public/css/forms.css">

    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="./app/js/mascara_cpf.js" defer></script>
    <script src="./app/js/login.js" defer></script>
</head>
<body class="body_login background_image">
    <main class="container_login">
        <div class="card_left_login">
            <div class="container_animation">
                <img src="./public/img/logo_animation/animation_logo_top.png" alt="imagem da animação topo" class="image_animation image_animation_top">
                <img src="./public/img/logo_animation/animation_logo_mid.png" alt="imagem da animação meio" class="image_animation image_animation_mid">
                <img src="./public/img/logo_animation/animation_logo_bot.png" alt="imagem da animação baixo" class="image_animation image_animation_bot">
            </div>
            <h1 class="title">PASS CONTROL</h1>
        </div>

        <div class="container_lines">
            <div class="line_top"></div>
            <div class="container_arrow">
                <img src="./public/img/arrow.png" alt="setas">
                <img src="./public/img/arrow.png" alt="setas">
                <img src="./public/img/arrow.png" alt="setas">
            </div>
            <div class="line_bot"></div>
        </div>

        <div class="card_right_login">
            <h1 class="title">Olá, Seja Bem-Vindo!</h1>
            <!-- <form action="./app/actions/usuario_logar.php" method="post" class="form form_login"> -->
            <form id="form_login" class="form form_login">

                <div class="input_group input_group_login">
                    <label for="cpf" class="label">CPF</label>
                    <input type="text" name="cpf" id="cpf" class="input" placeholder="000.000.000-00">
                </div>

                <div class="input_group input_group_login">
                    <label for="senha" class="label">Senha</label>
                    <div class="password_group">
                        <input type="password" name="senha" id="input_password" class="input input_password" placeholder="••••••••" required>
                        <i id="toggle_password" class="fas fa-eye toggle_password"></i>
                    </div>
                </div>

                <p id="login_msg" style="color: red; display: none; text-align: left; margin-top: 10px; font-size: 0.9rem;"></p>

                <div class="container_link">
                    <a href="./app/view/recuperar_senha_email.php" class="link">Esqueci Minha Senha</a>
                </div>


                <div class="container_button">
            
                    <button type="button" id="btn_login" class="button">Entrar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>