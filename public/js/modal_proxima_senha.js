document.addEventListener("DOMContentLoaded", function () {
    const btnProximaSenha = document.getElementById("chamar-proxima-senha");
    const modal = document.getElementById("modal-senha");

    btnProximaSenha.addEventListener("click", async () => {
        try {
            const idGuiche = sessionStorage.getItem("IdGuicheSelecionado");

            if (!idGuiche) {
                alert("Guichê não selecionado.");
                return;
            }

            const response = await fetch("../../app/actions/proxima_senha.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `id_guiche=${encodeURIComponent(idGuiche)}`
            });

            const data = await response.json();

            if (data.success) {
                // Preencher modal com os dados da senha
                document.getElementById("nome-cliente").innerText = data.nome;
                document.getElementById("senha-cliente").innerText = data.senha;
                document.getElementById("servico-cliente").innerText = data.servico;

                // Pega guichê da sessionStorage para exibir
                const guicheTexto = sessionStorage.getItem("guichetexto") || "N/A";
                document.getElementById("guiche-cliente").innerText = guicheTexto;

                // Exibir modal
                modal.style.display = "flex";
            } else {
                alert(data.message || "Erro ao buscar senha.");
            }
        } catch (error) {
            console.error("Erro na requisição:", error);
            alert("Erro ao chamar próxima senha.");
        }
    });

    // Botões de fechar o modal
    document.querySelector(".ausente_ChamarSenha").addEventListener("click", (e) => {
        e.stopPropagation(); // impede que o clique afete outros elementos
        modal.style.display = "none";
    });

    document.querySelector(".presente_ChamarSenha").addEventListener("click", (e) => {
        e.stopPropagation();
        modal.style.display = "none";
    });

    document.querySelector(".chamar_ChamarSenha").addEventListener("click", (e) => {
        // Aqui você pode repetir o áudio ou ação de chamar novamente
        e.stopPropagation();
        alert("Chamando novamente...");
    });
});
