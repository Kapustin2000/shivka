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
    var slider = $('#main-slider');
    if (slider.length) {
        slider.slick({
            prevArrow: '<button type="button" class="slick-prev"> <i class="icon icon-prev"></i> </button>',
            nextArrow: '<button type="button" class="slick-next"> <i class="icon icon-next"></i> </button>'
        });
    }
    //if video player is active
    var player = '';
    if (player.length) {
        console.log('player');
    }


    //-------footer form
    $('#subscribe-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/wp-json/blog/v1',
            data: { action : 'shivka_Subscribe_Save_AJAX', data: $('#subscribe-form').serializeArray()},
            cache: true,
            success: function(data) {
                alert('success');
            },
            error: function(MLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    })

});