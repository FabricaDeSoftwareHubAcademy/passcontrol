//-- EM TESTE --

// $(document).ready(function(){
//     $('.botao-menu-mobile').on('click', function(){
//         $('.background-m-mobile').toggleClass('aberto');
//     })
// })

// $(document).ready(function(){
//     $('.botao-menu-mobile').on('click', function() {
//         $('.background-m-mobile').toggleClass('active');
//         $('.botao-menu-mobile').find('i').toggleClass('fa-x')
//     })
// })

const abrirMenuLateral = document.querySelector(".abrirMenuLateral");
const menuLateralMobile = document.querySelector(".background-m-mobile");
const fecharMenuLateral = document.querySelector(".areatransp");

abrirMenuLateral.addEventListener("click", () =>{
    menuLateralMobile.classList.add("menu-visivel");
})

fecharMenuLateral.addEventListener("click", () =>{
    menuLateralMobile.classList.remove("menu-visivel");
})