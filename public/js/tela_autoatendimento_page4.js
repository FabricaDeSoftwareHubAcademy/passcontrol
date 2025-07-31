document.addEventListener("DOMContentLoaded", async () => {
    const dados = JSON.parse(localStorage.getItem('dadosSenha'));

    if (!dados || !dados.nome || dados.prioridade === undefined || !dados.id_servico) {
        alert("Informações incompletas.");
        return;
    }

    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams(dados)
        });

        const data = await response.json();

        if (data && data.sucesso) {
            const divs = document.querySelectorAll('.variable-text > div');
            divs[0].innerHTML = `<strong>SENHA:</strong> ${data.senha}`;
            divs[1].innerHTML = `<strong>NOME:</strong> ${data.nome}`;
            divs[2].innerHTML = `<strong>SERVIÇO:</strong> ${data.servico}`;
        } else {
            // alert("Não foi possível localizar a senha.");
        }
    } catch (error) {
        console.error("Erro:", error);
        alert("Erro ao buscar senha.");
    }
    
}); 