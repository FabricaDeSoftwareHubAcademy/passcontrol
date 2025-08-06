document.addEventListener("DOMContentLoaded", () => {
    const btnProximaSenha = document.getElementById("chamar-proxima-senha");
    const modal = document.getElementById("modal-senha");
    
    const nomeClienteEl = document.getElementById("nome-cliente");
    const senhaClienteEl = document.getElementById("senha-cliente");
    const servicoClienteEl = document.getElementById("servico-cliente");
    const guicheClienteEl = document.getElementById("guiche-cliente");

    let idSenhaAtual = null;

    btnProximaSenha.addEventListener("click", async () => {
        const idGuiche = sessionStorage.getItem("guicheSelected");
        if (!idGuiche) {
            alert("Guichê não selecionado.");
            return;
        }

        try {
            const response = await fetch("../../app/actions/proxima_senha.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_guiche=${encodeURIComponent(idGuiche)}`
            });
            const data = await response.json();

            if (data.success) {
                idSenhaAtual = data.id_senha;

                nomeClienteEl.innerText = data.nome;
                senhaClienteEl.innerText = data.senha;
                servicoClienteEl.innerText = data.servico;
                guicheClienteEl.innerText = "Guichê: " + idGuiche;

                modal.style.display = "flex";
                sessionStorage.setItem("idSenhaAtual", idSenhaAtual);
            } else {
                alert(data.message || "Nenhuma senha pendente.");
            }
        } catch (err) {
            console.error("Erro na requisição:", err);
            alert("Erro ao chamar próxima senha.");
        }
    });

    // Função auxiliar para atualizar presença (1 = presente, 0 = ausente)
    async function atualizarPresenca(presenca) {
        if (!idSenhaAtual) {
            alert("Nenhuma senha ativa para confirmar presença.");
            return;
        }

        try {
            const response = await fetch("../../app/actions/atualizar_presenca.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_senha=${encodeURIComponent(idSenhaAtual)}&status_presenca=${encodeURIComponent(presenca)}`
            });
            const data = await response.json();

            if (data.success) {
                modal.style.display = "none";
                idSenhaAtual = null;
                sessionStorage.removeItem("idSenhaAtual");
            } else {
                alert(data.message || "Erro ao atualizar presença.");
            }
        } catch (err) {
            console.error("Erro na requisição:", err);
            alert("Erro ao atualizar presença.");
        }
    }

    document.querySelector(".presente_ChamarSenha").addEventListener("click", () => atualizarPresenca(1));
    document.querySelector(".ausente_ChamarSenha").addEventListener("click", () => atualizarPresenca(0));

    // Botão chamar novamente - atualiza somente chamada_in
    document.querySelector(".chamar_ChamarSenha").addEventListener("click", async () => {
        if (!idSenhaAtual) {
            alert("Nenhuma senha ativa para chamar novamente.");
            return;
        }
        try {
            const params = new URLSearchParams();
            params.append('id_senha', idSenhaAtual);

            const response = await fetch("../../app/actions/chamar_novamente.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: params.toString()
            });
            const data = await response.json();

            if (data.success) {
                alert("Senha chamada novamente.");
            } else {
                alert(data.message || "Erro ao chamar novamente.");
            }
        } catch (err) {
            console.error("Erro na requisição:", err);
            alert("Erro ao chamar novamente.");
        }
    });
});