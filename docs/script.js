
$(document).ready(function () {

    /*guarda la altura entre la parte dsuperior del sitio weub y el menu */
    var altura = $('.menu').offset().top;  
    /* */
    $(window).on('scroll',function(){
        if($(window).scrollTop() > altura){
            $('.menu').addClass('menu-fixed');
        }else{
            $('.menu').removeClass('menu-fixed');
        }
    });

    /*Logo principal situado en la parte de arriba. 
    $('#LogoPrincipal').mouseenter(function(){
        $(this).animate({
            height: '+=20px',
            width: '+=20px'
        });
    })

    $('#LogoPrincipal').mouseleave(function(){
        $(this).animate({
            height: '-=20px',
            width: '-=20px'
        });
    }) */
    
});