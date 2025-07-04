// document.addEventListener('DOMContentLoaded', function () {
//     // Evento no botão de salvar perfil
//     document.getElementById('save_sucess').addEventListener('click', async function (e) {
//         e.preventDefault();

//         // Captura o nome do perfil
//         const nome = document.getElementById('nome_usuario').value;

//         // Captura as permissões selecionadas (checkboxes marcados)
//         const checkboxes = document.querySelectorAll('input[name="permissoes_selecionadas[]"]:checked');
//         const permissoes = Array.from(checkboxes).map(cb => cb.value);

//         // Prepara FormData para envio
//         const formData = new FormData();
//         formData.append('nome_perfil_usuario', nome);
//         permissoes.forEach(p => formData.append('permissoes_selecionadas[]', p));

//         // Envia requisição POST para cadastrar perfil
//         const response = await fetch('../actions/perfil_cadastrar.php', {
//             method: 'POST',
//             body: formData
//         });

//         const result = await response.json();

//         if (result.status === 'ok') {
//             alert("Perfil cadastrado com sucesso!");
//             window.location.href = './cadastro_usuario.php';
//         } else {
//             alert("Erro ao cadastrar: " + result.mensagem);
//         }
//     });
// });
