<?php
/*
Template Name: Contacts1
*/

?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-contacts">


    <div id="map"></div>


</div>

<?php get_footer(); ?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjhf_d3_TeR6TBUrAyXaXmEaBJDGt6Mt&callback=initMap"
        type="text/javascript"></script>

<script>
    function initMap() {
        var smarthoop = {lat: 55.7386438, lng: 37.5081432};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            scrollwheel: false,
            draggable: false,
            center: smarthoop,
            disableDefaultUI: true,
            styles: [
                {
                    "featureType": "landscape",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "stylers": [
                        {
                            "hue": "#FFFFFF"
                        },
                        {
                            "saturation": -100
                        },
                        {
                            "gamma": 6
                        },
                        {
                            "lightness": 15
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "lightness": 0
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "lightness": 57
                        }
                    ]
                }
            ]
        });
        var marker = new google.maps.Marker({
            position: uteka,
            icon: {
                // url: "assets/icons/ic_point.svg",
                scaledSize: new google.maps.Size(26, 26),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(0, 0)
            },
            map: map
        });
</script>
