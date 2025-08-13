document.addEventListener("DOMContentLoaded", function () {
    const confirmarBtn = document.getElementById("confirmarBtn");

    confirmarBtn.addEventListener("click", function () {
        const nome = document.getElementById("nome").value.trim();
        const sobrenome = document.getElementById("sobrenome").value.trim();
        const telefone = document.getElementById("telefone").value.trim();

        if (!nome || !sobrenome) {
            alert("Por favor, preencha o nome e sobrenome.");
            return;
        }

        const dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario") || "{}");

        const prioridade = dadosUsuario.prioridade;
        const idServico = dadosUsuario.id_servico;

        if (prioridade === undefined || idServico === undefined) {
            alert("Erro: prioridade ou serviço não selecionado.");
            return;
        }

        document.getElementById("prioridade").value = prioridade;
        document.getElementById("id_servico").value = idServico;
        document.getElementById("telefone_hidden").value = telefone;

        // Atualiza localStorage com telefone
        dadosUsuario.telefone = telefone;
        console.log(dadosUsuario);
        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

        document.getElementById("form-dados").submit();
    });

    const telefoneInput = document.getElementById('telefone');

    function aplicarMascara() {
        let value = telefoneInput.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        if (value.length > 7) {
            value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
        } else if (value.length > 2) {
            value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
        } else if (value.length > 0) {
            value = value.replace(/(\d{0,2})/, '($1');
        }
        telefoneInput.value = value;
    }

    telefoneInput.addEventListener('input', aplicarMascara);
    telefoneInput.addEventListener('change', aplicarMascara);
});