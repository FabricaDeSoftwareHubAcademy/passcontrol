document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir = document.querySelector(".abrirConsultarFila");
    const modal = document.querySelector(".fundo-consultar-fila");
    const buttonFechar = document.querySelector(".return_ConsultarFila");

    const tabelaBody = document.querySelector(".tabela-atendimento-consultar-fila tbody");
    const contador = document.querySelector(".contador-senhas");


    async function atualizarFila() {

        tabelaBody.innerHTML = `
            <tr>
                <td colspan="4" style="text-align:center;">Carregando...</td>
            </tr>`;
        contador.textContent = "Carregando...";

        try {
            const response = await fetch("../../app/actions/consultar_fila_pendente.php");
            const data = await response.json();


            console.log(data);

            tabelaBody.innerHTML = "";

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
                tabelaBody.appendChild(row);
                total++;
            }
            );

        contador.textContent = `Senhas na fila: ${total}`;

        } catch (error) {
            console.error("Erro ao buscar dados:", error);
            tabelaBody.innerHTML = "<tr><td colspan='4'>Erro ao carregar dados</td></tr>";
            contador.textContent = "Senhas na fila: 0";
        }
    }


    buttonAbrir.addEventListener("click", () => {
        document.querySelector(".fundo-consultar-fila").classList.add("show");
        atualizarFila();
    });

    buttonFechar.addEventListener("click", () => {
        modal.classList.remove("show");
    }
    );


});    


