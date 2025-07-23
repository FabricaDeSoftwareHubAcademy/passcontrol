document.addEventListener("DOMContentLoaded", () => {
    const buttonAbrir = document.querySelector(".abrirConsultarFila");
    const modal = document.querySelector(".fundo-consultar-fila");
    // const modalContainer = document.querySelector(".sombra");
    const buttonFechar = document.querySelector(".return_ConsultarFila");

    const tabelaBody = document.querySelector(".tabela-atendimento-consultar-fila tbody");
    const contador = document.querySelector(".contador-senhas");
  
    buttonAbrir.addEventListener("click", async () => {
      modal.classList.add("show");
  
      try {
        const response = await fetch("../../actions/consultar_fila_pendente.php");
        const data = await response.json();
  
        tabelaBody.innerHTML = "";
  
        let ordem = 1;
        let total = 0;

        data.forEach(item => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${ordem++}</td>
                <td>${item.nome}</td>
                <td>${item.sobrenome}</td>
                <td>${item.telefone}</td>
                <td>${item.servico}</td>
                <td>${item.prioridade}</td>
            `;
            tabelaBody.appendChild(row);
            total++;
        });
  
        contador.textContent = `Total de senhas pendentes: ${total}`;
    
        } catch (error) {
            console.error("Erro ao buscar dados:", error);
            tabelaBody.innerHTML = "<tr><td colspan='6'>Erro ao carregar dados</td></tr>";
            contador.textContent = "Total de senhas pendentes: 0";
        }
    }
    );

    buttonFechar.addEventListener("click", () => {
        modal.classList.remove("show");
    }
    );
});