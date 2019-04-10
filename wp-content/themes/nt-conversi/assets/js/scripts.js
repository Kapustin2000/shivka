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

});

//file input upload
'use strict';

;( function ( document, window, index )
{
    var files_to_send = [];
    var files_from_back = [];

    // applying the effect for every form
    var forms = document.querySelectorAll( '.box' );
    Array.prototype.forEach.call( forms, function( form )
    {
        var input		 = form.querySelector( 'input[type="file"]' ),
            droppedFiles = false,
            triggerFormSubmit = function()
            {
                var event = document.createEvent( 'HTMLEvents' );
                event.initEvent( 'submit', true, true );
                form.dispatchEvent( event );
            };

        // letting the server side to know we are going to make an Ajax request
        var ajaxFlag = document.createElement( 'input' );
        ajaxFlag.setAttribute( 'type', 'hidden' );
        ajaxFlag.setAttribute( 'name', 'ajax' );
        ajaxFlag.setAttribute( 'value', 1 );
        form.appendChild( ajaxFlag );

        // automatically submit the form on file select
        input.addEventListener( 'change', function( e )
        {
            var files_to_check  = e.target.files;
            var size;
            if(files_to_check.length<10) {
                for (var key in files_to_check) {
                    if (files_to_check[key]['size'] <= 10 * 1024 * 1024) {
                        if (typeof files_to_check[key] === 'object')
                            if(files_to_check.length<10) {
                                files_to_send.push(files_to_check[key]);
                            }else{
                                alert("You can upload only 10 files");
                                break;
                            }
                    } else {
                        delete files_to_check[key];
                    }
                }
                showFiles(files_to_send);
            }else{
                alert("You can upload only 10 files");
            }
        });

        // if the form was submitted
        form.addEventListener( 'submit', function( e )
        {
            // preventing the duplicate submissions if the current one is in progress
            if( form.classList.contains( 'is-uploading' ) ) return false;

            form.classList.add( 'is-uploading' );
            form.classList.remove( 'is-error' );
        });

        // restart the form if has a state of error/success
        Array.prototype.forEach.call( restart, function( entry )
        {
            entry.addEventListener( 'click', function( e )
            {
                e.preventDefault();
                form.classList.remove( 'is-error', 'is-success' );
                input.click();
            });
        });

        // Firefox focus bug fix for file input
        input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
        input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });;

        document.addEventListener("DOMContentLoaded", function(event) {
            $("#files_names").on("click", "button.btn-close", function(){
                var file_key_send =  parseInt($(this).attr('data-item-id'));
                var file_key_back;
                for (var key in files_from_back) {
                    if(files_from_back[key]['name'] == files_to_send[file_key_send]['name']){
                        file_key_back = key;
                    }
                }
                $.ajax({
                    type: 'POST',
                    url:'/wp-json/cv/v1/delete',
                    data:   {files : [files_from_back[file_key_back]]},
                    success: function(data) {
                        delete files_to_send[file_key_send];
                        delete files_from_back[file_key_back];
                        showFiles(files_to_send);
                    },
                    error: function(MLHttpRequest, textStatus, errorThrown) {

                    }
                });
            });

            $('#order-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '/wp-json/blog/v1/contact',
                    data:   {files : files_from_back, data: $('#order-form').serializeArray()},
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
}( document, window, 0 ));
