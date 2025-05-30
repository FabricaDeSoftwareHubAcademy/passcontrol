<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PassControl</title>

    <link rel="stylesheet" href="../../public/css/recuperar_senha_codigo.css">

    <script src="../../public/js/recuperar-senha-codigo.js" defer></script>

    <link rel="shortcut icon" type="imagex/png" href="../../public/img/Logo-Nota-Controlnt.ico">
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
                    <label for="" class="lblRecuperar">Recuperar Senha</label>

                    <div class="containerInput">
                        <input type="text" class="inpRecuperar" id="input1" placeholder="" maxlength="1" required onKeyUp="mudaFoco(this, 1, input2)">
                        <input type="text" class="inpRecuperar" id="input2" placeholder="" maxlength="1" required onKeyUp="mudaFoco(this, 1, input3)">
                        <input type="text" class="inpRecuperar" id="input3" placeholder="" maxlength="1" required onKeyUp="mudaFoco(this, 1, input4)">
                        <input type="text" class="inpRecuperar" id="input4" placeholder="" maxlength="1" required onKeyUp="mudaFoco(this, 1, input5)">
                        <input type="text" class="inpRecuperar" id="input5" placeholder="" maxlength="1" required onKeyUp="mudaFoco(this, 1, null)">

                    </div>

                    <span>Insira o código recebido no E-mail.</span>

                    <div class="btnEnviar">
                        <a href="./recuperar_senha_nova_Senha.php" type="submit" class="btn">Entrar</a>
                    </div>
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

</body>
</html>