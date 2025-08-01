document.addEventListener("DOMContentLoaded", function () {
    const buttonAbrir_Intervalo = document.querySelector(".open-intervalo");
    const modalContainer_Intervalo = document.querySelector(".fundo-intervalo");
    const buttonRetornar_Intervalo = document.querySelector(".return_Intervalo");
    const botaoConfirmarIntervalo = document.querySelector(".save_IniciarIntervalo");

    // Ao clicar em "Abrir Intervalo" (botão inicial)
    if (buttonAbrir_Intervalo) {
        buttonAbrir_Intervalo.addEventListener("click", () => {
            modalContainer_Intervalo.classList.add("show");
        });
    }

    // Ao clicar em "Sim" (confirmar início do intervalo)
    if (botaoConfirmarIntervalo) {
        botaoConfirmarIntervalo.addEventListener("click", () => {
            // Fecha o primeiro modal se estiver aberto
            const primeiroModal = document.querySelector(".fundo-primeiro-modal");
            if (primeiroModal) {
                primeiroModal.classList.remove("show");
            }

            // Abre o modal de intervalo
            modalContainer_Intervalo.classList.add("show");

            // Marca no localStorage que o modal está aberto
            localStorage.setItem("modalIntervaloAberto", "true");
        });
    }

    // Ao clicar em "Retornar" (botão que encerra o intervalo)
    if (buttonRetornar_Intervalo) {
        buttonRetornar_Intervalo.addEventListener("click", () => {
            modalContainer_Intervalo.classList.remove("show");

            // Remove do localStorage
            localStorage.removeItem("modalIntervaloAberto");
        });
    }

    // Ao carregar a página, verifica se o modal estava aberto
    if (localStorage.getItem("modalIntervaloAberto") === "true") {
        modalContainer_Intervalo.classList.add("show");
    }
});