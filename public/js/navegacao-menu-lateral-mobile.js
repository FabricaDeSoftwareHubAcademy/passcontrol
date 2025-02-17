const menuLateralMobile = document.querySelector(".background-m-mobile");
const abrirMenuLateral = document.querySelector(".abrirMenuLateral");
const fecharMenuLateral = document.querySelector(".areatransp");
const recolherMenuLateral = document.querySelector(".recolher-m-menu");
const abrirMonitorModal = document.querySelector(".btnMonitorModal");

// const modal = document.getElementById("modal");
// const openModalBtn = document.getElementById("openModalBtn");

abrirMenuLateral.addEventListener("click", () =>{
    menuLateralMobile.classList.add("menu-visivel");
})

fecharMenuLateral.addEventListener("click", () =>{
    menuLateralMobile.classList.remove("menu-visivel");
})

recolherMenuLateral.addEventListener("click", () =>{
    menuLateralMobile.classList.remove("menu-visivel");
})

abrirMonitorModal.addEventListener("click", () =>{
    menuLateralMobile.classList.remove("menu-visivel");
    modal.style.display = "flex";
})