/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($) {
	$(window).on("resize", function(){
		$("#slideshow").css({ 'height' : $(window).height()});
	});
	
	$(window).load(function () {
		$(window).stellar({
			parallaxBackgrounds: true
		});
	});
	
	$(window).scroll(function() {
		var top = $(window).scrollTop();
		if (top == 0) {
			$('body').removeClass('scrolled');
		} else {
			$('body').addClass('scrolled');
		}
		
		($(window).scrollTop() > 300 ) ? $('#scroll-up').addClass('is-visible') : $('#scroll-up').removeClass('is-visible');
	});

	$(document).ready(function() {
		
		$("#slideshow").css({ 'height' : $(window).height()});
		
		topMenu = $(".header-bottom"); 
		topMenuHeight = topMenu.outerHeight();
		menuItems = $(".navigation ul.nav > li > a");
		//alert(topMenuHeight);

		menuItems.click(function(e){ 
			$(".navigation ul.nav > li").removeClass('active');
			$(this).parent().addClass('active');
			var href = $(this).attr("href"),
			    offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+12;
			$('html, body').stop().animate({ 
				scrollTop: offsetTop},{
				duration: 500, 
				easing: 'easeOutCubic',
				complete: window.reflow
			});
			e.preventDefault();
		});

		$('#scroll-down').click(function(e){
			e.preventDefault();
			$('html, body').stop().animate({	
				scrollTop: $('.wrap').offset().top-topMenuHeight+12 
			},800)
			return false;
		});	
		
		$('#scroll-up').click(function(e){
			e.preventDefault();
			$('html, body').stop().animate({	
				scrollTop: 0 
			},800)
			return false;
		});	
		
		$('.fancybox').fancybox({
			closeBtn : false,
			afterLoad: function() {
				$('<a href="javascript:;" class="fancybox-close" title="Close">x</a>').appendTo('.fancybox-overlay');
			},
			afterShow : function() {
				$('.fancybox-close').click(function() {
					$.fancybox.close();
				})
			}
		});
	
	});
})(jQuery);