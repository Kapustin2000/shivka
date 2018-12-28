jQuery(document).ready(function($) {
    "use strict";  

	// Slider with SliderPro & Slick carousel
		// Testimonials carousel
		jQuery('.carousel-slider.affa-testimonials-carousel').slick({
			arrows: false,
			dots: true,
			speed: 300,
			draggable: false,
			autoplay: true,
			autoplaySpeed: 5000,
			infinite: true
		});

		// General slider
		jQuery('.carousel-slider.general-slider').slick({
			dots: true,
			speed: 300,
			adaptiveHeight: true,
			draggable: false,
			responsive: [{
				breakpoint: 768,
				settings: {
					draggable: true
				}
			}]
		});

		jQuery('.carousel-slider.general-slider').on('afterChange', function() {
			jQuery(window).trigger('resize.px.parallax');
		});

});