document.addEventListener("DOMContentLoaded", () => {
    const contador_fila_atendimento = document.querySelector(".contador-senhas");
    const tabela_fila_body = document.querySelector(".tabela-atendimento-consultar-fila tbody");

    async function atualizarFila() {

        tabela_fila_body.innerHTML = `
            <tr>
                <td colspan="4" style="text-align:center;">Carregando...</td>
            </tr>`;
        contador_fila_atendimento.textContent = "Carregando...";

        try {
            const response = await fetch("../actions/consultar_fila_pendente.php");
            const data = await response.json();

            tabela_fila_body.innerHTML = "";

            let ordem = 1;
            let total = 0;

            data.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${ordem++}</td>
                    <td>${item.nome_fila_senha}</td>
                    <td>${item.nome_servico}</td>
                    <td>${item.categoria === 0 ? 'Comum' : 'Preferencial'}</td>
                `;
                tabela_fila_body.appendChild(row);
                total++;
            }
            );

        contador_fila_atendimento.textContent = `Senhas na fila: ${total}`;
        // sessionStorage.setItem('contador_fila', total);
        document.getElementById('contador_fila').innerText = total;

        if(total == 0 || total == null){
            tabela_fila_body.innerHTML = "<tr><td colspan='4'>Fila Vazia...</td></tr>";
        }

        } catch (error) {
            console.error("Erro ao buscar dados:", error);
            tabela_fila_body.innerHTML = "<tr><td colspan='4'>Erro ao carregar dados</td></tr>";
            contador_fila_atendimento.textContent = "Senhas na fila: 0";
        }
    }


    document.querySelector(".abrirConsultarFila").addEventListener("click", () => {
        document.querySelector(".fundo-consultar-fila").classList.add("show");
        atualizarFila();
    });

    document.querySelector(".return_ConsultarFila").addEventListener("click", () => {
        document.querySelector(".fundo-consultar-fila").classList.remove("show");
    }
    );
});    


