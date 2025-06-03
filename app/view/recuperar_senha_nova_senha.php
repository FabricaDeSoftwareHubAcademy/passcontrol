<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PassControl</title> 

    <link rel="stylesheet" href="../../public/css/recuperar_senha_nova_Senha.css">
    <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">


    <script src="../../public/js/recuperar_senha_nova_senha.js" defer></script>
    <script src="../../public/js/modal_confirmacao_dados.js" defer></script>

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
                <form action="" class="formRecuperar">

                    <div class="containerNovaSenha">
                        <label for="" class="lblRecuperar">Insira a nova senha</label>
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
                        <button type="submit" onclick="return validarConfSenha()">Enviar</button>
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