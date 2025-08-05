document.addEventListener("DOMContentLoaded", function () {
    const dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario"));

    if (dadosUsuario) {
        const dadosParaEnviar = {
            nome: dadosUsuario.nomeCompleto,
            servico: dadosUsuario.servicoSelecionado,
            categoria: dadosUsuario.prioridade
        };

        fetch("http://localhost/passcontrol/app/usuario/controller/FilaSenhaController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dadosParaEnviar)
        })
        .then(response => response.json())
        .then(data => console.log("Resposta do servidor:", data))
        .catch(error => console.error("Erro ao enviar requisição:", error));        
    } else {
        console.error("Nenhum dado encontrado no localStorage.");
    }
});