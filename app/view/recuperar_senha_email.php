<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passcontrol</title>
 
    <link rel="stylesheet" href="../../public/css/root.css">
    <link rel="stylesheet" href="../../public/css/forms.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_senha.css">

    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">

    <script src="../../public/js/modal_confirmacao_envio_email.js" defer></script>
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
 
        <form id="form_rec_senha" method="POST" class="form">
            <div class="input_group">
                <label class="label_recuperar_senha" for="">Recuperar Senha</label>
                <input class="input" type="text" name="cpf_user" id="cpf" placeholder="CPF">
            </div>

            <p class="text_recuperar_senha">Você receberá um código de segurança no email cadastrado para esse CPF, para validar sua nova senha.</p>

            <div class="container_button">
                <button type="button" class="button open-confirmacao-senha">Enviar</button>
            </div>
        </form>
    </main>
 
    <?php include '../../public/modais/modal_confirmacao_envio_email.php'; ?>
</body>
</html>