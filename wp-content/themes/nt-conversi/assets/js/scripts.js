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
    $('input[type=file]').inputfile();

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
                $('#successModal').modal('show');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                $('#errorModal').modal('show');
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

    $('.work-gallery').masonry({
        itemSelector : '.gallery-item',
        gutter: 50,
        percentPosition: true
    });

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

    if (window.location.search.match(/form=success/)) {
        $('#successModal').modal('show');
    }
    if (window.location.search.match(/form=error/)) {
        $('#errorModal').modal('show');
    }

    function inifite_loading(action, total, button) {
        if (typeof(action) === 'undefined' || action === null) {
            action = '';
        }
        if (typeof(total) === 'undefined' || total === null) {
            total = 0;
        }
        var domain;
        if (param) {
            domain = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/wp-admin/admin-ajax.php?type=' + param;
        } else {
            domain = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/wp-admin/admin-ajax.php?';
        }
        var url = domain + (window.location.href.split('?').pop() !== window.location.href ? window.location.href.split('?').pop() : '');
        var state = 'inactive';
        var initialLimit = 9;
        var limit = 9;
        var offset = initialLimit;

        var loadButton = button;

        function load_data(offset, limit) {
            if (total === 0) {
                $('.ajax-call').append('<div class="col-12"><h3>Нет данных</h3></div>');
                loadButton.addClass('hidden');
                return;
            }
            if (state === 'active') {
                return;
            }
            $.ajax({
                type: 'GET',
                url: url,
                data: { action : action, offset: offset, limit: limit},
                success: function(data) {
                    if (data.trim() === '') {
                        loadButton.addClass('hidden');
                        state = 'active';
                    } else {
                        $('.ajax-call').append(data);
                        state = 'inactive';
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {
                    if (!offset) {
                        $('.ajax-call').append('<div class="col-12"><h3>'+ errorThrown + '</h3></div>');
                    }
                    state = 'active';
                }
            });
        }

        if (state === 'inactive') {
            load_data(0, initialLimit);
            // state = 'active';
        }

        (function mobile_loading() {
            if (total < initialLimit || total < offset) {
                loadButton.addClass('hidden');
                return;
            }
            loadButton.on('click', function() {
                if (state === 'inactive'
                    && total !== 0) {
                    load_data(offset, limit);
                    state = 'active';
                    offset += limit;
                    if (total < offset + limit) {
                        loadButton.addClass('hidden');
                    }
                }
            });
        })();

    }

    inifite_loading('shivka_WORKSAjax', 18, '.ajax-call-button')

});
