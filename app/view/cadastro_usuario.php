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
  <link rel="stylesheet" href="../../public/css/navegacao.css">
  <link rel="stylesheet" href="../../public/css/monitor_modal.css">
  <link rel="stylesheet" href="../../public/css/cadastro_usuario.css">
  <link rel="stylesheet" href="../../public/css/modal_alterar_dados_pessoais.css">
  <link rel="stylesheet" href="../../public/css/modal_alterar_senha.css">
  <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados_registrados.css">
  <link rel="stylesheet" href="../../public/css/modal_confirmacao_dados.css">
  <link rel="stylesheet" href="../../public/css/modal_enviando_email.css">
  <link rel="stylesheet" href="../../public/css/modal_aviso_erro.css">

  <!-- JS -->
  <script src="../../public/js/navegacao_menu_lateral.js" defer></script>
  <script src="../../public/js/monitor_modal.js" defer></script>
  
  <script src="../../public/js/dropdown_select.js" defer></script>
  <script src="../js/usuario_cadastrar.js" defer></script>
  <script src="../js/validar_cpf.js" defer></script>

  <!-- LOGO -->
  <link rel="shortcut icon" type="imagex/png" href="../../public/img/icons/logo_control.svg">
</head>

<body class="control-body-navegacao">
  <?php
  include_once "./navegacao.php";
  include_once "../actions/usuario_listar.php";
  ?>

  <section class="Area-Util-Projeto cadastro_usuario">
    <div class="container_titulo">
      <span class="titulo_pagina">Cadastrar Usuário</span>
    </div>
    <div class="container_linha">
      <span class="linha">
    </div>

    <form class="container_form" method="POST" id="dados_cad" onkeydown="return event.key != 'Enter';">
      <div class="container_input nome">
        <label class="labeledit" for="nome">Nome*</label>
        <input class="input_dados" type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite aqui o nome do usuário" required>
        <span class="erro" id="erro_nome"></span>
      </div>

      <div class="container_input email">
        <label class="labeledit" for="email">Email*</label>
        <input class="input_dados" type="text" name="email_usuario" id="email_usuario" placeholder="Digite aqui o Email do usuário" required>
        <span class="erro" id="erro_email"></span>
      </div>

      <div class="container_input cpf">
        <label class="labeledit" for="cpf">CPF*</label>
        <input class="input_dados" type="text" name="cpf_usuario" id="cpf_usuario" maxlength="14" placeholder="000.000.000-00" required>
        <span class="erro" id="erro_cpf"></span>
      </div>

      <div class="container_input perfil">
        <label class="labeledit" for="perfil">Perfil De Acesso*</label>
        <select class="input_dados selecao_perfil" name="id_perfil_usuario" required>
          <option class="opcao" value="" disabled selected>Selecione</option>
          <?php
          // // LISTA PERFIS DE USUARIO
          foreach ($perfis as $perfil) {
          ?>
            <option class="opcao" value="<?= $perfil["id_perfil_usuario"] ?>"><?= $perfil["nome_perfil_usuario"] ?></option>
          <?php
          };
          ?>
        </select>
        <span class="erro" id="erro_perfil"></span>
      </div>

      <div class="container_input servico" id="select_servico_usuario">
        <label class="labeledit" for="Servico">Servicos Atendidos</label>
        <div class="container_dropdown">
          <div class="input_dados selecao_servico"> <!-- onclick="toggleDropdown()" -->
            <span>Selecione opções</span>
            <span class="seta_dropdown">></span>
          </div>
          <div class="input_dados dropdown_select">
            <label class="label_option_servico">
              <input checked type="checkbox" id="selectAll"> <!-- onchange="toggleAll(this)" -->
              Selecionar todos
            </label>
            <span class="linha_select"></span>
            <?php
              // // LISTA SERVICOS DISPONIVEIS
              foreach ($servicos as $servico):
            ?>
            <label class="label_option_servico">
              <input checked type="checkbox" class="option_servico" name="id_servico[]" value="<?= $servico->id_servico ?>">
              <?= $servico->nome_servico . " - " . $servico->codigo_servico ?>
            </label>
            <?php
              endforeach;
            ?>
          </div>
        </div>
      </div>

    </form>
    <div class="container_botao_form">
      <button class="botao_volto" form="dados_cad" type="reset" onclick="window.location.href='./menuadm_usuario.php';">Voltar</button>
      <button class="botao_salvo cadastrar_usuario" name="cadastrar" id="save_sucess">Salvar</button>
    </div>

  </section>
  <?php
  // include_once "./monitor_modal.php";
  include_once "../../public/modais/modal_enviando_email.php";
  include_once "../../public/modais/modal_confirmacao_dados_registrados.php";
  include_once "../../public/modais/modal_confirmacao_dados.php";
  include_once "../../public/modais/modal_aviso_erro.php";
  ?>
</body>

</html>