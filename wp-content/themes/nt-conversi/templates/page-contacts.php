<?php
/*
Template Name: Contacts
*/

?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-contacts">
    <section class="contacts">
        <div class="container">
            <div class="row">
                <div class="address-wrap">
                    <div class="bordered">
                        <h1>
                            <span>&nbsp;контакты&nbsp;</span>
                        </h1>
                        <div class="address active">
                            <h2>Оптовые заказы</h2>
                            <p>
                                г. Киев</br>
                                ул.Выборгская, 94</br>
                                С 10:00 до 19:00 (звоните предварительно)</br>
                                Понедельник - Пятница</br>
                                Тел: <a href="tel:+380677516622">067 751 66 22</a> Viber/WhatsApp, <a href="tel:+380667734186">066 773 41 86</a></br>
                                E-mail: <a href="maito:smarthoop3@gmail.com">smarthoop3@gmail.com</a>
                            </p>
                            <button type="button" class="btn btn-primary">смотреть на карте</button>
                        </div>
                        <div class="address">
                            <h2>Индивидуальные</br>
                                заказы</h2>
                            <p>
                                г.Белая Церквь</br>
                                ул.Вокзальная, 4</br>
                                С 10:00 до 19:00 (звоните предварительно)</br>
                                Понедельник - Пятница</br>
                                Тел: <a href="tel:+380968809206">096 880 92 06</a> Viber/WhatsApp</br>
                                E-mail: <a href="maito:smarthoop3@gmail.com">smarthoop3@gmail.com</a>
                            </p>
                            <button type="button" class="btn btn-primary">смотреть на карте</button>
                        </div>
                    </div>
                </div>
                <div class="map-wrap">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGHIzFkeSM83BA844RfaaPvhwG-E8JtnY&callback=initMap"
        type="text/javascript"></script>

<script>
    function initMap() {
        var smarthoop1 = {lat: 50.4518438, lng: 30.4219243};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            scrollwheel: false,
            draggable: false,
            center: smarthoop1,
            disableDefaultUI: true,
            styles: [
                {
                    "featureType": "landscape",
                    "elementType": "labels",
                    "stylers": [
                        {
                            // "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels",
                    "stylers": [
                        {
                            // "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [
                        {
                            // "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            // "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            // "visibility": "off"
                        }
                    ]
                },
                {
                    "stylers": [
                        {
                            // "hue": "#FFFFFF"
                        },
                        {
                            // "saturation": -100
                        },
                        {
                            // "gamma": 6
                        },
                        {
                            // "lightness": 15
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            // "visibility": "on"
                        },
                        {
                            // "lightness": 0
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            // "lightness": 57
                        }
                    ]
                }
            ]
        });
        var marker = new google.maps.Marker({
            position: smarthoop1,
            icon: {
                // url: "assets/icons/ic_point.svg",
                scaledSize: new google.maps.Size(26, 26),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 0)
            },
            map: map
        });
    }

    $(document).ready(function () {
        initMap();
    });
</script>
