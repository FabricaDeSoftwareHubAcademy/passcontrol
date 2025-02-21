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
    <link rel="stylesheet" href="../../../public/css/edit_cadastro.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Dados Registrados/estilo.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

    <!-- IMPORT DO JS -->
    <script src="../../../public/js/modal_salvar_cadastro.js"></script>

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
    <!-- <section class="grupo"> -->
        <!-- Codigo luan -->
            
        <div class="titulo">
            <h1 class="cadastro_title">Cadastrar Usuário</h1><br>
            <hr>   
        </div>

        <div class="quadrado">
            <div class="container-flex">
                <section class="forme">
                        <div class="nome">
                            <label class="labeledit" for="nome">Nome*</label>    
                            <input class="borda" type="text" name="nome" placeholder="Digite aqui o nome do usuário"> 
                        </div>
                        <div class="email">
                            <label class="labeledit" for="email">Email*</label>    
                            <input class="borda" type="text" name="email" placeholder="Digite aqui o Email do usuário">
                        </div>
                        <div class="cpf">    
                            <label class="labeledit" for="cpf">CPF</label>
                            <input class="borda" type="text" name="email" placeholder="Digite aqui o CPF do usuário">
                        </div>
                </section>
            </div>

            <div class="selecionar">
                <div class="perfild">    
                    <label class="labeledit" for="perfil">Perfil De Acesso</label>

                    <select class="selecao" name="plataforma" required="required">
                        <option class="pi" value="admin">Administrador</option>
                        <option class="pi" value="sup">Supervisor</option>
                        <option class="pi" value="atend">Atendente</option>
                        <option class="pi" value="auto-at">Terminal de Autoatendimento</option>
                    </select>
                </div>    
                
                <title class="servico">Seviços</title> 
                    <div class="checkbox-container">
                        <div class="column-1"> 
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">Conselho Muncipal</span> 
                            </label> 
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">Fiscalização</span> 
                            </label>
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">Iluminação Pública</span>
                            </label>  
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">IPTU</span> 
                            </label>  
                        </div> 
                        <div class="column-2"> 
                            <div class="caixa"></div> 
                            <label class="customizado">      
                                <input type="checkbox" class="item" id="checkbox">
                                <span class="teste">Licenças</span>
                            </label> 
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">Ouvidoria</span> 
                            </label> 
                            <label class="customizado"> 
                                <input type="checkbox" class="item" id="checkbox"> 
                                <span class="teste">Poda De Àrvores</span> 
                            </label>
                            <label class="customizado"> 
                                <input type="checkbox" id="select-all"> 
                                <span class="teste" for="select-all">Selecionar Todos</span> 
                            </label>   
                        </div>
                    </div>
            </div>
        </div>
        <div class="form-actions2">
            <button type="button" class="botao_volto" onclick="window.location.href='javascript:history.back()';">Voltar</button>
            <button type="submit" class="botao_salvo open" id="save_sucess">Salvar</button>
        </div>
        <main-salvar-cad></main-salvar-cad>
    </section>
    
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
    <script src="../../../public/js/todos.js" defer></script>
</body>
</html>

                                