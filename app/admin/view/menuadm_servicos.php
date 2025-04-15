<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PassControl</title> 
    
    <!-- FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/style_eli.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">
    <link rel="stylesheet" href="../../../public/modais/ModalCadastrodosServicos/cadastro_servicos_final.css">
    <link rel="stylesheet" href="../../../public/modais/Modal_Cadastro_Ponto_Atendimento/cadastro_ponto_atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/ModalConfirmaDados/estilo.css">
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <!-- <script src="../../../public/js/modal_cadastro_guiche_adm.js" defer></script> -->

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    include "../../../public/modais/ModalCadastrodosServicos/cadastro_servicos.php";
    ?>
    <section class="Area-Util-Projeto">
        <!-- navmenu -->
        <div class="menu-container">
            <div class="menu">
                <button class="hamburger" onclick="toggleMenu()">☰</button>
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php" class="active">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
            
            <div class="menu-mobile" id="mobileMenu">
                <a href="./menuadm_usuario.php">Usuários</a>
                <a href="./menuadm_servicos.php" class="active">Serviços</a>
                <a href="./menuadm_autoatendimento.php">Autoatendimento</a>
                <a href="./menusup_usuario.php">SUP</a>
            </div>
        </div>

            <!-- área da descrição da página de navegação  -->
            <div class="descricao">
                <!-- <h2>Menu de Gestão</h2> -->
                <!-- <hr> -->
                <!-- <p>Área de Gestão do Admimistrador.</p> -->
            </div>
            <!-- área dos cards de nevegação  -->
            <main class="area-cards">
                <div class="container_menu">
                    <div class="wrapper">
                        <a href="PontoAtendimentoCad.php">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/pontodeatendimento.png" alt="">
                        </div>
                        </a>
                        <!-- <h3 class="titulo-card">Atendimento</h3> -->
                        <!-- <p>Pontos de Atendimento.</p> -->

                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='PontoAtendimentoCad.php';">Listar Ponto de Atendimento</button>
                    </div>
                </div>

                <div class="container_menu">
                    <div class="wrapper">
                        <a href="" id="img_cadastrar_adm">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/listar-giche.png" alt="">
                        </div>
                        </a>
                        <!-- <h3 class="titulo-card">Atendimento</h3> -->
                        <!-- <p>Pontos de Atendimento.</p> -->

                    </div>
                    <div class="button-wrapper">
                        <button id="btn_cadastrar_adm" class="btn outline">Cadastrar Ponto de Atendimento</button>
                    </div>
                </div>
                
                <div class="container_menu">
                    <div class="wrapper">
                        <a href="servicos.php">
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/listar-sevico.png" alt="">
                        </div>
                        </a>
                        <!-- <h3 class="titulo-produto">Serviços</h3> -->
                        <!-- <p>Gestão dos serviços</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline" onclick="window.location.href='servicos.php';">Listar de Serviços</button>
                    </div>
                </div>    

                <div class="container_menu" id="abrirModalCadastro">
                    <div class="wrapper" >
                        <div class="banner-img">
                            <img src="../../../public/img/img-menu/serviços.png" alt="">
                        </div>
                        <!-- <h3 class="titulo-produto">Serviços</h3> -->
                        <!-- <p>Gestão dos serviços</p> -->
                    </div>
                    <div class="button-wrapper">
                        <button class="btn outline">Cadastrar Serviços</button>
                    </div>
                </div> 
            </main>
        </div>
    </section>
    
    <?php
    include "./monitor-modal.php";
    ?>


    <!-- INCLUINDO O MODAL DE CADASTRO DE PONTO DE ATENDIMENTO - GUICHES!!!!!!  -->
    <div class="fundo-container-cad-ponto-atendimento">
        <section class="modal-ponto-atendimento">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo-ponto-atendimento">
            <h1 class="titulo-ponto-atendimento">Cadastrar Ponto de Atendimento</h1>

            <hr class="linha-horizontal-ponto-atendimento">

            <form id="formulario" method="POST">
            
                <div class="inf-modal-ponto-atendimento">
                    <div class="container-ponto-atendimento">
                        <label class="label-ponto-atendimento"><b>Nome do Ponto de Atendimento</b></label>
                        <input type="text" id="nome_guiche" name="nome_guiche" class="input-text-ponto-atendimento" placeholder="Ex: Guichê, Baia, IPTU...">
                    </div>
                </div>
                <div class="servico-ponto-atendimento">
                    <label class="label-ponto-atendimento"><b>Número / Letra</b></label>
                    <input type="text" id="num_guiche" name="num_guiche" class="input-text-ponto-atendimento" placeholder="Ex: 01, 02...">
                </div>
                <div class="button-group-ponto-atendimento">
                    <button class="botao-modal-ponto-atendimento cancel_CadPontoAtend">Voltar</button>
                    <button type="submit" class="botao-modal-ponto-atendimento save_CadPontoAtend">Salvar</button>
                </div>

            </form>
        </section>
    </div>


    <!-- confirmacao -->
    <div id="confirma"  class="modal-confirma-container">
        <section class="modal">
            <img src="../../../public/img/img-modais/Logo Nota Controlnt.png" alt="Logo Nota Control" class="logo">
            <h1 class="modal-title">Confirmação</h1>
            <hr class="modal-divider">
            <p class="modal-message"><b>Deseja confirmar o cadastro?</b></p>
            <div class="button-group">
                <button id="btnOk"class="botao-modal Okay">Ok</button>
            </div>
        </section>
    </div >


    
    <script>

        let btn_cadastrar_guiche = document.getElementById("btn_cadastrar_adm");
        const apareceMod = document.getElementById("confirma");

        const modalContainer_CadPontoAtend = document.querySelector(".fundo-container-cad-ponto-atendimento");
        const buttonFechar_CadPontoAtend = document.querySelector(".close_CadPontoAtend");
        const buttonCancelar_CadPontoAtend = document.querySelector(".cancel_CadPontoAtend");
        const buttonSalvar_CadPontoAtend = document.querySelector(".save_CadPontoAtend");


        btn_cadastrar_guiche.addEventListener("click", () => {
    
            modalContainer_CadPontoAtend.classList.add("show");
        });

        buttonCancelar_CadPontoAtend.addEventListener("click", () => {
            modalContainer_CadPontoAtend.classList.remove("show");
        });

        buttonSalvar_CadPontoAtend.addEventListener("click", function () {
            event.preventDefault()
            myform = document.getElementById("formulario");
            const formData = new FormData(myform);
                   
            modalContainer_CadPontoAtend.classList.remove("show");
            apareceMod.classList.add("show");

            btn_confirmar = document.getElementById("btnOk");

            btn_confirmar.addEventListener("click", async function () {
              
                let dados2_php = await fetch("../../CLASSE/cadastrar_guiche.php",{
                method:'POST',
                body:formData
                 })

                let response = await dados2_php.json();

            //console.log(response);
            if(response.status == 'ok'){
                window.location.href = "./PontoAtendimentoCad.php";
            }
            });


        
        });

 
        function toggleMenu() {
            document.getElementById("mobileMenu").classList.toggle("active");
        }


    </script>
</body>
</html>