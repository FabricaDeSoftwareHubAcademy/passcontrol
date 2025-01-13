<?php
    require_once '../db/banco.php';
    require_once '../db/usuario.php';
    $banco = new Banco();
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="p-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="login">
    
    
    
        <div class="GroupLineResponsive">
            <div class="lineResponsive">
                <span></span>
            </div>
            <div class="arrowResponsive">
                <div class="setasResponsive"><img src="../assets/img/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="../assets/img/setas.png" alt=""></div>
                <div class="setasResponsive"><img src="../assets/img/setas.png" alt=""></div>
            </div>
        </div>

        
    <div class="containerLogin">
        <div class="animBox">
            <div class="containerImagens">
                <img src="../assets/img/top.png" alt="" class="imagem imagemTop">
                <img src="../assets/img/mid.png" alt="" class="imagem imagemMid">
                <img src="../assets/img/bot.png" alt="" class="imagem imagemBot">
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
                <div class="setas"><img src="../assets/img/setas.png" alt=""></div>
                <div class="setas"><img src="../assets/img/setas.png" alt=""></div>
                <div class="setas"><img src="../assets/img/setas.png" alt=""></div>
            </div>
            <div class="line2">
                <span></span>
            </div>
        </div>
        <div class="card">
            <span class="title">Olá, Seja Bem-Vindo !!</span>

            <form action="#" method="POST" class="formBox">
                <div class="group user">
                    <label for="name">Usuário</label>
                    <input type="email" name="email" placeholder="Email">

                </div>
                <div class="group senha">
                    <label for="password">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" id="inpSenha">
                </div>

                <nav class="navEsqueciSenha">
                    <li><a href="recuperar-senha-email.html">Esqueci Minha Senha</a></li>
                </nav>
                <div class="btnEntrar">
                        <input type="submit" value="Entrar" class="btn">
                </div>
            </form>
            
        </div>
    </div>



    <div class="GroupLineResponsive groupRight">
        <div class="arrowResponsive ">
            <div class="setasResponsive setaRight"><img src="../assets/img/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="../assets/img/setas.png" alt=""></div>
            <div class="setasResponsive setaRight"><img src="../assets/img/setas.png" alt=""></div>
        </div>
        <div class="lineResponsive">
            <span></span>
        </div>
    </div>




<?php


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($email) && !empty($senha)){
            $banco->conectar("passcontrol", "localhost", "root", "");
            
            if($usuario->msgErro == ""){
                if($usuario->logar($email, $senha)){
                    header("location: atendimento.html");
                }else{
                    ?>
                        <script>
                            Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Email ou Senha incorreto.",
                            });
                        </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: <?php echo json_encode("Erro: " . $usuario->msgErro); ?>,
                    });
                </script>
            <?php
            }
        }else{
            ?>
            <script>
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Preencha todos os campos.",
                });
            </script>
        <?php
        }
    }


?>
</body>

</html>