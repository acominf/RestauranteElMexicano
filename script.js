
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
        //Servicios
        $('#serv1').click(function(){
            $('#contServ').slideUp();
            $('#contServ1').removeClass('serInvisible');
            $('#contServ1').addClass('aumenta serVisible');
        });

        $('#serv2').click(function(){
            window.location.href = "menu.php";
        });
        
        $('#ver1').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info1').removeClass('serInvisible');
            $('#info1').addClass('serVisible');
        });
        $('#back1').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info1').removeClass('serVisible');
            $('#info1').addClass('serInvisible');
        });


        $('#ver2').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info2').removeClass('serInvisible');
            $('#info2').addClass('serVisible');
        });
        $('#back2').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info2').removeClass('serVisible');
            $('#info2').addClass('serInvisible');
        });


        $('#ver3').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info3').removeClass('serInvisible');
            $('#info3').addClass('serVisible');
        });
        $('#back3').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info3').removeClass('serVisible');
            $('#info3').addClass('serInvisible');
        });

        $('#ver4').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info4').removeClass('serInvisible');
            $('#info4').addClass('serVisible');
        });
        $('#back4').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info4').removeClass('serVisible');
            $('#info4').addClass('serInvisible');
        });

        $('#ver5').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info5').removeClass('serInvisible');
            $('#info5').addClass('serVisible');
        });
        $('#back5').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info5').removeClass('serVisible');
            $('#info5').addClass('serInvisible');
        });

        $('#ver6').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info6').removeClass('serInvisible');
            $('#info6').addClass('serVisible');
        });
        $('#back6').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info6').removeClass('serVisible');
            $('#info6').addClass('serInvisible');
        });

        $('#ver7').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info7').removeClass('serInvisible');
            $('#info7').addClass('serVisible');
        });
        $('#back7').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info7').removeClass('serVisible');
            $('#info7').addClass('serInvisible');
        });

        $('#ver8').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info8').removeClass('serInvisible');
            $('#info8').addClass('serVisible');
        });
        $('#back8').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info8').removeClass('serVisible');
            $('#info8').addClass('serInvisible');
        });

        $('#ver9').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info9').removeClass('serInvisible');
            $('#info9').addClass('serVisible');
        });
        $('#back9').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info9').removeClass('serVisible');
            $('#info9').addClass('serInvisible');
        });

        $('#ver10').click(function(){
            $('.contenedorCatalogo').slideUp();
            $('#info10').removeClass('serInvisible');
            $('#info10').addClass('serVisible');
        });
        $('#back10').click(function(){
            $('.contenedorCatalogo').slideDown();
            $('#info10').removeClass('serVisible');
            $('#info10').addClass('serInvisible');
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