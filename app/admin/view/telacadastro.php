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
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Dados Registrados/confirmacao_dados_registrados.css">

    <link rel="shortcut icon" type="imagex/png" href="https://public/img/Logo-Nota-Controlnt.ico">

    <!-- IMPORT DO JS -->
    <script src="../../../public/js/modal_salvar_cadastro.js"></script>

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
    <!-- <section class="grupo"> -->
        <!-- Codigo luan -->
            
        <div class="titulo_cds">
            <h1>Cadastrar Usuário<br></h1>
            <hr>   
        </div>

        <div class="quadrado">
                    <div class="nome">
                        <label class="labeledit" for="nome">Nome*</label>    
                        <input class="borda" type="text" name="nome" placeholder="Digite aqui o nome do usuário"> 
                    </div>
                    <div class="email">
                        <label class="labeledit" for="email">Email*</label>    
                        <input class="borda" type="text" name="email" placeholder="Digite aqui o Email do usuário">
                    </div>
                        <div class="cpf">    
                        <label class="labeledit" for="cpf">Cpf*</label>
                    <input class="borda" type="text" name="email" placeholder="Digite aqui o CPF do usuário">
                 </div>
            <div class="selecionar">
                <div class="perfild">   
                        <label class="labeledit" for="perfil">Perfil De Acesso</label>
                    <select class="selecao" name="plataforma" required>
                        <option class="pi" value="admin">Administrador</option>
                        <option class="pi" value="sup">Supervisor</option>
                        <option class="pi" value="atend">Atendente</option>
                        <option class="pi" value="auto-at">Terminal de Autoatendimento</option>
                    </select>
                </div>
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
    <script src="../../../public/js/todos.js" defer></script>
    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>
</body>
</html>

                                