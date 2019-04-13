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

    //-------file form
    $('.service-select').select2();
    // $('input[type=file]').inputfile();

    //
    $('#see-more').on('click', function() {
        $("html, body").animate({ scrollTop: $('#common-service-description').offset().top }, 1000);
    });

    //-------mobile menu
    $('#navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        $('#menu-toggle').toggleClass('active');
    });

    //
    $('.has-submenu').on('mouseenter', function() {
        var $this = $(this);
        $('.menu-toggle').css({
            'width': '41.66667vw'
        });
        setTimeout(function() {
            $this.children('.submenu').fadeIn();
        }, 300);
    }).on('mouseleave', function() {
        var $this = $(this);
        $('.menu-toggle').css({
            'width': 'calc(41.66667vw - 24vw)'
        });
        $this.children('.submenu').fadeOut();
    });

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
            arrowPrev: '<button> < </button>',
            arrowNext: '<button> > </button>'
            // responsive: [
            //     {
            //         breakpoint: 576,
            //         settings: {
            //             slidesToShow: 1
            //         }
            //     }
            // ]
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
    });

    //-------order form
    // $('#order-form').on('submit', function(e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/wp-json/blog/v1/contact',
    //         data: { action : 'shivka_Contact_Save_AJAX', data: $('#order-form').serializeArray()},
    //         cache: true,
    //         success: function(data) {
    //             console.log('success');
    //         },
    //         error: function(MLHttpRequest, textStatus, errorThrown) {
    //             console.log(errorThrown);
    //         }
    //     });
    // });

    //-------call form
    $('#call-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1/calls',
            data: { action : 'shivka_Calls_Save_AJAX', data: $('#call-form').serializeArray()},
            cache: true,
            success: function(data) {
                $('#successModal').modal('show');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                $('#errorModal').modal('show');
            }
        });
    });

    //
    var gallery = $('#gallery');
    gallery.find('a').each(function(e) {
        e.preventDefault();
    });
    // if (gallery.length) {
    //     gallery.magnificPopup({
    //         delegate: 'a', // child items selector, by clicking on it popup will open
    //         type: 'image'
    //         // other options
    //     });
    // }

    var fileCollection = [];

    $('.fileinput').each(function() {
        $(this).on('change', function(e) {

            var files = e.target.files;
            $.each(files, function(i, file) {
                fileCollection.push(file);
            });

            console.log(fileCollection);
        });
    });

    $('.order-form-js').each(function() {
        $(this).submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/wp-json/blog/v1/contact',
                data:   {files : fileCollection, data: $('#order-form').serializeArray()},
                success: function(data) {
                    $('#successModal').modal('show');
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {
                    $('#errorModal').modal('show');
                }
            });
            return false;
        });
    });



});

