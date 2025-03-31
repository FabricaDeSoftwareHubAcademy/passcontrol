// MENU MOBILE
const menuLateralMobile = document.querySelector(".background-m-mobile");
const abrirMenuLateral = document.querySelector(".abrirMenuLateral");
const fecharMenuLateral = document.querySelector(".areatransp");
const recolherMenuLateral = document.querySelector(".recolher-m-menu");

const abrirMonitorModal = document.querySelector(".btnMonitorModal");
const MonitorModal = document.getElementById("modal-monitor");

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
    MonitorModal.style.display = "flex";
})


// MENU INFORMACAO DO USUARIO
const menuInfoUsuario = document.querySelector(".menu-usuario");
const abrirInfoUsuario = document.querySelector(".usu-nome");

document.addEventListener('click', event => {
    if (event.target === abrirInfoUsuario) {
        menuInfoUsuario.classList.add("menu-visivel");
    }
    else if (event.target !== menuInfoUsuario){
        menuInfoUsuario.classList.remove('menu-visivel');
    }
});

// MENU-ESTACIONARIO 
// const btnAtivoMenu = document.querySelector(".")

// function toggleMenu() {
//     document.getElementById("mobileMenu").classList.toggle("ativo-estacionario");
// }

// //ATIVO POR PAGINA
// const link_pag = window.location.href;
// alert(link_pag)
// document.querySelectorAll(".menu-lateral-navegacao a").forEach(function(elem){ 
//     if(elem.href.includes(link_pag)){
//         elem.classList.add(".ativo-estacionario");
//     }
// });