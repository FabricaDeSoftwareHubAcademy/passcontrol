<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Teste Modal</title>
  <link rel="stylesheet" href="testeprimeiroacesso/modal_primeiroacesso_alterarsenha.css">
  <style>
    .modal {
      background: rgba(0, 0, 0, 0.5);
      width: 100vw;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      display: none;
      align-items: center;
      justify-content: center;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.2s ease;
      z-index: 10;
    }

    .modal.active {
      display: flex;
      opacity: 1;
      pointer-events: auto;
    }

    .modal-content {
      background-color: #e0e0e0;
      padding: 40px;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="modal active" id="modal-primeiroacesso">
  <div class="modal-content">
    <p>Modal visível</p>
  </div>
</div>

</body>
</html>
