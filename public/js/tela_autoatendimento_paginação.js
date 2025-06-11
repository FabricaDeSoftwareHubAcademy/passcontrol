// Lista de serviços disponíveis
const servicos = [
    { img: "../../public/img/icons/iptu_img.svg", title: "IPTU" },
    { img: "../../public/img/icons/iluminaçao_img.png", title: "Iluminação Pública" },
    { img: "../../public/img/icons/conselho_img.png", title: "Conselho Municipal" },
    { img: "../../public/img/icons/fiscalizaçao_img.png", title: "Fiscalização" },
    { img: "../../public/img/icons/ouvidoria_img.png", title: "Ouvidoria" },
    { img: "../../public/img/icons/poda-arvores_img.png", title: "Poda de Árvores" },
    { img: "../../public/img/icons/licença_img.png", title: "Licenças" },
    { img: "../../public/img/icons/negociaçao_img.png", title: "Negociação" },
    { img: "../../public/img/icons/limpeza_img.png", title: "Limpeza" },
    { img: "../../public/img/icons/transporte_img.png", title: "Transporte" },
    { img: "../../public/img/icons/agua_img.png", title: "Água" },
    { img: "../../public/img/icons/energia_img.png", title: "Energia" },
];

// Configuração da paginação
const itensPorPagina = 10;
let paginaAtual = 1;

const boxContainer = document.getElementById("box-container");
const botaoAnterior = document.getElementById("prevPage");
const botaoProximo = document.getElementById("nextPage");
const indicadorPagina = document.getElementById("pageIndicator");

function renderizarPagina(pagina) {
    boxContainer.innerHTML = "";

    const inicio = (pagina - 1) * itensPorPagina;
    const fim = inicio + itensPorPagina;
    const itensPagina = servicos.slice(inicio, fim);

    itensPagina.forEach(servico => {
        const box = document.createElement("a");
        box.href = "#";
        box.classList.add("box");

        box.innerHTML = `
            <img class="imagem-servico" src="${servico.img}" alt="${servico.title}">
            <h4>${servico.title}</h4>
        `;

        box.addEventListener("click", (event) => {
            event.preventDefault();

            let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};
            dadosUsuario.servicoSelecionado = servico.title;
            localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));

            window.location.href = "../../app/view/tela_autoatendimento_page2.php";
        });

        boxContainer.appendChild(box);
    });

    botaoAnterior.disabled = pagina === 1;
    botaoProximo.disabled = fim >= servicos.length;
    indicadorPagina.textContent = `Página ${pagina}`;
}

// Botões
botaoAnterior.addEventListener("click", () => {
    if (paginaAtual > 1) {
        paginaAtual--;
        renderizarPagina(paginaAtual);
    }
});

botaoProximo.addEventListener("click", () => {
    if (paginaAtual * itensPorPagina < servicos.length) {
        paginaAtual++;
        renderizarPagina(paginaAtual);
    }
});


renderizarPagina(paginaAtual);