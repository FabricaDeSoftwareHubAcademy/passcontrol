
<div class="modal active" id="modal-primeiroacesso">
  <div class="modal-content">
    <form method="POST" action="trocar_senha.php">
      <span class="modal-close" onclick="document.getElementById('modal-primeiroacesso').classList.remove('active')">&times;</span>
      <h2>Primeiro Acesso?</h2>
      <p>Você precisa alterar a senha antes de acessar o sistema.</p>

      <div class="form-group">
        <label for="senha_atual">Senha Atual: Digite a senha recebida por email.</label>
        <input type="password" id="senha_atual" name="senha_atual" required>
      </div>

      <div class="form-group">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required>
      </div>

      <div class="form-group">
        <label for="conf_nova_senha">Confirmar Nova Senha:</label>
        <input type="password" id="conf_nova_senha" name="conf_nova_senha" required>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn">Salvar</button>
      </div>
    </form>
  </div>
</div>