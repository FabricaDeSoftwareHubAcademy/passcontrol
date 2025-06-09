<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <link rel="stylesheet" href="../../public/css/root.css">
    <link rel="stylesheet" href="../../public/css/forms.css">
    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">
</head>
<body class="body_login background_image">
    <main class="container_login">
        <div class="card_left_login">
            <div class="container_animation">
                <img src="../../public/img/logo_animation/animation_logo_top.png" alt="imagem da animação topo" class="image_animation image_animation_top">
                <img src="../../public/img/logo_animation/animation_logo_mid.png" alt="imagem da animação meio" class="image_animation image_animation_mid">
                <img src="../../public/img/logo_animation/animation_logo_bot.png" alt="imagem da animação baixo" class="image_animation image_animation_bot">
            </div>
            <h1 class="title">PASS CONTROL</h1>
        </div>

        <form action="" class="form"> <div class="input_group">
                <label class="label_recuperar_senha" for="">Recuperar Senha</label>
                <div class="container_input_codigo"> <input type="text" class="input" name="" id="input_1" maxlength="1" required onkeyup="mudaFoco(this, 1, input_2)">
                    <input type="text" class="input" name="" id="input_2" maxlength="1" required onkeyup="mudaFoco(this, 1, input_3)">
                    <input type="text" class="input" name="" id="input_3" maxlength="1" required onkeyup="mudaFoco(this, 1, input_4)">
                    <input type="text" class="input" name="" id="input_4" maxlength="1" required onkeyup="mudaFoco(this, 1, input_5)">
                    <input type="text" class="input" name="" id="input_5" maxlength="1" required onkeyup="mudaFoco(this, 1, null)">
                </div>
            </div>
            <p class="text_recuperar_senha">Insira o código recebido no e-mail.</p>
            <div class="container_button">
                <a class="button" href="./recuperar_senha_nova_senha.php">Enviar</a>
            </div>
        </form>
    </main>

    <script src="../../public/js/recuperar_senha_codigo.js" defer></script>
</body>
</html>