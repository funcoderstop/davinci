(function ($, root, undefined) {
	$(function () {
		'use strict';

		$( document ).ready(function() {

			$('.menu-toggle').click(function(){
				$(this).toggleClass('toggled');
				$('.main-navigation').toggleClass('toggled');
			});

			//$("#masthead").sticky({topSpacing:0});

			// stiky menu
	        var elSelector      = '.site-header',
	            elClassNarrow   = 'sticky',
	            elNarrowOffset  = 100,
	            elNarrowOffset2 = 140,
	            $element        = $( elSelector );

	        if( !$element.length ) return true;

	        var elHeight        = 0,
	            elTop           = 0,
	            $document       = $( document ),
	            dHeight         = 0,
	            $window         = $( window ),
	            wHeight         = 0,
	            wScrollCurrent  = 0,
	            wScrollBefore   = 0,
	            wScrollDiff     = 0;


	        $window.on( 'scroll', function() {

	            elHeight        = $element.outerHeight();
	            dHeight         = $document.height();
	            wHeight         = $window.height();
	            wScrollCurrent  = $window.scrollTop();
	            wScrollDiff     = wScrollBefore - wScrollCurrent;
	            elTop           = parseInt( $element.css( 'top' ) ) + wScrollDiff;

	            $element.toggleClass( elClassNarrow, wScrollCurrent > elNarrowOffset ); // toggles "narrow" classname

	            if( wScrollCurrent <= 0 ) { // scrolled to the very top; element sticks to the top
	                $element.css( 'top', 0 );
	                //console.log('top');
	            }
	            else if( wScrollDiff > 0 ) { // scrolled up; element slides in
	                $element.css( 'top', elTop > 0 ? 0 : elTop );
	                //console.log('top2');
	            }
	            else if( wScrollDiff < 0 ) // scrolled down
	            {
	                if( wScrollCurrent + wHeight >= dHeight - elHeight ) {  // scrolled to the very bottom; element slides in
	                    //$element.css( 'top', ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 );
	                    //console.log('down1');
	                }
	                else { // scrolled down; element slides out
	                    $element.css( 'top', Math.abs( elTop ) > elHeight ? -elHeight : elTop );
	                    //console.log('down2');

	                    $('.menu-toggle').removeClass('toggled');
	                    $('.main-navigation').removeClass('toggled');
	                }
	            }

	            wScrollBefore = wScrollCurrent;
	        });

			$('.main-navigation .menu > li > .sub-menu').parent().prepend('<i class="la la-plus"></i>');
			$('.main-navigation .menu > li > .sub-menu > li > .sub-menu').parent().prepend('<i class="la la-plus"></i>');
			$('.main-navigation .sub-menu .sub-menu .sub-menu').parent().prepend('<i class="la la-plus"></i>');
			$('.main-navigation i').click(function () {
				$(this).next().next().slideToggle();
				$(this).toggleClass('rotate');

				if($(this).hasClass('rotate')) { 
					$(this).removeClass('la-plus');
				    $(this).addClass('la-minus'); 
				} else {
					$(this).removeClass('la-minus');
					$(this).addClass('la-plus');
				}
			});

			function heightDetect() {
				var h = $(".site-header").outerHeight();
				$(".site-header-wrap").height(h);
			};
			heightDetect();

			$(window).resize(function(){
				heightDetect();
			});

			var owl1 = $( ".slider-home" );
			owl1.owlCarousel({
				items:1,
				loop: true,
				nav:false,
				navText:false,
				smartSpeed: 500,
				//autoplay:true,
		   		autoplayTimeout:4000,
		    	autoplayHoverPause:true 
			});


		});  

		$(window).load(function() {

			$(".article-text").equalHeights();
			$(window).resize(function(){
				$(".article-text").removeAttr("style");
				$(".article-text").equalHeights();
			});

		}); 

});

})(jQuery, this);

