const modal_monitor = document.getElementById("modalMonitor");
const openModalMonitorBtn = document.getElementById("openMonitorModal");
var openModalMonitorBtnGestao = document.getElementById("visualisarMonitor");
const botaofecharmonitor = document.getElementById("fecharMonitor");

openModalMonitorBtn.onclick = function() {
    modal_monitor.classList.add("visualizar");
}
try{
    openModalMonitorBtnGestao.onclick = function() {
        modal_monitor.classList.add("visualizar");
    }
}
catch{
    openModalMonitorBtnGestao = null;
}

botaofecharmonitor.onclick = function() {
    // modal_monitor.style.display = "none";
    modal_monitor.classList.remove("visualizar");
}
window.onclick = function(event) {
    if (event.target === modal_monitor) {
        // modal_monitor.style.display = "none";
        modal_monitor.classList.remove("visualizar");
    }
}