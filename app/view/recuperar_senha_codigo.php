<?php
session_start();

if (isset($_POST['validar'])) {
    // Captura os 5 dígitos do código enviado no formulário
    $codigo_informado = $_POST['codigo1'] . $_POST['codigo2'] . $_POST['codigo3'] . $_POST['codigo4'] . $_POST['codigo5'];

    // Verifica se o código informado corresponde ao código armazenado na sessão
    if (empty($codigo_informado)) {
        echo "<p style='color: red; text-align: center;'>Por favor, insira o código.</p>";
    } elseif ($codigo_informado == $_SESSION['codigo_recuperacao']) {
        $id_user = $_SESSION['id_usuario'];
        // Código correto, direciona para a página de recuperação de senha
        header('Location: ./recuperar_senha_nova_senha.php?id_user=' . $id_user);
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Código inválido. Tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PassControl</title>

    <!-- <link rel="stylesheet" href="../../public/css/root.css"> -->
    <link rel="stylesheet" href="../../public/css/forms.css">
    <link rel="shortcut icon" href="../../public/img/favicon.ico" type="image/x-icon">

    <script src="../../public/js/recuperar_senha_codigo.js" defer></script>
</head>
<body class="body_login background_image">
    <main class="container_login">
        <div class="card_left_login">
            <div class="container_animation">
                <img src="../../public/img/logo_animation/animation_logo_top.png" alt="imagem da animação topo" class="image_animation image_animation_top">
                <img src="../../public/img/logo_animation/animation_logo_mid.png" alt="imagem da animação meio" class="image_animation image_animation_mid">
                <img src="../../public/img/logo_animation/animation_logo_bot.png" alt="imagem da animação baixo" class="image_animation image_animation_bot">
            </div>
            <h1 class="title-login">PASS CONTROL</h1>
        </div>

        <form id="form_codigo" method="POST" class="form-login">
            <div class="input_group-login">
                <label class="label_recuperar_senha" for="">Recuperar Senha</label>
                <div class="container_input_codigo">
                    <input type="text" class="input-login" name="codigo1" id="input_1" maxlength="1" onkeyup="mudaFoco(this, 1, input_2)">
                    <input type="text" class="input-login" name="codigo2" id="input_2" maxlength="1" onkeyup="mudaFoco(this, 1, input_3)">
                    <input type="text" class="input-login" name="codigo3" id="input_3" maxlength="1" onkeyup="mudaFoco(this, 1, input_4)">
                    <input type="text" class="input-login" name="codigo4" id="input_4" maxlength="1" onkeyup="mudaFoco(this, 1, input_5)">
                    <input type="text" class="input-login" name="codigo5" id="input_5" maxlength="1" onkeyup="mudaFoco(this, 1, null)">
                </div>
            </div>

            <p id="codigo_msg" style="color: red; text-align: left; margin-top: 10px; display: none; font-size: 0.9rem;"></p>

            <p class="text_recuperar_senha">Insira o código recebido no e-mail.</p>

            <div class="container_button-login">
                <button type="submit" id="btn_enviar" name="validar" class="button-login">Enviar</button>
            </div>
        </form>
    </main>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.querySelector("#form_codigo");
        const btn = document.querySelector("#btn_enviar");
        const msg = document.querySelector("#codigo_msg");
        const inputs = [
            document.querySelector("#input_1"),
            document.querySelector("#input_2"),
            document.querySelector("#input_3"),
            document.querySelector("#input_4"),
            document.querySelector("#input_5")
        ];

        form.addEventListener("submit", (event) => {
            let camposPreenchidos = inputs.every(input => input.value.trim() !== "");

            if (!camposPreenchidos) {
                event.preventDefault();
                msg.textContent = "Por favor, preencha todos os campos.";
                msg.style.display = "block";
            }
        });

        inputs.forEach(input => {
            input.addEventListener("input", () => {
                msg.style.display = "none";
            });
        });
    });

    // Função auxiliar (caso você esteja usando isso nos inputs)
    function mudaFoco(atual, maxLength, proximoInput) {
        if (atual.value.length >= maxLength && proximoInput) {
            proximoInput.focus();
        }
    }
    </script>
</body>
</html>