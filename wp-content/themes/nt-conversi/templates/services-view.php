<?php
/*
Template Name: Services - view
*/
if($id = shivka_escapeParam(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) {
    $taxonomy = preg_split("#/#",parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $taxonomy = $taxonomy[count($taxonomy)-2];
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "' and services.slug = '".$taxonomy."'"
    );
    $data = pods('single_services')->find($params);

    $found = false;
    if (!empty($data->total_found())) {
        while ($data->fetch()) {
            shivka_SetPodsSeo($data->display('id'));
            $found = true;
            break;

        }
    }
}else{
    $found = false;
}
?>

<?php get_header(); ?>

<?php if($found){ ?>
    <div class="smarthoop-wrap smarthoop-single-service">
        <div class="single-service-description">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bordered">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="service-img">
                                        <img src="<?=$data->display('preview')?>" alt="Service">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <h1>
                                        <span><?=$data->display('post_title')?></span>
                                    </h1>
                                    <div class="text-wrap">
                                        <?=$data->display('post_content')?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($data->field('gallery'))){ ?>
            <div class="single-service-gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Фото готовых работ</h2>
                            <div class="row">
                                <div class="col-12">
                                    <div id="gallery" class="gallery-wrap">
                                        <?php $related_gallery = pods('gallery')->find(array('limit' => 1, 'where' => 't.id = '.$data->field('gallery')['ID'])); ?>
                                        <?php while($related_gallery->fetch()){ if(!empty($related_gallery->field('images'))){?>
                                            <?php foreach ($related_gallery->field('images') as $item) { ?>
                                                <a href="<?=$item['guid']?>" style="background-image: url(<?=$item['guid']?>);" class="img-wrap"></a>
                                            <?php } } } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="see-more eye-hover">
                                <a href="<?=get_permalink($data->field('gallery')['ID'])?>" class="underline">смотреть больше фото</a>
                                <i class="icon icon-eye"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="single-service-more">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>описание услуги</h2>
                        <div class="decorative yellow"></div>
                        <div class="content-editable full-description"><?=$data->display('full_description')?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($data->display('display_shop_block')=="Да"){ ?>
            <div class="single-service-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="decorative lavander"></div>
                            <div class="bordered">
                                <h2>Готовые товары с нашей вышивкой</h2>
                                <p>Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.</p>
                                <p>Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.</p>
                                <a href="/magazin-vishivki" class="btn btn-primary btn-span">перейти в магазин</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="make-order upper">
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
                            <form  class="active submit-info-form" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <input type="text" placeholder="Имя*" required name="full_name">
                                        <input type="email" placeholder="E-mail*" required name="email">
                                        <input type="text" id="phone" placeholder="Телефон" name="phone">
                                        <input type="text" style="opacity: 0;">
                                    </div>
                                    <div class="col-md-6 col-12">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <button type="submit" class="btn btn-primary custom-submit">Отправить</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="box-wrap">
                                <form  action="/wp-json/cv/v1/save" method="post" action="" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload submit-file-form">
                                    <div class="box__input">
                                        <span class="d-xl-block d-lg-none d-md-none d-sm-none d-none">Добавьте ваш файл, картинки или фотографии</span>
                                        <span class="d-xl-none">Добавьте ваш файл или картинки</span>
                                        <input type="file" name="files[]" id="file" class="box__file" data-multiple-caption="{count} files selected" multiple="">
                                        <label class="files-names files_names"></label>
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
        </div>

        <div class="single-service-related">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Смотрите также</h2>
                        <div id="related-slider" class="related-slider services extra-services">
                            <?php if(!empty($data->field('related_services'))){ ?>
                                <?php foreach($data->field('related_services') as $service) {
                                    $related_service = pods('single_services')->find(array('limit' => 1, 'where' => 'ID = '.$service['ID']));
                                    while($related_service->fetch()){ ?>

                                        <a href="<?=get_permalink($related_service->display('id'));?>" class="service-item">
                                            <div class="service-img-wrap">
                                                <div class="service-img" style="background-image: url(<?=$related_service->display('preview')?>);"></div>
                                            </div>
                                            <div class="service-title"><?=$related_service->display('post_title')?></div>
                                            <span class="btn btn-primary btn-span">смотреть</span>
                                        </a>
                                    <?php } } } ?>
                        </div>
                        <a href="/uslugi" class="back">
                            <span>
                                <i class="icon icon-arrow"></i>
                                Назад к услугам
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>

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
                label		 = form.querySelector( 'label.files_names' ),
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
                    var files_names = $('.files_names');
                    files_names.html('');
                    var files_list = '';
                    for (var key in files) {
                        files_list += '<div class="file-item"><span>'+files[key]['name']+'</span><button data-item-id="'+key+'" type="button" class="btn-close remove_file">×</button></div>';
                    }
                    if(files.length > 0) {
                        $('.submit-file-form').addClass('uploaded');
                    }else{
                        $('.submit-file-form').removeClass('uploaded');
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
//                    $('.submit-file-form).removeClass('uploaded');
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
                $(".files_names").on("click", "button.btn-close", function(e){
                    e.stopImmediatePropagation();
                    e.preventDefault();
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
                                $('.submit-file-form').removeClass('uploaded');
                                files_from_back = [];
                            }
                            showFiles(files_to_send);
                        },
                        error: function(MLHttpRequest, textStatus, errorThrown) {
                        }
                    });
                });
                $('.submit-info-form').submit(function (e) {
                    e.stopImmediatePropagation();
                    e.preventDefault();

                    var valid = true;
                    var required = $(e.target).find('[required]');
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
                            data:   {files : files_from_back, data: $(e.target).serializeArray()},
                            success: function(data) {
                                $('.files_sender').trigger('reset');
                                files_to_send = [];
                                files_from_back = [];
                                showFiles(0);
                                window.location.href = window.location.href + '?form=success'
                            },
                            error: function(MLHttpRequest, textStatus, errorThrown) {
                            }
                        });
                    }

                    return false;
                });
            });
        });
    }( document, window, 0 ));
</script>

<?php get_footer() ?>
