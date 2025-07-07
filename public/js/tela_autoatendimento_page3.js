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

        // const mapaServicos = {
        //     "IPTU": 1,
        //     "Iluminação Pública": 2,
        //     "Conselho Municipal": 3,
        //     "Fiscalização": 4,
        //     "Ouvidoria": 5,
        //     "Poda de Árvores": 6,
        //     "Licenças": 7,
        //     "Negociação": 8,
        //     "Limpeza": 9,
        //     "Transporte": 10,
        //     "Água": 11,
        //     "Energia": 12
        // };


        // const idServico = mapaServicos[dadosUsuario.servicoSelecionado];
        const idServico = URLSearchParams("id_servico");
        const prioridade = dadosUsuario.prioridade;

        if (!idServico || prioridade === undefined) {
            alert("Erro: serviço ou prioridade não selecionados.");
            return;
        }

        document.getElementById("prioridade").value = prioridade;
        document.getElementById("id_servico").value = idServico;

        dadosUsuario.telefone = telefone;
        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
        console.log('dados do usuario',dadosUsuario);
        document.getElementById("telefone_hidden").value = telefone;
        console.log('dados telefone',telefone);

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
            value = value.replace(/(\d{0,2})/, '$1');
        }
    
            telefoneInput.value = value;
        }
    
        telefoneInput.addEventListener('input', aplicarMascara);
        telefoneInput.addEventListener('change', aplicarMascara);
});
