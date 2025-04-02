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
  <link rel="stylesheet" href="../../../public/css/PontoAtendimentoCad.css">
  <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Dados_Pessoais/alterar_dados_pessoais.css">
  <link rel="stylesheet" href="../../../public/modais/Modal_Alterar_Senha/alterar_senha.css">

  <!-- JS -->
  <script src="../../../public/js/navegacao-menu-lateral.js" defer></script>
  <script src="../../../public/js/monitor-modal.js" defer></script>

  <link rel="shortcut icon" type="imagex/png" href="../../../public/img/Logo-Nota-Controlnt.ico">
</head>

<body class="control-body-navegacao">
  <?php
  include "./navegacao.php";
  ?>

  <section class="Area-Util-Projeto">
    <div id="PontoAtendimentoCad">
      <div class="topo-tela-PontoAtendimentoCad">
        <div class="campo-busca">
          <input id="buscar-Ponto-atendimento" type="text" placeholder="Buscar Registro">
        </div>
        <div class="sev">
          <p id="Ponto-atendimento">Ponto de Atendimento</p>
        </div>
        <div class="linha-divisoria-Ponto-atendimento"></div>
      </div>
      <div id="tela-branca-Ponto-atendimento">
        <div class="tabela-responsiva-Ponto-atendimento">
          <table class="tabela-Ponto-atendimento">
            <thead class="cabecaTabelaPonto-atendimento">
              <tr class="topo-tabela-servicos">
                <th class="cabecalho-tabela1">Tipo</th>
                <th class="cabecalho-tabela2">Identificador</th>
                <th class="cabecalho-tabela3">Editar</th>
                <th class="cabecalho-tabela1">Ativar/ Desativar</th>
              </tr>
            </thead>
            <tbody class="resto-tabela-Ponto-atendimento">
              <tr class="linha-tabela">
                <td>Guichê</td>
                <td>01</td>
                <td class="coluna-editar ">
                  <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a>
                </td>
                <td class="coluna-inativar">
                  <div class="toggle-btn ativo">
                    <div class="circulo"></div>
                  </div>
                </td>
              </tr>
              <tr class="linha-tabela">
                <td>Guichê</td>
                <td>02</td>
                <td class="coluna-editar ">
                  <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a>
                </td>
                <td class="coluna-inativar">
                  <div class="toggle-btn ativo">
                    <div class="circulo"></div>
                  </div>
                </td>
              </tr>
              <tr class="linha-tabela">
                <td>Guichê</td>
                <td>03</td>
                <td class="coluna-editar ">
                  <a class="colm-idit" href=""><img id="icone-editar" src="../../../public/img/icons/Group 2924.png" alt="Editar"></a>
                </td>
                <td class="coluna-inativar">
                  <div class="toggle-btn ativo">
                    <div class="circulo"></div>
                  </div>
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

  <?php
  include "./monitor-modal.php"
  ?>

  <script src="../../../public/js/ativar.js" defer></script>
  
</body>
</html>