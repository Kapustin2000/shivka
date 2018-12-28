(function($) {
	
	'use strict';
	
	// wp primary menu fix
	jQuery('#primary-menu').appendTo('#header #navigation .container');
	jQuery(window).scroll(function() {

		if (jQuery(this).scrollTop()>0)
		 {
			jQuery('#primary-menu .item-has-children').removeClass('open');
		 }
		if (jQuery(this).scrollTop()<100)
		 {
			jQuery('#primary-menu-affix .item-has-children').removeClass('open');
		 }
	 });
	
	var Conversi = {
		
		// Initialization the functions
		init: function() {
			Conversi.AffixMenu();
			Conversi.MobileMenu();
			Conversi.ScrollSpy();
			Conversi.SmoothScroll();
			Conversi.PlaceHolder();
			jQuery(window).on('load', function() {
				Conversi.Preload();
			});
		},
		
		// Navigation menu affix
		AffixMenu: function() {


			jQuery('#navigation').waypoint(function() {
				jQuery('#navigation_affix').removeClass('show');
			}, {
				offset: -120
			});
			
			jQuery('#navigation').waypoint(function() {
				jQuery('#navigation_affix').addClass('show');
			}, {
				offset: -121
			});
		},
		
		// Add mobile navigation
		MobileMenu: function() {

			jQuery('.nav-menu-toggle').on('click', function() {
				jQuery(this).parent('.nav-menu-button').prev('.nav-menu-links').slideToggle(300, function() {
					jQuery(window).trigger('resize.px.parallax');
				});
			});
		},

		// Navigation menu scrollspy to anchor section
		ScrollSpy: function() {
			jQuery('body').scrollspy({
				target: '#navigation_affix.scrollspy',
				offset: parseInt(jQuery('#navigation_affix.scrollspy').height(), 0)
			});
		},

		// Smooth scrolling to anchor section
		SmoothScroll: function() {
			jQuery('a.smooth-scroll').on('click', function(event) {
				var $anchor		= jQuery(this);
				var offsetTop	= '';
				var elemHeight	= parseInt(jQuery('#navigation_affix').height() - 1, 0);
				
				if (window.Response.band(768)) {
					offsetTop = parseInt(jQuery($anchor.attr('href')).offset().top - elemHeight, 0);
				} else {
					offsetTop = parseInt(jQuery($anchor.attr('href')).offset().top, 0);
				}
				
				jQuery('html, body').stop().animate({
					scrollTop: offsetTop
				}, 1500,'easeInOutExpo');
				
				event.preventDefault();
			});
		},

		// Placeholder compatibility for IE8
		PlaceHolder: function() {
			jQuery('input, textarea').placeholder();
		},


		// Preload function after images loaded
		Preload: function() {
			jQuery('img.parallax-slider').imgpreload({
				all: function() {
					jQuery('img.parallax-slider').addClass('loaded');
				}
			});
			
			jQuery('.bg-img-base').addClass('in');
		},

	};
	
	// Run the main function
	jQuery(function() {
		Conversi.init();
	});
	
})(window.jQuery);
