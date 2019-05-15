<?php
/*
Template Name: Stock - view
*/
if(isset($_GET['id'])) {
    $id = shivka_escapeParam(trim($_GET['id'], '/'));
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
                            <h2>название акции</h2>
                            <p>С <?=date("d.m.Y", strtotime($data->display('start_date')));?> по <?=date("d.m.Y", strtotime($data->display('end_date')));?></p>
                        </div>
                        <form action="<?=$_SERVER['REQUEST_URI']?>&form=success" id="order-form" class="order-form active" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <!-- <div class="col-lg-6 col-xs-12">-->
                                <div class="col-6">
                                    <input type="text" placeholder="Имя*" required name="full_name">
                                    <input type="email" placeholder="E-mail*" required name="email">
                                    <input type="number" id="phone" placeholder="Телефон" name="phone">
                                </div>
                                <!-- <div class="col-lg-6 col-xs-12">-->
                                <div class="col-6">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                    <input id="file" type="file" style="opacity: 0;">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </div>
                        </form>
                        <form action="#" class="order-form file-form active">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-element">
                                        <label class="form-element-label" for="input-file">Выбрать файлы</label>
                                        <div class="form-element-error">Невозможно загрузить файлы</div>
                                        <input type="file" id="fileinput" name="files[]" data-label="Файлы" data-multiple-caption="{n} файлов выбрано" multiple />
                                    </div>
                                    <!-- <input id="fileinput" name="files[]" type="file" multiple>-->
                                </div>
                            </div>
                        </form>
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
