<?php
/*
Template Name: Career - view
*/

$id = hys_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('vacancies')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        hys_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>


    <section id="blog" class="career-view">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="/career" class="btn btn-back transparent">
                            <i class="icon icon-arrow-short"></i>
                            <span>Back to Vacancies</span>
                        </a>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <?php
                                if($found){ { $id = $data->display( 'id' ); ?>
                                <div class="vacancy-title">
                                    <h2><?php echo $data->display('position')?></h2>
                                    <div class="vacancy-info">
                                        <a href="#" class="tag outline"><?php echo $data->display( 'vacancies_type' );?></a>
                                    <span class="date">
                                        <?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?>
                                    </span>
                                    <span class="location">
                                        <i class="icon icon-location"></i>
                                        <b><?php echo $data->display('city')?></b>
                                    </span>
                                    </div>
                                </div>
                                <div class="content-editable">
                                    <h3>About project</h3>
                                    <?php echo $data->display('post_content')?>

                                    <h3>Requirements</h3>
                                    <?php echo $data->display('responsibilities')?>

                                    <h3>Would Be a Plus</h3>
                                    <?php echo $data->display('would_be_a_plus')?>

                                    <h3>We Offer</h3>
                                    <?php echo $data->display('company_offers')?>
                                </div>
                            </div>
                            <div class="sticky col-md-6 col-xs-12">
                                <h3>Contact HR</h3>
                                <?php
                                if(isset($data->field('hr')['ID'])){ $hr_id =  $data->field('hr')['ID'];
                                    $hr = pods('hr')->find(array('limit' => 1, 'where' => 't.id = '.$data->field('hr')['ID']));
                                    while ( $hr->fetch() ) { ?>
                                        <div class="contact-type">
                                            <b>Mail</b> <a href="mailto:<?php echo $hr->display('email')?>" class="blue"><?php echo $hr->display('email')?></a>
                                        </div>
                                        <div class="contact-type">
                                            <b>Skype</b> <a href="skype:<?php echo $hr->display('skype_link'); ?>?userinfo" class="blue"><?php echo $hr->display('skype_link'); ?></a>
                                        </div>
                                    <?php } ?>
                                <?php    }   ?>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-wrap col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <form action="#" id="cv-form" class="contact-form" enctype="multipart/form-data" method="post" name="fileinfo" novalidate>
                                    <input type="hidden" name="hr_id" value="<?php echo ( isset($hr_id) ? $hr_id : '') ?>">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group form-group-floating">
                                                <input type="text" id="full_name" name="full_name" required>
                                                <label for="full_name">Your Name</label>
                                                <div class="error-tooltip">
                                                    <div class="icon icon-question"></div>
                                                    <div class="tooltip"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-floating">
                                                <input type="text" id="email" name="email" data-unvalid="Valid email required" required>
                                                <label for="email">Your Email</label>
                                                <div class="error-tooltip">
                                                    <div class="icon icon-question"></div>
                                                    <div class="tooltip"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-floating">
                                                <input type="text" id="phone" name="phone" required>
                                                <label for="phone">Phone, Skype, Linkedin</label>
                                                <div class="error-tooltip">
                                                    <div class="icon icon-question"></div>
                                                    <div class="tooltip"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-floating">
                                                <textarea name="message" id="message" rows="1"></textarea>
                                                <label for="message">Message</label>
                                                <div class="error-tooltip">
                                                    <div class="icon icon-question"></div>
                                                    <div class="tooltip"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group checkbox-wrap">
                                                <label>
                                                    <input type="checkbox" id="marketing">
                                                    <label for="marketing"></label>
                                                    <span>
                                     I want to receive commercial communications and marketing information from HYS Enterpise
                                </span>
                                                </label>
                                                <div class="error-tooltip">
                                                    <div class="icon icon-question"></div>
                                                    <div class="tooltip"></div>
                                                </div>
                                            </div>
                                            <div class="submit-wrap">
                                                <button type="submit" class="btn blue">Apply CV</button>
                                                <div class="form-message"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="box-wrap col-md-6 col-xs-12">
                                <form method="post" action="/wp-json/cv/v1/save" enctype="multipart/form-data" novalidate class="box">
                                    <div class="box__input">
                                        <i class="icon icon-arrow-long"></i>
                                        <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files uploaded" multiple />
                                        <label for="file"><strong>Drag & Drop CV Here</strong></label>
                                        <button type="submit" class="box__button">Upload</button>
                                    </div>
                                    <div class="box__uploading">Uploading&hellip;</div>
                                    <div class="box__success">
                                        <div class="success">
                                            <i class="icon icon-success"></i>
                                        </div>
                                    </div>
                                    <div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?" class="box__restart" role="button">Try again!</a></div>
                                </form>
                                <div class="files-wrap" id="files_names"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>

        'use strict';

        ;( function ( document, window, index )
        {
            var files_to_send = [];
            var files_from_back = [];
            // feature detection for drag&drop upload
            var isAdvancedUpload = function()
            {
                var div = document.createElement( 'div' );
                return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
            }();


            // applying the effect for every form
            var forms = document.querySelectorAll( '.box' );
            Array.prototype.forEach.call( forms, function( form )
            {
                var input		 = form.querySelector( 'input[type="file"]' ),
                    label		 = form.querySelector( 'label' ),
                    errorMsg	 = form.querySelector( '.box__error span' ),
                    restart		 = form.querySelectorAll( '.box__restart' ),
                    droppedFiles = false,
                    showFiles	 = function( files )
                    {
                        uploadEffects();
                        var count=0;
                        for (var key in files){
                            count++;
                        }
                        label.textContent = count > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', count ) : (files[ 0 ] ? files[ 0 ].name : "Drag & Drop CV Here");
                        setTimeout(function(){
                            var files_names = $('#files_names');
                            files_names.html('');
                            var files_list = '';
                            for (var key in files) {
                                files_list += '<div class="file-item"><i class="icon icon-clip"></i><strong >'+files[key]['name']+'<button data-item-id="'+key+'" type="button" class="btn-icon btn-close transparent"><i class="icon icon-cross"></i></strong></button></div>';
                            }
                            files_names.append(files_list);
                            $(window).on('resize', function() {
                                responsive_form();
                            });
                            responsive_form();
                            function responsive_form() {
                                var checkbox = $('.checkbox-wrap');
                                var checkboxMargin = '210px';
                                if ($(window).width() < 975) {
                                    checkbox.css('margin-top', (parseInt(checkboxMargin) + parseInt(files_names.outerHeight())) + 'px');
                                } else {
                                    checkbox.css('margin-top', '0');
                                }
                            }
                        }, 2000);

                    },
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
                    for (var key in files_to_check) {
                        if(files_to_check[key]['size']  <=10*1024*1024){
                            if(typeof files_to_check[key] === 'object')
                                files_to_send.push(files_to_check[key]);
                        }else{
                            delete files_to_check[key];
                        }
                    }
                    showFiles( files_to_send );
                });

                // drag&drop files if the feature is available
                if( isAdvancedUpload )
                {
                    form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

                    [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
                    {
                        form.addEventListener( event, function( e )
                        {
                            // preventing the unwanted behaviours
                            e.preventDefault();
                            e.stopPropagation();
                        });
                    });
                    [ 'dragover', 'dragenter' ].forEach( function( event )
                    {
                        form.addEventListener( event, function()
                        {
                            form.classList.add( 'is-dragover' );
                        });
                    });
                    [ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
                    {
                        form.addEventListener( event, function()
                        {
                            form.classList.remove( 'is-dragover' );
                        });
                    });
                    form.addEventListener( 'drop', function( e )
                    {
                        droppedFiles = e.dataTransfer.files; // the files that were dropped
                        var size;
                        for (var key in droppedFiles) {
                            if(droppedFiles[key]['size']  <=10*1024*1024){
                                if(typeof droppedFiles[key] === 'object')
                                    files_to_send.push(droppedFiles[key]);
                            }else{
                                delete droppedFiles[key];
                            }
                        } 
                        showFiles( files_to_send );
                        uploadEffects();
                        triggerFormSubmit();

                    });
                }


                // if the form was submitted
                form.addEventListener( 'submit', function( e )
                {
                    // preventing the duplicate submissions if the current one is in progress
                    if( form.classList.contains( 'is-uploading' ) ) return false;

                    form.classList.add( 'is-uploading' );
                    form.classList.remove( 'is-error' );

                    if( isAdvancedUpload ) // ajax file upload for modern browsers
                    {
                        e.preventDefault();

                        // gathering the form data
                        var ajaxData = new FormData( form );
                        if (!ajaxData.get('files[]')) {
                            ajaxData.delete('files[]');
                        }
                        if( droppedFiles )
                        {
                            Array.prototype.forEach.call( droppedFiles, function( file )
                            {
                                ajaxData.append( input.getAttribute( 'name' ), file );
                            });
                        }

                        // ajax request
                        var ajax = new XMLHttpRequest();
                        ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );

                        ajax.onload = function()
                        {
                            form.classList.remove( 'is-uploading' );
                            if( ajax.status >= 200 && ajax.status < 400 )
                            {
                                var data = JSON.parse( ajax.responseText );
                                if(data ){
                                    files_from_back = $.merge( files_from_back, data );
                                }
                            }
                            else alert( 'Error. Please, contact the webmaster!' );
                        };

                        ajax.onerror = function()
                        {
                            form.classList.remove( 'is-uploading' );
                            alert( 'Error. Please, try again!' );
                        };

                        ajax.send( ajaxData );
                    }
                    else // fallback Ajax solution upload for older browsers
                    {
                        var iframeName	= 'uploadiframe' + new Date().getTime(),
                            iframe		= document.createElement( 'iframe' );

                        $iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

                        iframe.setAttribute( 'name', iframeName );
                        iframe.style.display = 'none';

                        document.body.appendChild( iframe );
                        form.setAttribute( 'target', iframeName );

                        iframe.addEventListener( 'load', function()
                        {
                            var data = JSON.parse( iframe.contentDocument.body.innerHTML );
                            form.classList.remove( 'is-uploading' )
                            form.classList.add( data.success == true ? 'is-success' : 'is-error' )
                            form.removeAttribute( 'target' );
                            if( !data.success ) errorMsg.textContent = data.error;
                            iframe.parentNode.removeChild( iframe );
                        });
                    }
                });

                function uploadEffects() {
                    var input = document.querySelector('.box__input');
                    var uploading = document.querySelector('.box__uploading');
                    var success = document.querySelector('.box__success');

                    input.style.display = 'none';
                    uploading.style.display = 'block';
                    setTimeout(function(){
                        uploading.style.display = 'none';
                        success.classList.add('visible');
                    }, 1000);
                    setTimeout(function(){
                        success.classList.remove('visible');
                    }, 2000);
                    setTimeout(function(){
                        input.style.display = 'flex';
                    }, 2000);
                }


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
                    $('#cv-form').submit(function () {
                        var form = $(this);
                        $.ajax({
                            type: 'POST',
                            url:'/wp-json/cv/v1/send',
                            data:   {files : files_from_back, data: $('#cv-form').serializeArray()},
                            success: function(data) {
                                form.trigger('reset')
                                    .find('.form-message')
                                    .removeClass('error-message hidden')
                                    .addClass('success-message')
                                    .html('Message has been sent.</br>We’ll contact you as soon as possible');
                                form.find('.form-group-floating').removeClass('active');
                                form.find('[type="submit"]').removeAttr('disabled');
                                setTimeout(function() {
                                    form.find('.form-message').addClass('hidden');
                                }, 5000);
                            },
                            error: function(MLHttpRequest, textStatus, errorThrown) {
                                if (errorThrown.trim() === '') {
                                    errorThrown = 'Sorry, your message cannot be sent. Please try again';
                                }
                                form.find('.form-message')
                                    .removeClass('success-message hidden')
                                    .addClass('error-message')
                                    .html(errorThrown);
                                form.find('[type="submit"]').removeAttr('disabled');
                                setTimeout(function() {
                                    form.find('.form-message').addClass('hidden');
                                }, 5000);
                            }
                        });
                        return false;
                    });
                });
            });
        }( document, window, 0 ));

    </script>
<?php get_footer(); ?>