<?php
require'../../../app/CLASSE/guiche.php';

$guiche = new Guiche();
$guiches = $guiche->buscar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PassControl</title> 

    <!-- IMPORT DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <!-- IMPORT DO CSS -->
    <link rel="stylesheet" href="../../../public/css/navegacao.css">
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/PontoAtendimentoCad.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Serviços/estilo.css">

   <!-- IMPORT DO JS -->
   <!-- <script src="../../../public/js/modal-atendimentocadastrados.js"></script>
     <script src="../../../public/js/modal-inativacao-atendimentocadastrado.js"></script>
     <script src="../../../public/js/modal-cadastro-atendimento.js"></script> -->

     <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

<section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->
        <div id="PontoAtendimentoCad">        
                <div class="topo-tela-PontoAtendimentoCad">
                    <div class="campo-busca">
                        <input id="buscar-Ponto-atendimento" type="text" placeholder="Buscar Registro">
                    </div>
                    <div class="sev"><p id="Ponto-atendimento">Ponto de Atendimento</p></div>
                    <div class="linha-divisoria-Ponto-atendimento"></div>
                </div>
                <div id="tela-branca-Ponto-atendimento"> 
              <div class="tabela-responsiva-Ponto-atendimento">
                <table id="table table-striped" class="tabela-Ponto-atendimento">
                  <thead class="cabecaTabelaPonto-atendimento">
                    <tr class="topo-tabela-servicos">
                      <th scope="col" class="cabecalho-tabela1">Tipo</th>
                      <th scope="col" class="cabecalho-tabela2">Identificador</th>
                      <th scope="col" class="cabecalho-tabela3">Editar</th>
                      <th scope="col" class="cabecalho-tabela1">Desativar/Ativar</th>
                    </tr>
                  </thead>
                  <tbody class="resto-tabela-Ponto-atendimento">


                  <?php
                        foreach($guiches as $guiche) {
                            $estadoAtivo = ($guiche->ativo == 'ATIVO') ? 'active' : '';
                            echo '
                            <tr>
                            <td>'.$guiche->nome_guiche.'</td>
                            <td>'.$guiche->num_guiche.'</td>
                            <td>
                              <a href=" ../../../editar_guiche.php?id_guiche='.$guiche->id_guiche.'">
                                <img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar">
                              </a>
                            </td>
                            <td>
                              <a href="../../../inativar_guiche.php?id_guiche='.$guiche->id_guiche.'">
                                <div class="toggle-btn '.$estadoAtivo.'">
                                  <div class="circulo"></div>
                                </div>
                              </a>
                            </td>
                          </tr>
                          
                            ';
                        }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="botoesVoltar-Cadastrar">
                <button type="button" class="botao-voltar" onclick="window.location.href='menuadm_servicos.php';">Voltar</button>
                <button type="submit" class="botao-cadastro">Cadastrar</button>
            </div>
        </div>
        
    </section>
    <!-- <main-atendimento-cadastrado></main-atendimento-cadastrado>
    <main-cadastro-atendimento></main-cadastro-atendimento>
    <main-inativacao_atendimento-cadastrado></main-inativacao_atendimento-cadastrado> -->
    
    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php"
    ?>
    
    <script src="../../../public/js/ativar.js" defer></script>
</body>
</html>