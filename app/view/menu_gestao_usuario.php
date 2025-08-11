<?php
require_once './navegacao.php';
?>

<body class="control-body-navegacao">
    <section class="Area-Util-Projeto">
        <?php
        include_once "./submenu_gestao.php";
        ?>

        <!-- área dos cards de nevegação  -->
        <main class="area-cards">
            <div class="container_menu">
                <div class="wrapper">
                    <a href="./listar_usuarios.php">
                        <div class="banner-img">
                            <!-- <img src="../../../public/img/img-menu/usuariocadastrado.png" alt=""> -->
                            <img src="../../public/img/Menus/3.png" alt="">
                        </div>
                    </a>
                    <!-- <h3 class="titulo-card">Usuários</h3> -->
                    <!-- <p>Usuários Cadastrados.</p> -->
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='./listar_usuarios.php';">Listar Usuários</button>
                </div>
            </div>
            <div class="container_menu">
                <div class="wrapper">
                    <a href="./cadastro_usuario.php">
                        <div class="banner-img">
                            <!-- <img src="../../../public/img/img-menu/cadastrodeusuario.png" alt=""> -->
                            <img src="../../public/img/Menus/2.png" alt="">
                        </div>
                    </a>
                    <!-- <h3 class="titulo-produto">Cadastro</h3> -->
                    <!-- <p>Cadastro de Usuário</p> -->
                </div>
                <div class="button-wrapper">
                    <button class="btn outline" onclick="window.location.href='./cadastro_usuario.php';">Cadastrar Usuário</button>
                </div>
            </div>
            </div>
        </main>
        </div>
    </section>
    

    <?php
    include "./monitor_modal.php";
    ?>

    <script>
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }
    </script>

</body>
</html>