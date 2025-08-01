document.addEventListener("DOMContentLoaded", function () {    
    const btnProximaSenha = document.getElementById("chamar-proxima-senha");
    const modal = document.getElementById("modal-senha");

    btnProximaSenha.addEventListener("click", async () => {
        try {
            const idGuiche = sessionStorage.getItem("guicheSelected");

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
                sessionStorage.setItem("idSenhaAtual", data.id_senha);
                // Preencher modal com os dados da senha
                document.getElementById("nome-cliente").innerText = data.nome;
                document.getElementById("senha-cliente").innerText = data.senha;
                document.getElementById("servico-cliente").innerText = data.servico;
                
                // Preenche a informacao de atendimento em andamento com os dados da senha
                const obj_atendimento_atual = {
                    nome : data.nome,
                    senha : data.senha,
                    servico : data.servico
                }
                const obj_atendimento_atual_json = JSON.stringify(obj_atendimento_atual);

                sessionStorage.setItem("atendimento_atual", obj_atendimento_atual_json);

                document.getElementById("nome-atendido-atual").innerText = data.nome;
                document.getElementById("senha-atendido-atual").innerText = data.senha;
                document.getElementById("servico-atendido-atual").innerText = data.servico;

                // Pega guichê da sessionStorage para exibir
                const guicheTexto = sessionStorage.getItem("guicheSelected") || "N/A";
                document.getElementById("guiche-cliente").innerText = "Guiche: " + guicheTexto;

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
        e.stopPropagation();
    
        const idSenha = sessionStorage.getItem("idSenhaAtual");
    
        if (!idSenha) {
            alert("ID da senha não encontrado.");
            return;
        }
    
        fetch("../../app/actions/chamar_novamente.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id_senha=${encodeURIComponent(idSenha)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Senha chamada novamente.");
            } else {
                alert("Erro ao chamar novamente.");
            }
        })
        .catch(() => {
            alert("Erro de rede.");
        });    
    });
});
