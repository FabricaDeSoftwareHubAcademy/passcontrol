document.addEventListener("DOMContentLoaded", function () {
    const btnProximaSenha = document.getElementById("chamar-proxima-senha");
    const modal = document.getElementById("modal-senha"); 

    btnProximaSenha.addEventListener("click", async () => {
        try {
            const response = await fetch("../../app/actions/proxima_senha.php");
            const data = await response.json();

            if (data.success) {
                // Preencher dados no modal
                document.getElementById("nome-cliente").innerText = data.nome;
                document.getElementById("senha-cliente").innerText = data.senha;
                document.getElementById("servico-cliente").innerText = data.servico;

                // Pega guichê atual da tela principal
                const guiche = document.getElementById("guiche-exibir").innerText;
                document.getElementById("guiche-cliente").innerText = guiche;

                // Exibir modal
                modal.style.display = "flex";
            } else {
                alert(data.message || "Erro ao buscar senha.");
            }
        } catch (error) {
            console.error("Erro na requisição:", error);    
            alert("Erro na requisição");
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
