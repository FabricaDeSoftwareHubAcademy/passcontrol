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

// Configuração da pagininação
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
        box.href = "../../usuario/view/tela_autoatendimentoPage2.php"; //destino do link
        box.classList.add("box"); //css do .box

        box.innerHTML = `
            <img class="imagem-servico" src="${service.img}" alt="${service.title}">
            <h4>${service.title}</h4>
        `;

        box.addEventListener("click", () => {
            let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};

            dadosUsuario.servicoSelecionado = service.title;

            localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
        });

        boxContainer.appendChild(box); //container com os .box adicionados
    });

    // Atualiza os botões da quantidade de páginas
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

//abre a primeira página
renderPage(currentPage);

// document.addEventListener("DOMContentLoaded", async function () {
//     const boxContainer = document.getElementById("box-container");
//     const prevButton = document.getElementById("prevPage");
//     const nextButton = document.getElementById("nextPage");
//     const pageIndicator = document.createElement("span"); // Indicador de página
//     nextButton.parentNode.insertBefore(pageIndicator, nextButton);

//     let currentPage = 1;
//     const itemsPerPage = 8;
//     let totalPages = 1;

//     async function fetchServicos(page) {
//         try {
//             const response = await fetch(`http://localhost/passcontrol/app/usuario/view/tela_autoatendimentoPage1.php?pagina=${page}`);
//             const data = await response.json();

//             totalPages = data.total_paginas;
//             renderPage(data.servicos);
//             updatePaginationButtons();
//         } catch (error) {
//             console.error("Erro ao buscar serviços:", error);
//         }
//     }

//     function renderPage(servicos) {
//         boxContainer.innerHTML = "";

//         servicos.forEach(servico => {
//             const box = document.createElement("a");
//             box.href = "../../app/usuario/view/tela_autoatendimentoPage2.php";
//             box.classList.add("box");

//             box.innerHTML = `
//                 <img class="imagem-servico" src="${servico.imagem}" alt="${servico.nome_servico}">
//                 <h4>${servico.nome_servico}</h4>
//             `;

//             box.addEventListener("click", () => {
//                 let dadosUsuario = JSON.parse(localStorage.getItem("dadosUsuario")) || {};
//                 dadosUsuario.servicoSelecionado = servico.nome_servico;
//                 localStorage.setItem("dadosUsuario", JSON.stringify(dadosUsuario));
//             });

//             boxContainer.appendChild(box);
//         });

//         pageIndicator.textContent = `Página ${currentPage}`;
//     }

//     function updatePaginationButtons() {
//         prevButton.disabled = currentPage === 1;
//         nextButton.disabled = currentPage === totalPages;
//     }

//     prevButton.addEventListener("click", () => {
//         if (currentPage > 1) {
//             currentPage--;
//             fetchServicos(currentPage);
//         }
//     });

//     nextButton.addEventListener("click", () => {
//         if (currentPage < totalPages) {
//             currentPage++;
//             fetchServicos(currentPage);
//         }
//     });

//     fetchServicos(currentPage);
// });

// Lista de serviços disponíveis