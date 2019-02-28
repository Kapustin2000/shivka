$(document).ready(function() {

    //-------contact form
    $('.tabs-wrap').on('click', '.tab', function() {
        var $this = $(this);
        $this.addClass('active')
            .siblings()
            .removeClass('active');

        $this.parent()
            .siblings('form')
            .removeClass('active')
            .eq($this.index())
            .addClass('active');
    });

    //-------mobile menu
    $('#navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        $('#menu-toggle').toggleClass('active');
    });

    //-------main page slider
    //if slider is active
    var mainSlider = $('#main-slider');
    if (mainSlider.length) {
        mainSlider.slick({
            arrows: false,
            speed: 0,
            autoplay: true,
            autoplaySpeed: 24000
        });
    }

    //if video player is active
    var player = '';
    if (player.length) {
        console.log('player');
    }

    //---
    var relatedSlider = $('#related-slider');
    if (relatedSlider.length) {
        relatedSlider.slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true
        });
    }

    //-------footer form
    $('#subscribe-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1/subscribe',
            data: { action : 'shivka_Subscribe_Save_AJAX', data: $('#subscribe-form').serializeArray()},
            cache: true,
            success: function(data) {
                console.log('success');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })

    //-------order form
    $('#order-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1/contact',
            data: { action : 'shivka_Contact_Save_AJAX', data: $('#order-form').serializeArray()},
            cache: true,
            success: function(data) {
                console.log('success');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    })

    //-------call form
    $('#call-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1/calls',
            data: { action : 'shivka_Calls_Save_AJAX', data: $('#call-form').serializeArray()},
            cache: true,
            success: function(data) {
                console.log('success');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });

    //
    var gallery = $('#gallery');
    if (gallery.length) {
        gallery.magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image'
            // other options
        });
    }


});