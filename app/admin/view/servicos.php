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
    <link rel="stylesheet" href="../../../public/css/servicos.css">
    <!-- <link rel="stylesheet" href="../../../public/modais/Modal Inativação Serviço/inativacao_servico.css"> -->
    <!-- <link rel="stylesheet" href="../../../public/modais/Modal Confirmação dos Serviços/estilo.css"> -->
    
    <!-- JS -->
    <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
    <script src="../../../public/js/monitor-modal.js" defer></script>
    <script src="../../../public/js/ativar.js" defer></script>
    <!-- <script src="../../../public/js/modal-inativacao-servicos.js" defer></script> -->
    <!-- <script src="../../../public/js/modal-edicao-servicos.js" defer></script> -->
    
    <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
    <?php
    include "./navegacao.php";
    ?>

    <section class="Area-Util-Projeto">
        <div id="servico">        
                <div class="topo-tela-servico">
                    <div class="campo-busca">
                        <input id="buscar-servico" type="text" placeholder="Buscar Registro">
                    </div>
                    <div class="sev"><p id="servicos-cadastrados">Serviços Cadastrados</p></div>
                    <div class="linha-divisoria-servico"></div>
                </div>
            <div id="tela-branca-servico"> 
              <div class="tabela-responsiva-servico">
                <table class="tabela-servicos">
                  <thead class="cabecaTabelaServicos">
                    <tr class="topo-tabela-servicos">
                      <th class="cabecalho-tabela1">Código do Serviço</th>
                      <th class="cabecalho-tabela2">Serviços</th>
                      <th class="cabecalho-tabela3">Editar</th>
                      <th class="cabecalho-tabela1">Ativar/ Desativar</th>
                    </tr>
                  </thead>
                  <tbody class="resto-tabela-servicos">
                    <tr class="linha-tabela">
                      <td>IP</td>
                      <td>Iluminação Pública</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo" id="btnteste"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>IPTU</td>
                      <td>IPTU</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                        <td>IPTU</td>
                        <td>IPTU</td>
                        <td class="coluna-editar ">
                          <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                          <td class="coluna-inativar">
                              <div class="toggle-btn ativo"><div class="circulo"></div></div>
                          </td>
                      </tr>
                      <tr class="linha-tabela">
                        <td>IPTU</td>
                        <td>IPTU</td>
                        <td class="coluna-editar ">
                          <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                          <td class="coluna-inativar">
                              <div class="toggle-btn ativo"><div class="circulo"></div></div>
                          </td>
                      </tr>
                      <tr class="linha-tabela">
                        <td>IPTU</td>
                        <td>IPTU</td>
                        <td class="coluna-editar ">
                          <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                          <td class="coluna-inativar">
                              <div class="toggle-btn ativo"><div class="circulo"></div></div>
                          </td>
                      </tr>
                      <tr class="linha-tabela">
                        <td>IPTU</td>
                        <td>IPTU</td>
                        <td class="coluna-editar ">
                          <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                          <td class="coluna-inativar">
                              <div class="toggle-btn ativo"><div class="circulo"></div></div>
                          </td>
                      </tr>

                    <tr class="linha-tabela">
                      <td>LIC</td>
                      <td>Licenças</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>OUVID</td>
                      <td>Ouvidoria</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr>
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    <tr class="linha-tabela">
                      <td>CM</td>
                      <td>Conselho Municipal</td>
                      <td class="coluna-editar ">
                        <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                        <td class="coluna-inativar">
                            <div class="toggle-btn ativo"><div class="circulo"></div></div>
                        </td>
                    </tr> 
                    
                    <tr class="linha-tabela">
                        <td>CM</td>
                        <td>Conselho Municipal</td>
                        <td class="coluna-editar ">
                          <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a></td>
                          <td class="coluna-inativar">
                              <div class="toggle-btn ativo"><div class="circulo"></div></div>
                          </td>
                      </tr>       
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
    <main-inativacao_servico></main-inativacao_servico>
    <!-- <main-edicao-servico></main-edicao-servico> -->

    <!--MONITOR MODAL-->
    <?php
    include "./monitor-modal.php";
    ?>

</body>
</html>