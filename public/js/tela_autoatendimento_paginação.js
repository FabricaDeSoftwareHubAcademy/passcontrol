const boxContainer = document.getElementById("box-container");
const botaoAnterior = document.getElementById("prevPage");
const botaoProximo = document.getElementById("nextPage");
const indicadorPagina = document.getElementById("pageIndicator");

const todosServicos = Array.from(boxContainer.querySelectorAll(".box"));
const itensPorPagina = 10;
let paginaAtual = 1;

function renderizarPagina(pagina) {
    const inicio = (pagina - 1) * itensPorPagina;
    const fim = inicio + itensPorPagina;

    todosServicos.forEach((servico, index) => {
        servico.style.display = (index >= inicio && index < fim) ? "flex" : "none";
    });

    botaoAnterior.disabled = pagina === 1;
    botaoProximo.disabled = fim >= todosServicos.length;
    indicadorPagina.textContent = `Página ${pagina}`;
    indicadorPagina.style.display = "block";
}

// Paginação
botaoAnterior.addEventListener("click", () => {
    if (paginaAtual > 1) {
        paginaAtual--;
        renderizarPagina(paginaAtual);
    }
});

botaoProximo.addEventListener("click", () => {
    if (paginaAtual * itensPorPagina < todosServicos.length) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
    }
});

// Clique nos serviços
todosServicos.forEach(servico => {
    servico.addEventListener("click", (e) => {
        e.preventDefault();

        const dadosUsuario = {
            id_servico: servico.dataset.id,
            nome_servico: servico.dataset.nome,
            codigo_servico: servico.dataset.codigo,
            url_imagem_servico: servico.dataset.img
        };

        localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

        window.location.href = "../../app/view/tela_autoatendimento_page2.php";
    });
});

// Inicialização
renderizarPagina(paginaAtual);