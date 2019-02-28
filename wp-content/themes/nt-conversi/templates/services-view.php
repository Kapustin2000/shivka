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
                        <a href="/services" class="back">
                            <span>
                                <i class="icon icon-arrow"></i>
                                назад к услугам
                            </span>
                        </a>
                        <div class="bordered">
                            <div class="row">
                                <div class="col-xl-6 col-12">
                                    <div class="service-img">
                                        <img src="<?=$data->display('preview')?>" alt="Service">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <h1>
                                        <span><?=$data->display('post_title')?></span>
                                    </h1>
                                    <div class="text-wrap">
                                        <p>
                                            <?=$data->display('post_content')?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-service-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Фото готовых работ</h2>
                        <div class="row">
                            <div class="col-12">
                                <div id="gallery" class="gallery-wrap">
                                    <?php $related_gallery = pods('gallery')->find(array('limit' => 1, 'where' => 't.id = '.$data->field('gallery')['ID'])); ?>
                                    <?php while($related_gallery->fetch()){?>
                                        <?php foreach ($related_gallery->field('images') as $item) { ?>
                                        <a href="<?=$item['guid']?>" style="background-image: url(<?=$item['guid']?>);" class="img-wrap"></a>
                                    <?php } } ?>
                                </div>
                            </div>
                        </div>
                        <div class="see-more">
<!--                            TODO: вести на определенную галлерею-->
                            <a href="/" class="underline">смотреть больше фото</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-service-more">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>описание услуги</h2>
                        <div class="decorative yellow"></div>
                        <div class="row">
                            <p><?=$data->display('full_description')?></p>
                        </div>
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

        <div class="single-service-related">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Смотрите также</h2>
                        <div id="related-slider" class="related-slider services extra-services">
                            <a href="/services/category/?id=" class="service-item">
                                <div class="service-img-wrap">
                                    <div class="service-img" style=" background: #000 url();"></div>
                                </div>
                                <div class="service-title">Широкоформатная вышивка</div>
                                <button type="button" class="btn btn-primary">смотреть</button>
                            </a>
                            <a href="/services/category/?id=" class="service-item">
                                <div class="service-img-wrap">
                                    <div class="service-img" style=" background: #000 url();"></div>
                                </div>
                                <div class="service-title">Широкоформатная вышивка</div>
                                <button type="button" class="btn btn-primary">смотреть</button>
                            </a>
                            <a href="/services/category/?id=" class="service-item">
                                <div class="service-img-wrap">
                                    <div class="service-img" style=" background: #000 url();"></div>
                                </div>
                                <div class="service-title">Широкоформатная вышивка</div>
                                <button type="button" class="btn btn-primary">смотреть</button>
                            </a>
                            <a href="/services/category/?id=" class="service-item">
                                <div class="service-img-wrap">
                                    <div class="service-img" style=" background: #000 url();"></div>
                                </div>
                                <div class="service-title">Широкоформатная вышивка</div>
                                <button type="button" class="btn btn-primary">смотреть</button>
                            </a>
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
