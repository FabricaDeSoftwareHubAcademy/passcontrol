
buttonSalvar.addEventListener("click", () => {
    const senhaAtual = document.querySelector(".input-senha-atual").value;
    const novaSenha = document.querySelector(".input-nova-senha").value;
    const confirmaSenha = document.querySelector(".input-conf-nova-senha").value;

    fetch("alterar_senha.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
            senha_atual: senhaAtual,
            nova_senha: novaSenha,
            confirma_senha: confirmaSenha
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.sucesso) {
            alert(data.sucesso);
            window.location.href = "./app/view/atendimento.php";
        } else {
            alert(data.erro);
        }
    })
    .catch(err => {
        console.error("Erro:", err);
        alert("Erro inesperado.");
    });
});
