document.addEventListener("DOMContentLoaded", function (){
    const abrir_modal = document.querySelector(".fundo-status-atendimento");
    const openModal_StatusAtendimento = document.querySelector(".open-status-atendimento");
    const closeModal_StatusAtendimento = document.querySelector(".close_StatusAtendimento");

    openModal_StatusAtendimento.addEventListener("click", () => {
        abrir_modal.classList.add("show");
    });
    closeModal_StatusAtendimento.addEventListener("click", () => {
        abrir_modal.classList.remove("show");
    });

});