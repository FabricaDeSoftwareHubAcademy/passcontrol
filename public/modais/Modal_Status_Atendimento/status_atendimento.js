document.addEventListener("DOMContentLoaded", function () {
    const modalContainer_StatusAtendimento = document.querySelector(".fundo-status-atendimento");
    const openModal_StatusAtendimento = document.querySelector(".open-status-atendimento");
    const closeModal_StatusAtendimento = document.querySelector(".close_StatusAtendimento");

    if (openModal_StatusAtendimento && closeModal_StatusAtendimento && modalContainer_StatusAtendimento) {
        openModal_StatusAtendimento.addEventListener("click", function () {
            modalContainer_StatusAtendimento.style.display = "flex";
        });

        closeModal_StatusAtendimento.addEventListener("click", function () {
            modalContainer_StatusAtendimento.style.display = "none";
        });

        // Fechar o modal ao clicar fora dele
        modalContainer_StatusAtendimento.addEventListener("click", function (event) {
            if (event.target === modalContainer_StatusAtendimento) {
                modalContainer_StatusAtendimento.style.display = "none";
            }
        });
    } else {
        console.error("Erro: Elementos não encontrados no DOM!");
    }
});