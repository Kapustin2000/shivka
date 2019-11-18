<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */
$settings  = pods('website_settings')->find();
?>
<?php

$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'offset' => shivka_offset(9),
);
$services = pods('services')->find($params);

?>
<section class="make-order">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="decorative yellow"></div>
                <div class="decorative background">
                </div>
            </div>
            <div class="col-12">
                <div class="form-wrap">
                    <div class="form-inner-wrap">
                        <h2>Хотите узнать стоимость услуги или сделать заказ?</h2>
                        <p>Свяжитесь с нами удобным для вас способом:</p>
                    </div>
                    <div class="tabs-wrap yellow">
                        <button type="button" class="tab active">
                            <span>Написать</span>
                        </button>
                        <button type="button" class="tab">
                            <span>Заказать звонок</span>
                        </button>
                    </div>
                    <form action="?form=success" class="active" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="email" placeholder="E-mail*" required name="email">
                                <input type="text" id="phone" placeholder="Телефон" name="phone">
                                <select class="service-select" name="service_name">
                                   <option value="0" selected>Вид услуги</option>
                                   <?php while($services->fetch()){ ?>
                                       <option value="<?=$services->display('post_title')?>"><?=$services->display('post_title')?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <textarea rows="5" name="message"
                                    placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary custom-submit">Отправить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="box-wrap">
                        <form id="submit-info-form" action="/wp-json/cv/v1/save" method="post" action="" enctype="multipart/form-data" novalidate="" class="active box has-advanced-upload">
                            <div class="box__input">
                                <span class="d-xl-block d-lg-none d-md-none d-sm-none d-xs-none">Добавьте ваш файл, картинки или фотографии</span>
                                <span class="d-xl-none">Добавьте ваш файл или картинки</span>
                                <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
                                <label class="files-names" id="files_names"></label>
                                <label for="file" class="btn-span btn-outline">Выбрать файл</label>
                            </div>
                            <div class="box__uploading">Uploading…</div>
                            <div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Upload more?</a></div>
                            <div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?submit-on-demand" class="box__restart" role="button">Try again!</a></div>
                            <input type="hidden" name="ajax" value="1"></form>
                    </div>

                    <form action="#" class="call-form">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" placeholder="Имя*" required name="full_name">
                                <input type="text" placeholder="Телефон*" required name="phone">
                                <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                            </div>
                            <div class="col-6">
                            <textarea rows="5"
                                      name="message"
                                      placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                <button type="submit" class="btn btn-primary custom-submit">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-wrap">
                    <div class="logo-wrap">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/smarthoop_logo_2.png" width="100" height="100" alt="Smarthoop">
                    </div>
                    <div class="contacts">
                        <h4>контакты</h4>
                        <div class="contact">
                            <a target="_blank" href="<?=$settings->display('wholesale_latitude')?>" class="map-link">
                                <?=$settings->display('wholesale_city')?>
                            </a> <br/>
                            Тел: <a href="tel:+380<?=$settings->display('wholesale_number')?>" class="phone-link"><?=$settings->display('wholesale_number')?></a>, <br/> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="tel:+380667734186" class="phone-link">(066) 773 41 86</a><br/>
                            email: <a href="mailto:<?=$settings->display('wholesale_email')?>"><?=$settings->display('wholesale_email')?></a>
                        </div>
                        <div class="contact d-xl-none">
                            <a target="_blank" href="<?=$settings->display('individually_latitude')?>" class="map-link">
                                <?=$settings->display('individual_city')?>
                            </a> <br/>
                            Тел: <a href="tel:+380<?=$settings->display('individually_number')?>" class="phone-link"><?=$settings->display('individually_number')?></a><br/>
                            email: <a href="mailto:<?=$settings->display('individual_email')?>"><?=$settings->display('individual_email')?></a>
                        </div>
                    </div>
                    <div class="contacts d-lg-none d-md-none d-sm-none d-xs-none">
                        <h4>&nbsp;</h4>
                        <div class="contact">
                            <a target="_blank" href="<?=$settings->display('individually_latitude')?>" class="map-link">
                                <?=$settings->display('individual_city')?>
                            </a> <br/>
                            Тел: <a href="tel:+380<?=$settings->display('individually_number')?>" class="phone-link"><?=$settings->display('individually_number')?></a><br/>
                            email: <a href="mailto:<?=$settings->display('individual_email')?>"><?=$settings->display('individual_email')?></a>
                        </div>
                    </div>
                    <div class="schedule">
                        <h4>График работы</h4>
                        <div><?=$settings->display('individually_working_hours')?><br/>
                            <?=$settings->display('individually_working_days')?></div>
                    </div>
                    <div class="subscribe">
                        <h4>подписаться на рассылку</h4>
                        <form action="#" id="subscribe-form" class="subscribe">
                            <div class="form-group">
                                <input type="email" placeholder="E-mail" name="email" required>
                                <button type="submit" class="btn btn-outline">Подписаться</button>
                            </div>
                        </form>
                        <div class="social-media d-xl-none">
                            <h4>Мы в социальных сетях</h4>
                            <div class="social-wrap">
                                <a href="<?=$settings->display('facebook')?>" target="_blank"><i class="icon icon-facebook"></i></a>
                                <a href="<?=$settings->display('instagram')?>" target="_blank"><i class="icon icon-instagram"></i></a>
                                <a href="<?=$settings->display('youtube')?>" target="_blank"><i class="icon icon-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="social-media d-lg-none d-md-none d-sm-none d-xs-none">
                        <h4>Мы в социальных сетях</h4>
                        <div class="social-wrap">
                            <a href="<?=$settings->display('facebook')?>" target="_blank"><i class="icon icon-facebook"></i></a>
                            <a href="<?=$settings->display('instagram')?>" target="_blank"><i class="icon icon-instagram"></i></a>
                            <a href="<?=$settings->display('youtube')?>" target="_blank"><i class="icon icon-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-nav">
                    <ul>
                        <li><a href="/services">услуги</a></li>
                        <li><a href="/works">наши работы</a></li>
                        <li><a href="/about">о нас</a></li>
                        <li><a href="/prices">цены</a></li>
                        <li><a href="/stock">акции</a></li>
                        <li><a href="/shop">магазин</a></li>
                        <li><a href="/shipping">доставка и оплата</a></li>
                        <li><a href="/how-to-order">как заказать</a></li>
                        <li><a href="/blog">блог</a></li>
                        <li><a href="/faq">f.a.q.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12">
                <div class="footer-info">
                    <a href="/privacy-policy">ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ</a>
                    <p>
                        ©2011 SmartHoop<br/>
                        Все права защищены и охраняются действующим законодательством Украины.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/jquery/jquery-1.12.4.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/slick.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/select2/select2.min.js"></script>
<!--<script src="--><?php //bloginfo('template_url'); ?><!--/assets/libs/fileinput/fileinput.min.js"></script>-->
<script src="/wp-content/themes/nt-conversi/assets/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/imagefill/jquery-imagefill.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/libs/masonry/masonry.pkgd.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/scripts.js"></script>
 <script>
    window.onload = function() {
        window.removeFakeCaptcha = function() {
            $('.captcha-fake-field').remove();
        }
    };
</script>
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
                label		 = form.querySelector( 'label#files_names' ),
                errorMsg	 = form.querySelector( '.box__error span' ),
                restart		 = form.querySelectorAll( '.box__restart' ),
                droppedFiles = false,
                showFiles	 = function( files )
                {
                    var count=0;
                    for (var key in files){
                        count++;
                    }
                    label.textContent = count > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', count ) : (files[ 0 ] ? files[ 0 ].name : "Drag & Drop CV Here");
                    var files_names = $('#files_names');
                    files_names.html('');
                    var files_list = '';
                    for (var key in files) {
                        files_list += '<div class="file-item"><span>'+files[key]['name']+'</span><button data-item-id="'+key+'" type="button" class="btn-close">×</button></div>';
                    }
                    if(files.length > 0) {
                        $('#submit-info-form').addClass('uploaded');
                    }else{
                        $('#submit-info-form').removeClass('uploaded');
                    }
                    label.classList.add('uploaded');
                    files_names.append(files_list);
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
//                if(files_to_check.length == 0) {
//                    $('#submit-info-form').removeClass('uploaded');
//                }

                if(files_to_check.length<=4 && files_to_send.length < 4 && (files_to_check.length + files_to_send.length ) <= 4) {
                    for (var key in files_to_check) {
                        if (files_to_check[key]['size'] <= 4 * 1024 * 1024) {
                            if (typeof files_to_check[key] === 'object')
                                if(files_to_check.length<=4) {
                                    files_to_send.push(files_to_check[key]);
                                }else{
                                    alert("You can upload only 4 files");
                                    break;
                                }
                        } else {
                            if (typeof files_to_check[key] === 'object'){
                                alert(files_to_check[key]['name']+" is too big.");
                                delete files_to_check[key];
                            }
                        }
                    }
                    if(files_to_send.length >= 1){
                        showFiles(files_to_send);
                        triggerFormSubmit();
                    }
                }else{
                    $('.make-order .box__input .btn-span').hide();
                    alert("You can upload only 4 files");
                }
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
                    if(droppedFiles.length <= 4 && files_to_send.length<4 && (droppedFiles.length + files_to_send.length) <=4) {
                        for (var key in droppedFiles) {
                            if (droppedFiles[key]['size'] <= 4 * 1024 * 1024) {
                                if (typeof droppedFiles[key] === 'object')
                                    if(files_to_send.length!=4) {
                                        files_to_send.push(droppedFiles[key]);
                                    }else{
                                        alert("You can upload only 4 files");
                                        break;
                                    }
                            } else {
                                if (typeof droppedFiles[key] === 'object') {
                                    alert(droppedFiles[key]['name']+" is too big.");
                                    delete droppedFiles[key];
                                }
                            }
                        }
                        if(files_to_send.length >= 1) {
                            showFiles(files_to_send);
                            triggerFormSubmit();
                        }
                    }else{
                        alert("You can upload only 4 files");
                    }
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
                            if(files_to_send.length > 1) {
                                files_to_send.splice(file_key_send,1);
                            }else{
                                files_to_send = [];
                            }
                            if(files_from_back.length>1){
                                files_from_back.splice(file_key_back,1);
                            }else{
                                $('#submit-info-form').removeClass('uploaded');

                                files_from_back = [];
                            }
                            showFiles(files_to_send);
                        },
                        error: function(MLHttpRequest, textStatus, errorThrown) {

                        }
                    });
                });

                $('#submit-info-form').submit(function (e) {
                    var valid = true;
                    var required = $('#submit-info-form').find('[required]');
                    if (required) {
                        required
                            .each(function () {
                                if (!$(this).val()) {
                                    valid = false;
                                }
                            })
                    }
                    if (valid) {
                        $.ajax({
                            type: 'POST',
                            url:'/wp-json/cv/v1/send',
                            data:   {files : files_from_back, data: $('#submit-info-form').serializeArray()},
                            success: function(data) {
                                $('#files_sender').trigger('reset');
                                files_to_send = [];
                                files_from_back = [];
                                showFiles(0);
                                window.location.href = window.location.href + '?form=success'
                            },
                            error: function(MLHttpRequest, textStatus, errorThrown) {

                            }
                        });
                    }
                    e.preventDefault();
                });
            });
        });
    }( document, window, 0 ));

</script>

</body>
</html>
