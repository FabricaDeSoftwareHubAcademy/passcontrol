document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir = document.querySelector(".abrirConsultarFila");
    const modal = document.querySelector(".fundo-consultar-fila");
    const buttonFechar = document.querySelector(".return_ConsultarFila");

    const tabelaBody = document.querySelector(".tabela-atendimento-consultar-fila tbody");
    const contador = document.querySelector(".contador-senhas");


    async function atualizarFila() {
        if (!tabelaBody || !contador) return;


        tabelaBody.innerHTML = `
            <tr>
                <td colspan="4" style="text-align:center;">Carregando...</td>
            </tr>`;
        contador.textContent = "Carregando...";

        try {
            
            const response = await fetch("../actions/consultar_fila_pendente.php");

            if (!response.ok) {
                throw new Error("Erro ao buscar dados da fila");
            }

    
            const data = await response.json();

            tabelaBody.innerHTML = "";

            if (data.length === 0) {
                tabelaBody.innerHTML = `
                    <tr>
                        <td colspan="4" style="text-align:center;">Nenhuma senha na fila</td>
                    </tr>`;
                contador.textContent = "Senhas na fila: 0";
                return;
            }

            let ordem = 1;
            let total = 0;

            data.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                <td>${ordem++}</td>
                <td>${item.nome_fila_senha ?? '-'}</td>
                <td>${item.servico_fila_senha ?? '-'}</td>
                <td>${item.prioridade_fila_senha == 1 ? 'Preferencial' : 'Comum'}</td>
                `;

                tabelaBody.appendChild(row);
                total++;
            });

        contador.textContent = `Senhas na fila: ${total}`;

        } catch (error) {
            console.error("Erro ao buscar dados:", error);
            tabelaBody.innerHTML = "<tr><td colspan='4'>Erro ao carregar dados</td></tr>";
            contador.textContent = "Senhas na fila: 0";
        }
    }

    if (buttonAbrir && modal) {
        buttonAbrir.addEventListener("click", () => {
            modal.classList.add("show");
            atualizarFila();
        });
    }

    if (buttonFechar && modal) {
        buttonFechar.addEventListener("click", () => {
            modal.classList.remove("show");
        });
    }
});


//     buttonAbrir.addEventListener("click", () => {
//         modal.classList.add("show");
//         atualizarFila();
//     });

//     buttonFechar.addEventListener("click", () => {
//         modal.classList.remove("show");
//     }
//     );


// });    


