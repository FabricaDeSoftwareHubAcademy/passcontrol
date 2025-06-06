<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <link rel="stylesheet" href="../../public/css/root.css">
    <link rel="stylesheet" href="../../public/css/forms.css">
    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <label for="nova_senha" class="label">Insira a nova senha</label>
                <div class="password_group">
                    <input type="password" id="nova_senha" class="input input_password" placeholder="Digite a nova senha">
                    <i class="fas fa-eye toggle_password" id="toggle_password_novo"></i>
                </div>
            </div>

            <div class="input_group">
                <label for="confirmar_senha" class="label">Confirme a nova senha</label>
                <div class="password_group">
                    <input type="password" id="confirmar_senha" class="input input_password" placeholder="Confirme a nova senha">
                    <i class="fas fa-eye toggle_password" id="toggle_password"></i>
                </div>
            </div>

            <div class="container_requisitos">
                <p class="text_requisitos">A senha deverá conter:</p>
                <ul class="list_requisitos">
                    <li id="digito" class="requisitos_minimos">Mínimo de 8 digitos</li>
                    <li id="numero" class="requisitos_minimos">1 Número</li>
                    <li id="maiuscula" class="requisitos_minimos">1 Letra maiúscula</li>
                    <li id="caractere_especial" class="requisitos_minimos">1 Caractere especial</li>
                </ul>
            </div>

            <div class="container_button">
                <button class="button" type="submit" onclick="return validarConfirmacaoSenha()">Salvar</button>
            </div>
        </form>
    </main>

    <script src="../../public/js/recuperar_senha_nova_senha.js" defer></script>
    <script src="../../public/js/confirmacao_recuperar_senha.js" defer></script>
    <script src="../../public/js/login.js" defer></script>

    <?php include '../../public/modais/confirmacao_recuperar_senha.php'; ?>
</body>
</html>