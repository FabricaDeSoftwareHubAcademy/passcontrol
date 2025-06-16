document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('save_sucess').addEventListener('click', async function (e) {
        e.preventDefault();

        const nome = document.getElementById('nome_usuario').value;
        const checkboxes = document.querySelectorAll('input[name="permissoes_selecionadas[]"]:checked');
        const permissoes = Array.from(checkboxes).map(cb => cb.value);

        const formData = new FormData();
        formData.append('nome_perfil_usuario', nome);
        permissoes.forEach(p => formData.append('permissoes_selecionadas[]', p));

        const response = await fetch('../actions/perfil_cadastrar.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.status === 'ok') {
            alert("Perfil cadastrado com sucesso!");
            window.location.href = './cadastro_usuario.php';
        } else {
            alert("Erro ao cadastrar: " + result.mensagem);
        }
    });
});
