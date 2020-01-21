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
    $('.service-select:not(#type)').select2();

    if ($('#type').length) {
        $('#type').removeClass("hidden").on("change", function() {
            var t, e = $(this);
            t = -1 < window.location.href.indexOf("?") ? "&" + e.attr("id") + "=" + e.val() : "?" + e.attr("id") + "=" + e.val(),
                window.location.href = window.location.href + t
        }).select2();
    }

    //
    $('#see-more').on('click', function() {
        $("html, body").animate({ scrollTop: $('#common-service-description').offset().top }, 1000);
    });

    //-------mobile menu
    $('#navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        $('#menu-toggle').toggleClass('active');
    });

    $('#mobile-navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        $('#mobile-menu-toggle').toggleClass('active');
    });

    //

    function submenuWidthCalc(width, submenuWidth) {
        $('.has-submenu').on('mouseenter', function() {
            var $this = $(this);
            $('.menu-toggle').css({
                'width': width
            });
            setTimeout(function() {
                $this.children('.submenu').fadeIn();
            }, 300);
        }).on('mouseleave', function() {
            var $this = $(this);
            $('.menu-toggle').css({
                'width': 'calc(' + width + ' '+ submenuWidth +')' //- 24vw
            });
            $this.children('.submenu').fadeOut();
        });
    }

    if ($(window).width() > 1024) {
        submenuWidthCalc('41.66667vw', '- 24vw');
    }

    if ($(window).width() > 768 && $(window).width() <= 1024) {
        submenuWidthCalc('66.66667vw', '- 40vw');
    }

    $(window).on('resize', function() {
        if ($(window).width() > 1024) {
            submenuWidthCalc('41.66667vw', '- 24vw');
        }

        if ($(window).width() > 768 && $(window).width() <= 1024) {
            submenuWidthCalc('66.66667vw', '- 40vw');
        }
    });

    $('.js-submenu').on('click', function() {
        var $this = $(this);
        $this.toggleClass('active').siblings().removeClass('active');
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
            arrowNext: '<button> > </button>',
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    $('#services-carousel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true
    });

    (function( ele, frame, step ) {
        var stp = step || 1;
        var $item = $(ele).children();
        var w = 0 ;
        $item.each(function () {
            w += $(this).width();
        });

        $(ele).html( $(ele).html() + $(ele).html() );

        var $items = $(ele);

        var temp = 0;
        function move() {
            if( temp > w ){
                temp = 0
            } else {
                temp = temp + stp ;
            }
            $items.scrollLeft( temp );
        }

        setInterval(move , 1000/frame);
    })('#marquee', 40, 1);

    $('.smarthoop-blog').find('.select2-results__option').css('background', '#cdcfe9');

    //-------footer form
    $('#subscribe-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1/subscribe',
            data: { action : 'shivka_Subscribe_Save_AJAX', data: $('#subscribe-form').serializeArray()},
            cache: true,
            success: function(data) {
                $('#successSubscribeModal').modal('show');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                $('#errorModal').modal('show');
            }
        });
    });

    function phoneLink() {
        if ($(window).width() > 768) {
            $('.phone-link').on('click', function(event) {
                event.preventDefault();
            });
        }
    }

    $(window).on('resize', function() {
        phoneLink();
    });
    phoneLink();

    $('#js-address-next').on('click', function() {
       if ($('.address-wrap').length) {
           console.log('lol');
           $('.address-wrap').find('.address.active').removeClass('active').siblings().addClass('active');
       }
    });

    //-------call form
    $('.call-form').each(function() {
        $(this).on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/wp-json/blog/v1/calls',
                data: { action : 'shivka_Calls_Save_AJAX', data: $(this).serializeArray()},
                cache: true,
                success: function(data) {
                    $('#successModal').modal('show');
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {
                    $('#errorModal').modal('show');
                }
            });
        });
    });

    var gallery = $('.work-gallery');
    gallery.imagesLoaded(function() {
        gallery.masonry({
            columnWidth : '.gallery-item',
            itemSelector : '.gallery-item'
        });
    });

    var fileCollection = [];

    $('.fileinput').each(function() {
        $(this).on('change', function(e) {
            var files = e.target.files;
            $.each(files, function(i, file) {
                fileCollection.push(file);
            });
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
        var domain = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/wp-admin/admin-ajax.php?';
        var url = domain + (window.location.href.split('?').pop() !== window.location.href ? window.location.href.split('?').pop() : '');
        var state = 'inactive';
        var initialLimit = 9;
        var limit = 9;
        var offset = initialLimit;
        var loadButton = button;
        var containerHeight = $('.see-more').parent().height();

        if (state === 'inactive') {
            load_data(0, initialLimit);
        }

        function load_data(offset, limit, posY) {
            if (total === 0) {
                loadButton.addClass('hidden');
                return;
            }
            if (state === 'active') {
                return;
            }
            var posY = posY || undefined;
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
                    if (total <= offset + limit) {
                        loadButton.addClass('hidden');
                    }
                    if (posY) {
                        document.body.scrollTop = posY;
                        // document.body.scrollTop = $('.see-more').parent().height() - containerHeight;
                        // containerHeight = $('.see-more').parent().height();
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

        if (total < initialLimit || total < offset) {
            loadButton.addClass('hidden');
        }

        loadButton.on('click', function() {
            var posY = document.body.scrollTop;
            if (total <= offset + limit) {
                loadButton.addClass('hidden');
            }
            if (state === 'inactive'
                && total !== 0) {
                load_data(offset, limit, posY);
                state = 'active';
                offset += limit;
            }
        });

    }

    var callServicesButton = $('#services-ajax');
    inifite_loading('shivka_SERVICESAjax', callServicesButton.attr('data-total'), callServicesButton);

    var callWorksButton = $('#works-ajax');
    inifite_loading('shivka_WORKSAjax', callWorksButton.attr('data-total'), callWorksButton);

    var callWorksCategoryButton = $('#works-category-ajax');
    inifite_loading('shivka_WORKSCATEGORYAjax', callWorksCategoryButton.attr('data-total'), callWorksCategoryButton);

});
