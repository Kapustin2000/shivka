(function($) {
	
	'use strict';
	
	var Conversi = {
		
		// Initialization the functions
		init: function() {
			Conversi.FitVids();
			Conversi.Lightbox();
		},

		// Responsive video size
		FitVids: function() {
			jQuery('body').fitVids();
		},

		// Preview images popup gallery with Fancybox
		Lightbox: function() {
			jQuery('.fancybox').fancybox({
				loop: false
			});
			
			jQuery('.fancybox-media').attr('rel', 'media-gallery').fancybox({
				openEffect: 'none',
				closeEffect: 'none',
				prevEffect: 'none',
				nextEffect: 'none',
				arrows: false,
				helpers: {
					title: null,
					media: {},
					buttons : {}
				}
			});
		},

	};
	
	// Run the main function
	jQuery(function() {
		Conversi.init();
	});
	
})(window.jQuery);
