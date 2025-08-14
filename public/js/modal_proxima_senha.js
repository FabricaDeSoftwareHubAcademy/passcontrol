document.addEventListener("DOMContentLoaded", () => {
    const socket = new WebSocket('ws://192.168.22.9:8080');

    const btnProximaSenha = document.getElementById("chamar-proxima-senha");
    const modalContainer_ChamarSenha = document.querySelector(".fundo-container-confirmacao-presenca");

    let idSenhaAtual = null;

    async function preenche_dados_atendimento(data){
        document.getElementById("nome-cliente").innerText = data.nome;
        document.getElementById("senha-cliente").innerText = data.senha;
        document.getElementById("servico-cliente").innerText = data.servico;
        document.getElementById("guiche-cliente").innerText = sessionStorage.getItem('nomeGuiche');

        // Preenche a informacao de atendimento em andamento com os dados da senha
        const obj_atendimento_atual = {
            nome : data.nome,
            senha : data.senha,
            servico : data.servico,
            id_senha : data.id_senha
        }
        const obj_atendimento_atual_json = JSON.stringify(obj_atendimento_atual);

        sessionStorage.setItem("atendimento_atual", obj_atendimento_atual_json);

        document.getElementById("nome-atendido-atual").innerText = data.nome;
        document.getElementById("senha-atendido-atual").innerText = data.senha;
        document.getElementById("servico-atendido-atual").innerText = data.servico;
    }

    btnProximaSenha.addEventListener("click", async () => {
        const idGuiche = sessionStorage.getItem("guicheSelected");
        if (!idGuiche) {
            alert("Guichê não selecionado.");
            return;
        }

        try {
            const response = await fetch("../actions/proxima_senha.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_guiche=${encodeURIComponent(idGuiche)}`
            });
            const data = await response.json();

            if (data.success) {
                idSenhaAtual = data.id_senha;

                // CHAMA O WEBSOCKET PARA ATUALIZAR O MONITOR 
                const payload = 'chamar';
                socket.send(JSON.stringify({ type: 'buttonClicked', payload }));

                preenche_dados_atendimento(data);

                modalContainer_ChamarSenha.classList.add("show");
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
                modalContainer_ChamarSenha.classList.remove("show");
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
            idSenhaAtual = sessionStorage.getItem("idSenhaAtual");
        }

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
                // Mantém atualização via WebSocket
                const payload = 'chamar';
                socket.send(JSON.stringify({ type: 'buttonClicked', payload }));

                // Atualiza o monitor se a função existir
                if (typeof carregarSenhasModal === "function") {
                    carregarSenhasModal();
                }

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