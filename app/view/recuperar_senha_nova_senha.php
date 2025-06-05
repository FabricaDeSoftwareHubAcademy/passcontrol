<?php
 if (!isset($_GET['id'])) {
     $id = $_GET['id'];
 }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <link rel="stylesheet" href="../../public/css/recuperar_senha_nova_senha.css">
    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="body_login background_image">
    <main class="container_login">
        <div class="container_animation">
            <img src="../../public/img/logo_png/animation_logo_top.png" alt="imagem da animação topo" class="image_animation image_animation_top">
            <img src="../../public/img/logo_png/animation_logo_mid.png" alt="imagem da animação meio" class="image_animation image_animation_mid">
            <img src="../../public/img/logo_png/animation_logo_bot.png" alt="imagem da animação baixo" class="image_animation image_animation_bot">
        </div>
        <h1 class="title">PASS CONTROL</h1>

        <form action="" class="form form_login">
            <div class="input_group input_group_login">
                <label for="" class="label">Insira a nova senha</label>
                <div class="password_group">
                    <input type="password" id="nova_senha" class="input input_password" placeholder="Digite a nova senha">
                    <i class="fas fa-eye toggle_password" id="toggle_password_novo"></i>
                </div>
            </div>

            <div class="input_group input_group_login">
                <label for="" class="label">Confirme a nova senha</label>
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
    <script src="../../public/js/alterar_senha_primeiro_acesso.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="recuperarSenha">
    <div class="box">

        <div class="GroupLine groupLeft">
            <div class="line">
                <span></span>
            </div>
            <div class="arrow">
                <div class="setas"><img src="../../public/img/logo-png/setas.png" alt=""></div>
                <div class="setas"><img src="../../public/img/logo-png/setas.png" alt=""></div>
                <div class="setas"><img src="../../public/img/logo-png/setas.png" alt=""></div>
            </div>
        </div>
    


        <main>
            <div class="containerAnime">
                    <div class="containerImagens">
                        <img src="../../public/img/logo-png/top.png" alt="" class="imagem imagemTop">
                        <img src="../../public/img/logo-png/mid.png" alt="" class="imagem imagemMid">
                        <img src="../../public/img/logo-png/bot.png" alt="" class="imagem imagemBot">
                    </div>
                    <div class="titlePass">
                        <h1>PASS CONTROL</h1>
                    </div>
            </div>


            <div class="containerRecuperar">
                <form id="formRecuperar" action="" class="formRecuperar">

                    <div class="containerNovaSenha">
                        <label for="" class="lblRecuperar">Insira a nova senha</label>
                        <input id="id_user" type="hidden" class="id_user">
                        <input id="novaSenha" type="password" class="inpRecuperar" placeholder="Nova Senha">
                        <i class="fas fa-eye" id="togglePasswordNv"></i>
                    </div>
                        
                    <div class="containerConfNovaSenha">    
                        <label for="" class="lblRecuperar">Confirme a nova senha</label>
                        <input id="confirmSenha" type="password" class="inpRecuperar" placeholder="Confirme">
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </div>
                    
                    <div class="containerRequisitoSenhas">
                        <h1>A senha deverá conter:</h1>
                        <ul>
                            <li id="digito" class="RequisitosMin " >Mínimo de 8 Digitos</li>
                            <li id="maiusca" class="RequisitosMin ">1 Letra Maúscula</li>
                            <li id="numero" class="RequisitosMin ">1 Número</li>
                            <li id="caracEspec" class="RequisitosMin " >1 Caractere Especial</li>
                        </ul>
                    </div>
                    <nav>
                        <button id="btn_alterar_senha" type="submit" onclick="return validarConfSenha()">Enviar</button>
                    </nav>
                </form>
            </div>
        </main>



        <div class="GroupLine groupRight">
            <div class="arrow ">
                <div class="setas setaRight"><img src="../../public/img/logo-png/setas.png" alt=""></div>
                <div class="setas setaRight"><img src="../../public/img/logo-png/setas.png" alt=""></div>
                <div class="setas setaRight"><img src="../../public/img/logo-png/setas.png" alt=""></div>
            </div>
            <div class="line">
                <span></span>
            </div>
        </div>
    </div>
    <?php include '../../public/modais/confirmacao_recuperar_senha.php'; ?>
</body>
</html>