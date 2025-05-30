<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="shortcut icon" href="./public/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./app/js/mascara_cpf.js" defer></script>
    <script src="./public/js/login.js" defer></script>
</head>
<body class="body_login background_image">

    <?php include "./app/actions/usuario_logar.php"; ?>
    
    <main class="container_login">
        <div class="card_left_login">
            <div class="container_animation">
                <img src="./public/img/logo_png/animation_logo_top.png" alt="imagem da animação topo" class="image_animation image_animation_top">
                <img src="./public/img/logo_png/animation_logo_mid.png" alt="imagem da animação meio" class="image_animation image_animation_mid">
                <img src="./public/img/logo_png/animation_logo_bot.png" alt="imagem da animação baixo" class="image_animation image_animation_bot">
            </div>

            <h1 class="title">PASS CONTROL</h1>
        </div>

        <div class="container_lines">
            <div class="line_top"></div>

            <div class="container_arrow">
                <img src="./public/img/logo_png/arrow.png" alt="setas">
                <img src="./public/img/logo_png/arrow.png" alt="setas">
                <img src="./public/img/logo_png/arrow.png" alt="setas">
            </div>

            <div class="line_bot"></div>
        </div>

        <div class="card_right_login">
            <h1 class="title">Olá, Seja Bem-Vindo!</h1>

            <form action="" method="post" class="form form_login">
                <div class="input_group input_group_login">
                    <label for="cpf" class="label">CPF</label>
                    <input type="text" name="cpf" id="" class="input" placeholder="000.000.000-00">
                </div>

                <div class="input_group input_group_login">
                    <label for="password" class="label">Senha</label>
                    <div class="password_group">
                        <input type="password" name="password" id="input_password" class="input input_password" placeholder="••••••••">
                        <i id="toggle_password" class="fas fa-eye toggle_password"></i>
                    </div>
                </div>

                <div class="container_link">
                    <a href="./app/view/recuperar_senha_email.php" class="link">Esqueci Minha Senha</a>
                </div>

                <div class="container_button">
                    <button type="submit" class="button">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    </main>

    
</body>
</html>