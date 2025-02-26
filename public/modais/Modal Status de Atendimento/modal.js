document.addEventListener("DOMContentLoaded", function () {
    const openModal = document.querySelector(".open");
    const closeModal = document.querySelector(".close");
    const modalContainer = document.querySelector(".modal-container");

    if (openModal && closeModal && modalContainer) {
        openModal.addEventListener("click", function () {
            modalContainer.style.display = "flex";
        });

        closeModal.addEventListener("click", function () {
            modalContainer.style.display = "none";
        });

        // Fechar o modal ao clicar fora dele
        modalContainer.addEventListener("click", function (event) {
            if (event.target === modalContainer) {
                modalContainer.style.display = "none";
            }
        });
    } else {
        console.error("Erro: Elementos não encontrados no DOM!");
    }
});