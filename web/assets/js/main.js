
function main() {

(function () {
   'use strict';

   /* ==============================================
  	Testimonial Slider
  	=============================================== */ 

  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 40
            }, 900);
            return false;
          }
        }
      });

    /*====================================
    Show Menu on Book
    ======================================*/
    $(window).bind('scroll', function() {
        var navHeight = $(window).height() - 500;
        if ($(window).scrollTop() > navHeight) {
            $('.navbar-default').addClass('on');
        } else {
            $('.navbar-default').removeClass('on');
        }
    });

    $('body').scrollspy({ 
        target: '.navbar-default',
        offset: 80
    });

  	/*====================================
    Portfolio Isotope Filter
    ======================================*/
    $(window).load(function() {
        var $container = $('.portfolio-items');
        $container.isotope({
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

    });

  	/*====================================
    CounterUp
    ======================================*/	

	$(document).ready(function( $ ) {
		if($("span.count").length > 0){	
			$('span.count').counterUp({
					delay: 10, // the delay time in ms
			time: 1000 // the speed time in ms
			});
		}
	});
	
  	/*====================================
    Pretty Photo
    ======================================*/
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});


  	/*====================================
    Delete picture with Ajax (form edit Advert)
    ======================================*/
    $('.deleteImgAdvertEdit').click(function(e){
        e.preventDefault();
        var idAdvert = $(this).data('id_advert');
        var idImg = $(this).data('id_img');
        var url_action = $(this).data('url_action');
        var elem = $(this);

        $.ajax({
            method: 'post',
            url: url_action,
            data: {'idAdvert': idAdvert, 'idImg': idImg},
            success: function (response){
                if (response.code === 200){
                    elem.parent().fadeOut();
                } else{
                    console.log(response.msg);
                }

            }
        })
    });

  	/*====================================
    Hide Flash msg after 5sec
    ======================================*/
    window.setTimeout(function() {
        $( '#flashMessage' ).fadeOut( 1750 );
    }, 2250);

}());


}
main();