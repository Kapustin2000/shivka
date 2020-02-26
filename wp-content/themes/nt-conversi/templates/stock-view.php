<?php
/*
Template Name: Stock - view
*/
if($id = shivka_escapeParam(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) {
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('stock')->find($params);
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

    <div class="smarthoop-wrap smarthoop-stock smarthoop-stock-item">
        <section class="stock-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="stock-item bordered">
                            <div class="content-editable">
                                <h1>
                                    <span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span>
                                </h1>
                                <h2>
                                    С <?=date("d.m.Y", strtotime($data->display('start_date')));?> по <?=date("d.m.Y", strtotime($data->display('end_date')));?>
                                </h2>
                                <?=$data->display('post_content')?>
                            </div>
                            <img src="<?=$data->display('patch')?>" alt="<?=$data->display('post_title')?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="stock-more">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="stock-more-wrap">
                            <div class="stock-more-img" style="background-image: url(<?=$data->display('image')?>);"></div>
                            <div class="content-editable">
                                <?=$data->display('full_description')?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stockModal">связаться с нами</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="/stock" class="back">
                            <span>
                                <i class="icon icon-arrow"></i>
                                назад к акциям
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <section class="make-order">
                    <div class="form-wrap">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        <div class="form-inner-wrap">
                            <h2><?=$data->display('post_title')?></h2>
                            <p>С <?=date("d.m.Y", strtotime($data->display('start_date')));?> по <?=date("d.m.Y", strtotime($data->display('end_date')));?></p>
                        </div>
                        <form action="<?=$_SERVER['REQUEST_URI']?>&form=success" id="order-form" class="order-form active" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <input type="hidden" required name="stock_name" value="<?=$data->display('post_title')?>">
                                    <input type="text" placeholder="Имя*" required name="full_name">
                                    <input type="email" placeholder="E-mail*" required name="email">
                                    <input type="text" id="phone" placeholder="Телефон" name="phone">

                                </div>
                                <div class="col-md-6 col-12">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                    <div class="g-recaptcha" data-sitekey="6LeUUrYUAAAAAB-KRJVK-jCmqe3i0KXcpCI0qcv9" style="margin-bottom: 2.60417vw" data-callback="removeFakeCaptcha"></div><input type="checkbox" class="captcha-fake-field" tabindex="-1" required>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button type="submit" class="btn btn-primary custom-submit">Отправить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="box-wrap">
                            <form action="/wp-json/cv/v1/save" method="post" action="" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload submit-file-form">
                                <div class="box__input">
                                    <span class="d-xl-block d-lg-none d-md-none d-sm-none d-xs-none">Добавьте ваш файл, картинки или фотографии</span>
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
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php  }else{ ?>

    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>



<?php get_footer(); ?>