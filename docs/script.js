
$(document).ready(function () {
    /*Modificacion del menu */
    var altura = $('.menu').offset().top;/*guarda la altura entre la parte dsuperior del sitio web y el menu */
    /* */
    $(window).on('scroll',function(){
        if($(window).scrollTop() > altura){
            $('.menu').addClass('menu-fixed');
        }else{
            $('.menu').removeClass('menu-fixed');
        }
    });

    /** slide */
    $('#btnAnt').click(function(){
        /**Encontramo el total de elementos que tiene .slider */
        var tam = $('.slider').find('.elementSlider').length;
        /**Recorremos cada una de ellas */
        $('.slider').find('.elementSlider').each(
            function(index,value) {
                if($(value).hasClass("svisible")) {
                    /**Quitamos la imagen que se encuentra en ese momoento */
                    $(value).slideUp();
                    $(value).removeClass('svisible');
                    /**Si es el primero */
                    if(index == 0){
                        $($('.slider').find('.elementSlider').get(tam-1)).slideDown();
                        $($('.slider').find('.elementSlider').get(tam-1)).addClass('svisible');
                        return false;
                    }else{
                        $($('.slider').find('.elementSlider').get(index - 1)).slideDown();
                        $($('.slider').find('.elementSlider').get(index - 1)).addClass('svisible');
                        return false;
                    }
                }
            });
        });

        $('#btnSig').click(function(){
        /**Encontramo el total de elementos que tiene .slider */
        var tam = $('.slider').find('.elementSlider').length;
        /**Recorremos cada una de ellas */
        $('.slider').find('.elementSlider').each(
            function(index,value) {
                if($(value).hasClass("svisible")) {
                    /**Quitamos la imagen que se encuentra en ese momoento */
                    $(value).slideUp();
                    $(value).removeClass('svisible');
                    /**Si es el primero */
                    if(index+1 < tam){
                        $($('.slider').find('.elementSlider').get(index+1)).slideDown();
                        $($('.slider').find('.elementSlider').get(index+1)).addClass('svisible');
                        return false;
                    }else{
                        $($('.slider').find('.elementSlider').get(0)).slideDown();
                        $($('.slider').find('.elementSlider').get(0)).addClass('svisible');
                        return false;
                    }
                }
            });
        });

        //Para las imagenes que estan e la pagina principal.
       /* $('#catalogo').click(function(){
            window.location.href = "menu.html";
        });

        $('#reserv').click(function(){
            window.location.href = "servicios.html"
        });

        $('#reserv').mouseenter(function(){
            $(this).css('background-image', 'url(reserv2.png)');
        });

        $('#reserv').mouseleave(function(){
            $(this).css('background-image', 'url(reserv1.jpg)');
        });

        $('#catalogo').mouseenter(function(){
            $(this).css('background-image', 'url(catalogo2.png)');
        });

        $('#catalogo').mouseleave(function(){
            $(this).css('background-image', 'url(catalogo1.jpg)');
        });*/
        //--------------------------------------------------------
        //Servicios
        $('#serv1').click(function(){
            $('#contServ').slideUp();
            $('#contServ1').removeClass('serInvisible');
            $('#contServ1').addClass('aumenta serVisible');
        });

        $('#serv2').click(function(){
            $('#contServ').slideUp();
            $('#contServ2').removeClass('serInvisible');
            $('#contServ2').addClass('aumenta serVisible');
        });
        
        $('#ver1').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info1').removeClass('serInvisible');
            $('#info1').addClass('serVisible');
        });

        $('#ver2').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info2').removeClass('serInvisible');
            $('#info2').addClass('serVisible');
        });

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
    }) 
    
    
            //Para las imagenes del manu
        $('#foto1').mouseenter(function(){
            //$(this).addClass('foto1Cambio');
            //$(this).css('background-image', 'url(enchiladas.jpg)');
           //$(this).animate({width:250,height:250,left:-25,rigth:-25});
        });
      
        $('#foto1').mouseleave(function(){
            //$(this).removeClass('foto1Cambio');
            $(this).css('background-image', 'url(pozole.jpg)');
        });
    
    
    
    
    
    */