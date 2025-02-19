<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TROCA TÍTULO QUANDO FOR UTILIZAR -->
    <title>PassControl</title> 
    

    <!-- IMPORT DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/atendimentocadastrados.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Edição Ponto Atendimento/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Cadastro Ponto Atendimento/estilo.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Inativação Guichê/estilo.css">

    <!-- IMPORT DO JS -->
     <script src="../../../public/js/modal-atendimentocadastrados.js"></script>
     <script src="../../../public/js/modal-inativacao-atendimentocadastrado.js"></script>
     <script src="../../../public/js/modal-cadastro-atendimento.js"></script>

     <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <header class="cabeca-navegacao-control">
        <nav class="nav-cabeca">
            <div class="logo-control">
                <img src="../../../public/img/icons/logo control.svg" alt="LOGOCONTROL" id="img-logo">
            </div>
            <H3>PassControl</H3>
            <div class="usu">                
                <!-- INFO DO USUARIO -->
                <div class="menu-usuario">
                    <a class="usu">Nome do Usuário</a>
                    <nav class="usu-detalhes"> 
                        <img src="../../../public/img/icons/image 33.svg" alt="">
                        <ul class="texto-usu">
                            <li class="nome-usu">Nome do Usuário</li>
                            <li class="email-usu">funcionario123@fun.br</li>
                            <li><a href="../../../app/admin/view/adm-logado.php">Editar Informações</a></li>
                            <li><a class="sair" href="../../../index.php">Sair</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
        <div class="dark-area"></div>
    </header>

    <!-- MENU LATERAL -->
    <button class="botao-menu-mobile"> <!-- Botão ainda inativo -->
        <img class="icone-menu-lateral" src="../../../public/img/icons/DropDownIcon.svg" alt="MENU">
    </button>

    <div class="area-lateral-navegacao">
        <nav class="menu-lateral-navegacao">

            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" href="../../../app/admin/view/atendimento.php">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/atend.svg" alt="ICONE ATENDIMENTO">
                    <div class="texto-bott">Atendimento</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" id="openModalBtn">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/monitor.svg" alt="ICONE MONITOR">
                    <div class="texto-bott">Monitor</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao" href="">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/nota.svg" alt="ICONE RELATORIOS">
                    <div class="texto-bott">Relatórios</div>
                </a>
            </div>
            <div class="botao-navegacao">
                <a class="botao-lateal-navegacao ativo-estacionario" href="../../../app/admin/view/menuadm_usuario.php">
                    <img class="icone-menu-lateral" src="../../../public/img/icons/gestao.svg" alt="ICONE GESTAO">
                    <div class="texto-bott">Gestão</div>
                </a>
            </div>
        </nav>
        <div class="sair-navegacao">
            <a class="botao-lateal-navegacao" href="../../../index.php">
                <img class="icone-menu-lateral" src="../../../public/img/icons/sair.svg" alt="ICONE SAIR">
                <div class="texto-bott">Sair</div>
            </a>
        </div>
    </div>
    
    <section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->
         
            <!-- <main> -->
                  <!-- titulo -->
                <div>
                  <h2 class="titulo">Pontos de Atendimento Cadastrados</h2>
                  <!-- Barra de pesquisa -->
                    <div class="barra-pesquisa">
                        <input type="text" class="input-pesquisa" placeholder="Buscar Registro">
                    </div>
                </div>
        
                <!-- Linha divisória -->
                <div class="linha"></div>
                
                <div class="cubo-branco">
                    <!-- Tabela de pontos de atendimento -->
                    <div class="tabela">
                        <section class="menu-tabela">
                            <table class="tabela-3x3">
                                <tr>
                                    <th>Nome do Ponto de Atendimento</th>
                                    <th>Identificador</th>
                                    <th>Ações</th>
                                    <th>Ativar/Desativar</th>
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active" id="button-action">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>2</td>
                                    <td class="actions">
                                            <!-- Botão de edição -->
                                            <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                                <img src="../../../public/img/icons/editar.png" alt="Editar">
                                            </a>
                                        </td> 
                                        <td>
                                            <!-- Botão de ativar/desativar -->
                                            <div class="toggle-btn active">
                                                <div class="circle"></div>
                                            </div>
                                        </td> 
                                    <tr>
                                        <td>Guichê</td>
                                        <td>3</td>
                                        <td class="actions">
                                            <!-- Botão de edição -->
                                            <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                                <img src="../../../public/img/icons/editar.png" alt="Editar">
                                            </a>
                                        </td> 
                                        <td>
                                            <!-- Botão de ativar/desativar -->
                                            <div class="toggle-btn active">
                                                <div class="circle"></div>
                                            </div>
                                        </td> 
                                    </tr>
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>

                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                  <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Guichê</td>
                                    <td>1</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.php-->
                                            <img src="../../../public/img/icons/editar.png" alt="Editar">
                                        </a>
                                    </td> 
                                    <td>
                                        <!-- Botão de ativar/desativar -->
                                        <div class="toggle-btn active">
                                            <div class="circle"></div>
                                        </div>
                                    </td> 
                                </tr>
                                
                            </table>

                            <!-- Botão para adicionar novo guichê -->
                            <a href="#">
                                <button class="styled-button" id="btn-cadastro">Novo Guichê</button>
                            </a>
                        </section>
                    </div>
                </div>
            
                <script>
                    // Script para alternar o estado dos botões toggle
                    const toggleButtons = document.querySelectorAll('.toggle-btn');
                    toggleButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            button.classList.toggle('active');
                        });
                    });
                </script>
            <!-- </main> -->
    </section>
    <main-atendimento-cadastrado></main-atendimento-cadastrado>
    <main-cadastro-atendimento></main-cadastro-atendimento>
    <main-inativacao_atendimento-cadastrado></main-inativacao_atendimento-cadastrado>
    
    <!--MONITOR MODAL-->
    <div class="area-monitor-modal">
        <div class="area-modal" id="modal">
            <div class="modal-fundo">
                <div class="fundo-lateral">
                    <h1>Últimas Chamadas</h1>
                    <div class="area-das-senhas">
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                                <div class="senha">
                                    <h3>SENHA</h3>
                                    <h4>CM 001</h4>
                                </div>
                                <div class="guiche">
                                    <h5>GUICHE</h5>
                                    <h6>1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                                <div class="senha">
                                    <h3>SENHA</h3>
                                    <h4>CM 001</h4>
                                </div>
                                <div class="guiche">
                                    <h5>GUICHE</h5>
                                    <h6>1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="caixa-das-senhas">
                            <h2>NOME DA PESSOA</h2>
                            <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA</h3>
                                <h4>CM 001</h4>
                            </div>
                            <div class="guiche">
                                <h5>GUICHE</h5>
                                <h6>1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="caixa-das-senhas">
                        <h2>NOME DA PESSOA</h2>
                        <div class="conjunto-senhas">
                            <div class="senha">
                                <h3>SENHA</h3>
                                <h4>CM 001</h4>
                            </div>
                            <div class="guiche">
                                <h5>GUICHE</h5>
                                <h6>1</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fundo-principal">
                <div class="area-botao-fechar-monitor">
                    <div class="botao-fechar-monitor">
                        <h2>X</h2> 
                    </div>
                </div>
            <div class="fundo-senha-principal">
                <div class="caixa-senha-principal">
                    <div class="conjunto-senha-principal">
                        <div class="nome-pessoa">
                            <h1>NOME DA PESSOA</h1>
                        </div>
                        <div class="infos-senha-principal">
                            <h2>SERVIÇO:<span>IPTU</span></h2>
                            <h2>SENHA:<span>CM 001</span></h2>
                            <h2>GUICHÊ:<span>1</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../public/js/monitor-modal.js" defer></script>
</body>
</html>