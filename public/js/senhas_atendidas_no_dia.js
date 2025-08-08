document.addEventListener("DOMContentLoaded", () => {
    carregarSenhasAtendidas();
});

async function carregarSenhasAtendidas() {
    try {
        const response = await fetch('../actions/senhas_atendidas_no_dia.php');

        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        const data = await response.json();
        const tbody = document.getElementById("lista-senhas-atendidas");
        tbody.innerHTML = "";

        if (!data || data.length === 0) {
            tbody.innerHTML = `<tr><td colspan="7">Nenhuma senha atendida hoje.</td></tr>`;
            return;
        }

        data.fo

        data.forEach((senha, index) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${senha.nome}</td>
                <td>${senha.servico}</td>
                <td>${senha.senha}</td>
                <td>${senha.inicio}</td>
                <td>${senha.termino}</td>
                <td>${senha.categoria == 0 ? "Comum" : "Prioridade"}</td>
            `;
            tbody.appendChild(row);
        });

    } catch (error) {
        console.error("Erro ao carregar senhas atendidas:", error);
    }

    
}
