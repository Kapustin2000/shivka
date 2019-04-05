<?php
/*
Template Name: Services - view
*/
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('single_services')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        shivka_SetPodsSeo($data->display('id'));
        $found = true;
        break;

    }
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
<!--                                <div class="col-xl-6 col-12">-->
                                <div class="col-6">
                                    <div class="service-img">
                                        <img src="<?=$data->display('preview')?>" alt="Service">
                                    </div>
                                </div>
<!--                                <div class="col-xl-6 col-12">-->
                                <div class="col-6">
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
                        <p><?=$data->display('full_description')?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-service-shop">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="decorative lavander"></div>
                        <div class="bordered">
                            <h2>Готовые товары с нашей вышивкой</h2>
                            <p>Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.</p>
                            <p>Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.</p>
                            <a href="/shop" type="button" class="btn btn-primary">перейти в магазин</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            <form action="#" id="order-form" class="order-form active" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" placeholder="Имя*" required name="full_name">
                                        <input type="email" placeholder="E-mail*" required name="email">
                                        <input type="number" id="phone" placeholder="Телефон" name="phone">
                                        <select class="service-select" name="service_name">
                                            <option value="0" selected>Вид услуги</option>
<!--                                            --><?php //while($services->fetch()){ ?>
<!--                                                <option value="--><?//=$services->display('post_title')?><!--">--><?//=$services->display('post_title')?><!--</option>-->
<!--                                            --><?php //} ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                <textarea rows="5" name="message"
                                          placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
                                        <input id="file" type="file" style="opacity: 0;">
                                        <button type="submit" class="btn btn-primary">Отправить</button>
                                    </div>
                                </div>
                            </form>
                            <form action="#" id="call-form" class="call-form">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" placeholder="Имя*" required name="full_name">
                                        <input type="number" placeholder="Телефон*" required name="phone">
                                    </div>
                                    <div class="col-6">
                                        <textarea rows="5"
                                            placeholder="СООБЩЕНИЕ: опишите ваши пожелания: на чем хотите заказать вышивку, планируемый размер, количество, а также любые другие пожелания относительно вышивки."></textarea>
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
                                            <div class="service-img" style=" background: #000 url(<?=$related_service->display('preview')?>);"></div>
                                        </div>
                                        <div class="service-title"><?=$related_service->display('post_title')?></div>
                                        <button type="button" class="btn btn-primary">смотреть</button>
                                    </a>
                            <?php } } } ?>
                        </div>
                        <a href="/services" class="back">
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



<?php get_footer() ?>
