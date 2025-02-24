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
    <link rel="stylesheet" href="../../../public/css/monitor-modal.css">
    <link rel="stylesheet" href="../../../public/css/servicos.css">
    <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Serviços/estilo.css">

    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">

</head>
<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <!-- INICIO DA ÁREA ÚTIL DA PÁGINA -->
        <!-- INSIRA O CORPO DA SUA PÁGINA A PARTIR DESTE PONTO -->
        <div id="servico">        
              <div class="cabecalho">
                <h1 id="servicos-cadastrados">Serviços Cadastrados</h1>
                <div class="campo-busca">
                    <input id="buscar-servico" type="text" placeholder="Buscar Registro">
                  </div>
                <div class="linha-divisoria"></div>
            <div id="tela-branca"> 
              <div class="tabela-wrapper">
                <table class="tabela-servicos">
                  <thead>
                    <tr class="topo-tabela">
                      <th class="cabecalho-tabela1">Código do Serviço</th>
                      <th class="cabecalho-tabela2">Serviços</th>
                      <th class="cabecalho-tabela3">Editar</th>
                      <th class="cabecalho-tabela4">Ativar/Desativar</th>
                    </tr>
                  </thead>
                  <tbody class="separacao">
                    <tr class="linha-tabela">
                      <td>IP</td>
                      <td>Iluminação Pública</td>
                      <td class="coluna-editar ">
                        <a href="editar"><img id="icone-editar" src="../../../public/img/icons/editar.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>IPTU</td>
                      <td>IPTU</td>
                      <td class="coluna-editar ">
                        <a href="editar"><img id="icone-editar" src="../../../public/img/icons/editar.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>LIC</td>
                      <td>Licenças</td>
                      <td class="coluna-editar ">
                        <a href="editar"><img id="icone-editar" src="../../../public/img/icons/editar.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>OUVID</td>
                      <td>Ouvidoria</td>
                      <td class="coluna-editar ">
                        <a href="editar"><img id="icone-editar" src="../../../public/img/icons/editar.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a href="editar"><img id="icone-editar" src="../../../public/img/icons/editar.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>       
                  </tbody>
                </table>
              </div>
            </div>
            <div class="button-container1"><button class="botaoCadastrar">Cadastrar</button></div>
          </div>
        </div>
        
    </section> 

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php"
    ?>
    
    <script src="../../../public/js/ativar.js" defer></script>
</body>
</html>