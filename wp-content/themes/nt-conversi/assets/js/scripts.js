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
        $(this).addClass('active');
        // $('#menu-toggle').toggleClass('active');
    });

    //main page slider
    $('#main-slider').slick();

});