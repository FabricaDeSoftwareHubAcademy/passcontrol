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
    <link rel="stylesheet" href="../../../public/css/atendimentocadastrados.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Edição Ponto Atendimento/edicao_ponto_atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Cadastro Ponto Atendimento/cadastro_ponto_atendimento.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Inativação Guichê/inativacao_guiche.css">

    <!-- IMPORT DO JS -->
     <script src="../../../public/js/modal-atendimentocadastrados.js"></script>
     <script src="../../../public/js/modal-inativacao-atendimentocadastrado.js"></script>
     <script src="../../../public/js/modal-cadastro-atendimento.js"></script>

     <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>
    
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
                            <div class="tabela-container">
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
                                    <td>4</td>
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
                                    <td>5</td>
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
                                    <td>6</td>
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
                                    <td>7</td>
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
                                    <td>8</td>
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
                                    <td>9</td>
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
                                    <td>10</td>
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
                                    <td>11</td>
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
                                    <td>12</td>
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
                                    <td>13</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.html-->
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
                                    <td>14</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.html-->
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
                                    <td>15</td>
                                    <td class="actions">
                                        <!-- Botão de edição -->
                                        <a href=""> <!--Tirei para implementar o modal: editar_pont_de_atendimento.html-->
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
                                    <td>16</td>
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
    <?php
    include "./monitor-modal.php";
    ?>
    <!-- <script src="../../../public/js/monitor-modal.js" defer></script> -->
</body>
</html>