// Lista de serviços disponíveis
const services = [
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
const itemsPerPage = 8;
let currentPage = 1;

const boxContainer = document.getElementById("box-container");
const prevButton = document.getElementById("prevPage");
const nextButton = document.getElementById("nextPage");
const pageIndicator = document.getElementById("pageIndicator");

function renderPage(page) {
    
    boxContainer.innerHTML = "";

    // Calcula os índices dos itens para esta página
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const pageItems = services.slice(start, end);

    // Adiciona os itens ao HTML
    pageItems.forEach(service => {
        const box = document.createElement("a");
        box.href = "../view/tela_autoatendimentoPage3.html";
        box.classList.add("box");

        box.innerHTML = `
            <img class="imagem-servico" src="${service.img}" alt="${service.title}">
            <h4>${service.title}</h4>
        `;

        boxContainer.appendChild(box);
    });

    // Atualiza os botões de navegação
    prevButton.disabled = page === 1;
    nextButton.disabled = end >= services.length;

    // Atualiza o número da página
    pageIndicator.textContent = `Página ${page}`;
}

// botões
prevButton.addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        renderPage(currentPage);
    }
});

nextButton.addEventListener("click", () => {
    if (currentPage * itemsPerPage < services.length) {
        currentPage++;
        renderPage(currentPage);
    }
});

// Inicializa a primeira página
renderPage(currentPage);
