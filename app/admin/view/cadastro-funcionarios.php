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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet"> -->

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../../public/css/conteudo.css">
    <link rel="stylesheet" href="../../../public/css/tabela.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
    
</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>
    
    <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
    <div class="area-info">
        <div class="header-area">
            <div class="titulo-area">
                <span>Usuários Cadastrados</span>
            </div>
            <div class="input-search">
                <input type="search" name="Buscar Atendente" placeholder="Buscar Atendente">
            </div>
        </div>
        <div class="linha-in">
            <span></span>
        </div>
        <div class="area-tabela">
            <table class="tabela">
                <tr>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Perfil</th>
                    <th>Serviços</th>
                    <th>Ações</th>
                </tr>
                <tr>
                    <td>Guilherme F. Machado</td>
                    <td>guilermegaymer@gmail.com</td>
                    <td>Administrador</td>
                    <td>Nota Fiscal</td>
                    <td class="editar"><a href=""><img src="../../../public/img/icons/Group 2924.png" alt=""></a><label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label></td>
                </tr>
                <tr>
                    <td>Joao Pedro Sampaio</td>
                    <td>joaozinhodelasedeles@gmail</td>
                    <td>Atendente</td>
                    <td>IPTU</td>
                    <td class="editar"><a href=""><img src="../../../public/img/Group 2924.png" alt=""></a><label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label></td>
                </tr>
                <tr>
                    <td>adsd </td>
                    <td>asdas </td>
                    <td>asda </td>
                    <td> asda</td>
                    <td class="editar"><a href=""><img src="../../../public/img/Group 2924.png" alt=""></a><label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label></td>
                </tr>
                <tr>
                    <td> ads</td>
                    <td>asd </td>
                    <td>asd </td>
                    <td>asd </td>
                    <td class="editar"><a href=""><img src="../../../public/img/Group 2924.png" alt=""></a><label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label></td>
                </tr>
            </table>
        </div>
        <div class="div-botao-info">
            <a href="../../../app/admin/view/telacadastro.php"><button class="add-func"  type="submit">Novo Funcionario</button></a>
        </div>
    </div>

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>
</body>
</html>