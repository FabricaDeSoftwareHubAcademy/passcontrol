// Lista de serviços disponíveis
const servicos = [
    { img: "../../../public/img/icons/iptu_img.svg", title: "IPTU" },
    { img: "../../../public/img/icons/iluminaçao_img.png", title: "Iluminação Pública" },
    { img: "../../../public/img/icons/conselho_img.png", title: "Conselho Municipal" },
    { img: "../../../public/img/icons/fiscalizaçao_img.png", title: "Fiscalização" },
    { img: "../../../public/img/icons/ouvidoria_img.png", title: "Ouvidoria" },
    { img: "../../../public/img/icons/poda-arvores_img.png", title: "Poda de Árvores" },
    { img: "../../../public/img/icons/licença_img.png", title: "Licenças" },
    { img: "../../../public/img/icons/negociaçao_img.png", title: "Negociação" },
    { img: "../../../public/img/icons/limpeza_img.png", title: "Limpeza" },
    { img: "../../../public/img/icons/transporte_img.png", title: "Transporte" },
    { img: "../../../public/img/icons/água_img.png", title: "Água" },
    { img: "../../../public/img/icons/energia_img.png", title: "Energia" },

];

// Configuração da paginação
const itensPorPagina = 8;
let paginaAtual = 1;

const boxContainer = document.getElementById("box-container");
const botaoAnterior = document.getElementById("prevPage");
const botaoProximo = document.getElementById("nextPage");
const indicadorPagina = document.getElementById("pageIndicator");

function renderizarPagina(pagina) {
    
    boxContainer.innerHTML = "";

    // Calcula os índices dos itens para esta página
    const inicio = (pagina - 1) * itensPorPagina;
    const fim = inicio + itensPorPagina;
    const itensPagina = servicos.slice(inicio, fim);

    // Adiciona os itens ao HTML
    itensPagina.forEach(servico => {
        const box = document.createElement("a");
        box.href = "../../usuario/view/tela_autoatendimentoPage2.php"; //destino do link
        box.classList.add("box"); //css do .box

        box.innerHTML = `
            <img class="imagem-servico" src="${servico.img}" alt="${servico.title}">
            <h4>${servico.title}</h4>
        `;

        box.addEventListener("click", () => {
            let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};

            dadosUsuario.servicoSelecionado = servico.title;

            localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
        });

        boxContainer.appendChild(box); //container com os .box adicionados
    });

    // Atualiza os botões da quantidade de páginas
    botaoAnterior.disabled = pagina === 1;
    botaoProximo.disabled = fim >= servicos.length;

    // Atualiza o número da página
    indicadorPagina.textContent = `Página ${pagina}`;
}

// botões
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

//abre a primeira página
renderizarPagina(paginaAtual);