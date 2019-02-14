$(document).ready(function() {

    //contact form
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

    //mobile menu
    $('#navbar-toggler').on('click', function() {
        $(this).toggleClass('active');
        // $('#menu-toggle').toggleClass('active');
    });

    //main page slider
    $('#main-slider').slick({
        prevArrow: '<button type="button" class="slick-prev"> <i class="icon icon-prev"></i> </button>',
        nextArrow: '<button type="button" class="slick-next"> <i class="icon icon-next"></i> </button>'
    });

});