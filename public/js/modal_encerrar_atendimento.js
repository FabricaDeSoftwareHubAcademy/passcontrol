document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir_EncerrarAtendimento = document.querySelector(".open-encerrar-atendimento");
    const modalContainer_EncerrarAtendimento = document.querySelector(".fundo-encerrar-atendimento");
    const buttonCancelar_EncerrarAtendimento = document.querySelector(".cancel_EncerrarAtendimento");
    const buttonSalvar_EncerrarAtendimento = document.querySelector(".save_EncerrarAtendimento");

    // Função para buscar a senha que está em atendimento para o guichê
    async function buscarSenhaEmAtendimento(senhaEmAtendimento) {
        const idGuiche = sessionStorage.getItem("guicheSelected");
        if (!idGuiche) {
            alert("Guichê não selecionado.");
            return false;
        }
        try {
            const response = await fetch("../actions/buscar_senha_em_atendimento.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_guiche=${encodeURIComponent(idGuiche)}&id_senha=${senhaEmAtendimento}`
            });
            const data = await response.json();
            if (data.success) {
                idSenhaAtual = data.senha.id_fila_senha;
                // Pode atualizar texto do modal para mostrar nome da senha etc.
                const nomeAtendimento = data.senha.nome_fila_senha || '---';
                document.querySelector(".modal-encerrar-atendimento .texto b").innerText = `Deseja encerrar atendimento de ${nomeAtendimento}?`;
                return true;
            } else {
                alert(data.message || "Nenhuma senha em atendimento para este guichê.");
                return false;
            }
        } catch (err) {
            console.error("Erro ao buscar senha em atendimento:", err);
            alert("Erro ao buscar senha em atendimento.");
            return false;
        }
    }

    buttonAbrir_EncerrarAtendimento.addEventListener("click", async () => {
        const id_senha = JSON.parse(sessionStorage.getItem("atendimento_atual")).id_senha;
        console.log(id_senha)
        const encontrou = await buscarSenhaEmAtendimento(id_senha);
        if (encontrou) {
            modalContainer_EncerrarAtendimento.classList.add("show");
        }
    });

    buttonCancelar_EncerrarAtendimento.addEventListener("click", () => {
        modalContainer_EncerrarAtendimento.classList.remove("show");
        idSenhaAtual = null;
    });

    buttonSalvar_EncerrarAtendimento.addEventListener("click", async () => {
        const id_senha = JSON.parse(sessionStorage.getItem("atendimento_atual")).id_senha;
        console.log(id_senha)
        if (!id_senha) {
            alert("Nenhuma senha selecionada para encerrar.");
            return;
        }
        try {
            const response = await fetch("../../app/actions/encerrar_atendimento.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_senha=${encodeURIComponent(id_senha)}`
            });
            const data = await response.json();
            if (data) {
                alert("Atendimento encerrado com sucesso.");
                modalContainer_EncerrarAtendimento.classList.remove("show");
                id_senha = null;
            }
        } catch (err) {
            console.error("Erro ao encerrar atendimento:", err);
        }
    });
});