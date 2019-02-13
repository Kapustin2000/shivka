jQuery(document).ready(function($) {
	'use strict';
	var map;
	map = new window.GMaps({
		div: '#companyMap',
		lat: prefix.lat,
		lng: prefix.lng,
		scrollwheel: false,
		zoomControl: true,
		zoom: 15,
		disableDoubleClickZoom: false,
		disableDefaultUI: true
	});
	map.addMarker({
		lat: prefix.lat,
		lng: prefix.lng,
		title: prefix.markertitle,
		infoWindow: {
			content: prefix.markertitle
		}
	});
	jQuery('.affa-map .btn-collapse').on('click', function(e) {
		if (jQuery(this).hasClass('in')) {
			jQuery(this).removeClass('in').siblings('.map-overlay').fadeIn(100);
		} else {
			jQuery(this).addClass('in').siblings('.map-overlay').fadeOut(100);
		}

		return false;
	});
});
