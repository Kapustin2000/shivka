<?php
/*
Template Name: Contacts
*/

$settings  = pods('website_settings')->find();
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
<!--                        num1 0677516622-->
<!--                        num2 0667734186-->
<!--                        num3 0968809206-->
                        <div class="address active">
                            <h2>Оптовые заказы</h2>
                            <p>
                                <?=$settings->display('wholesale_city')?></br>
                                <?=$settings->display('wholesale_street')?></br>
                                <?=$settings->display('wholesale_working_hours')?></br>
                                <?=$settings->display('wholesale_working_days')?></br>
                                Тел: <a href="tel:+380<?=$settings->display('wholesale_number')?>"><?=$settings->display('wholesale_number')?></a> Viber/WhatsApp, <a href="tel:+380667734186">0667734186</a></br>
                                E-mail: <a href="maito:<?=$settings->display('wholesale_emaal')?>"><?=$settings->display('wholesale_email')?></a>
<!--                                --><?//=$settings->display('wholesale_latitude')?>
<!--                                --><?//=$settings->display('wholesale_longitude')?>
                            </p>
<!--                            <button type="button" class="btn btn-primary">смотреть на карте</button>-->
                        </div>
                        <div class="address">
                            <h2>Индивидуальные</br>
                                заказы</h2>
                            <p>
                                <?=$settings->display('individual_city')?></br>
                                <?=$settings->display('individual_street')?></br>
                                <?=$settings->display('individual_working_hours')?></br>
                                <?=$settings->display('individual_working_days')?></br>
                                Тел: <a href="tel:+380<?=$settings->display('individual_number')?>"><?=$settings->display('individual_number')?></a> Viber/WhatsApp</br>
                                E-mail: <a href="maito: <?=$settings->display('individual_email')?>"> <?=$settings->display('individual_email')?></a>
<!--                                --><?//=$settings->display('individually_latitude')?>
<!--                                --><?//=$settings->display('individually_longitude')?>
                            </p>
<!--                            <button type="button" class="btn btn-primary">смотреть на карте</button>-->
                        </div>
                    </div>
                </div>
                <div class="map-wrap">
                    <iframe src="http://maps.google.com.ua/maps/ms?msa=0&amp;msid=206958626610732093873.0004bfb616afe71fccbd8&amp;gl=ua&amp;ie=UTF8&amp;t=m&amp;ll=50.185692,30.349731&amp;spn=0.879324,1.974792&amp;z=9&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="100%"></iframe><br /><small>Просмотреть <a style="color: #0000ff; text-align: left;" href="http://maps.google.com.ua/maps/ms?msa=0&amp;msid=206958626610732093873.0004bfb616afe71fccbd8&amp;gl=ua&amp;ie=UTF8&amp;t=m&amp;ll=50.185692,30.349731&amp;spn=0.879324,1.974792&amp;z=9&amp;source=embed">SmartHoop</a> на карте большего размера</small>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGHIzFkeSM83BA844RfaaPvhwG-E8JtnY&callback=initMap"-->
<!--        type="text/javascript"></script>-->
<!---->
<!--<script>-->
<!--    $('.address').on('click', function() {-->
<!---->
<!--    });-->
<!--    function initMap() {-->
<!--        var smarthoop1 = {lat: 50.4518438, lng: 30.4219243};-->
<!--        //lat 49.8078275-->
<!--        //lng 30.1015346-->
<!--        var map = new google.maps.Map(document.getElementById('map'), {-->
<!--            zoom: 17,-->
<!--            scrollwheel: false,-->
<!--            draggable: false,-->
<!--            center: smarthoop1,-->
<!--            disableDefaultUI: true,-->
<!--            styles: [-->
<!--                {-->
<!--                    "featureType": "landscape",-->
<!--                    "elementType": "labels",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "off"-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "transit",-->
<!--                    "elementType": "labels",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "off"-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "poi",-->
<!--                    "elementType": "labels",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "off"-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "water",-->
<!--                    "elementType": "labels",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "off"-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "road",-->
<!--                    "elementType": "labels.icon",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "off"-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "hue": "#FFFFFF"-->
<!--                        },-->
<!--                        {-->
<!--                            // "saturation": -100-->
<!--                        },-->
<!--                        {-->
<!--                            // "gamma": 6-->
<!--                        },-->
<!--                        {-->
<!--                            // "lightness": 15-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "road",-->
<!--                    "elementType": "labels.text.fill",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "visibility": "on"-->
<!--                        },-->
<!--                        {-->
<!--                            // "lightness": 0-->
<!--                        }-->
<!--                    ]-->
<!--                },-->
<!--                {-->
<!--                    "featureType": "road",-->
<!--                    "elementType": "geometry",-->
<!--                    "stylers": [-->
<!--                        {-->
<!--                            // "lightness": 57-->
<!--                        }-->
<!--                    ]-->
<!--                }-->
<!--            ]-->
<!--        });-->
<!--        var marker = new google.maps.Marker({-->
<!--            position: smarthoop1,-->
<!--            icon: {-->
<!--                // url: "assets/icons/ic_point.svg",-->
<!--                scaledSize: new google.maps.Size(26, 26),-->
<!--                origin: new google.maps.Point(0, 0),-->
<!--                anchor: new google.maps.Point(0, 0)-->
<!--            },-->
<!--            map: map-->
<!--        });-->
<!--    }-->
<!---->
<!--    $(document).ready(function () {-->
<!--        initMap();-->
<!--    });-->
<!--</script>-->
