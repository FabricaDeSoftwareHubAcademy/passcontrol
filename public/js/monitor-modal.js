const modal_monitor = document.getElementById("modal-monitor");
const openModalMonitorBtn = document.getElementById("openModalBtn");
const openModalMonitorBtnGestao = document.getElementById("visualisarMonitor");
const botaofecharmonitor = document.getElementById("fechar-monitor");

openModalMonitorBtn.onclick = function() {
    modal_monitor.style.display = "flex";
}
openModalMonitorBtnGestao.onclick = function() {
    modal_monitor.style.display = "flex";
}

botaofecharmonitor.onclick = function() {
    modal_monitor.style.display = "none";
}
window.onclick = function(event) {
    if (event.target === modal) {
        modal_monitor.style.display = "none";
    }
}