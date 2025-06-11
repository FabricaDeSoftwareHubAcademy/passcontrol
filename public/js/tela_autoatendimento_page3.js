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

        const mapaServicos = {
            "IPTU": 1,
            "Iluminação Pública": 2,
            "Conselho Municipal": 3,
            "Fiscalização": 4,
            "Ouvidoria": 5,
            "Poda de Árvores": 6,
            "Licenças": 7,
            "Negociação": 8,
            "Limpeza": 9,
            "Transporte": 10,
            "Água": 11,
            "Energia": 12
        };

        const idServico = mapaServicos[dadosUsuario.servicoSelecionado];
        const prioridade = dadosUsuario.prioridade;

        if (!idServico || prioridade === undefined) {
            alert("Erro: serviço ou prioridade não selecionados.");
            return;
        }

        document.getElementById("prioridade").value = prioridade;
        document.getElementById("id_servico").value = idServico;

        dadosUsuario.telefone = telefone;
        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

        document.getElementById("form-dados").submit();
    });
});
