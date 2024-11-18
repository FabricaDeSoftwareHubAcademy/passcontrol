$('.botao-menu-mobile').on('click',function(){
    $(this).toggleClass('menu-mobile_aberto');
    $(".area-lateral-navegacao").toggleClass('menu-mobile_fechado');
});