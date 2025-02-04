const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("openModalBtn");
const botaofecharmonitor = document.querySelector(".botao-fechar-monitor");

openModalBtn.onclick = function() {
    modal.style.display = "flex";
}

botaofecharmonitor.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}