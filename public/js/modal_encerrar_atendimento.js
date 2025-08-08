document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir_EncerrarAtendimento = document.querySelector(".open-encerrar-atendimento");
    const modalContainer_EncerrarAtendimento = document.querySelector(".fundo-encerrar-atendimento");
    const buttonCancelar_EncerrarAtendimento = document.querySelector(".cancel_EncerrarAtendimento");
    const buttonSalvar_EncerrarAtendimento = document.querySelector(".save_EncerrarAtendimento");

    let idSenhaAtual = null;

    // Função para buscar a senha que está em atendimento para o guichê
    async function buscarSenhaEmAtendimento() {
        const idGuiche = sessionStorage.getItem("guicheSelected");
        if (!idGuiche) {
            alert("Guichê não selecionado.");
            return false;
        }
        try {
            const response = await fetch("../actions/buscar_senha_em_atendimento.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_guiche=${encodeURIComponent(idGuiche)}`
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
        const encontrou = await buscarSenhaEmAtendimento();
        if (encontrou) {
            modalContainer_EncerrarAtendimento.classList.add("show");
        }
    });

    buttonCancelar_EncerrarAtendimento.addEventListener("click", () => {
        modalContainer_EncerrarAtendimento.classList.remove("show");
        idSenhaAtual = null;
    });

    buttonSalvar_EncerrarAtendimento.addEventListener("click", async () => {
        if (!idSenhaAtual) {
            alert("Nenhuma senha selecionada para encerrar.");
            return;
        }
        try {
            const response = await fetch("../../app/actions/encerrar_atendimento.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `id_senha=${encodeURIComponent(idSenhaAtual)}`
            });
            const data = await response.json();
            if (data.success) {
                alert("Atendimento encerrado com sucesso.");
                modalContainer_EncerrarAtendimento.classList.remove("show");
                idSenhaAtual = null;
            } else {
                alert(data.message || "Erro ao encerrar atendimento.");
            }
        } catch (err) {
            console.error("Erro ao encerrar atendimento:", err);
            alert("Erro ao encerrar atendimento.");
        }
    });
});