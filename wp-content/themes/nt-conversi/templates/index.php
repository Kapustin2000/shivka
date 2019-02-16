<?php
/*
Template Name: Home
*/

?>


<?php
$settings = pods('home_ui')->find();


$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'limit' => 1
);
$sliders = pods('home_sliders')->find($params);



$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'limit' => 3
);
$services = pods('services')->find();



$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'limit' => 1
);
$stock = pods('stock')->find();



$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
);
$stages_of_work = pods('stages_of_work')->find($params);
?>


<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-home">
    <section class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner">
                        <h1>
                            <span>
                                &nbsp;Машинная вышивка -&nbsp;<br/>
                                &nbsp;отличный способ&nbsp;<br/>
                                &nbsp;проявить свой стиль!&nbsp;
                            </span>
                        </h1>
                        <div class="see-more">
                            <span class="underline">узнать больше</span>
                            <i class="icon icon-arrow"></i>
                        </div>
                        <?php if($settings->field('main_screen')) { ?>
                        <div id="main-slider" class="main-slider">
                            <div class="item">
                                <div class="img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/Слой_1@1x.png);"></div>
                            </div>
                            <div class="item">
                                <div class="img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/Слой_1@1x.png);"></div>
                            </div>
                            <div class="item">
                                <div class="img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/Слой_1@1x.png);"></div>
                            </div>
                        </div>

                        <?php }else{ ?>
                                                      <div class="video-carousel">
                                                          <div class="decorative lavander"></div>
                                                          <div class="video-item"></div>
                                                          <div class="video-progress"></div>
                                                      </div>
                        <?php } ?>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section class="common-service-description">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="common-service-img">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/Слой_1@1x.png" alt="Common Service">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="common-service-text bordered">
                        <h2>Общее описание услуги</h2>
                        <p>
                            Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.
                        </p>
                        <p>
                            Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.
                        </p>
                        <p>
                            Современное промышленное японское (Toyota) и немецкое (ZSK)оборудование, качественные расходные материалы и нитки (Gunold, Madeira, Durak и др.), профессиональное программирование и наш опыт позволяют осуществлять каждый заказ максимально быстро, качественно и по приемлемым ценам.
                        </p>
                    </div>
                    <a href="#" type="button" class="btn btn-outline">Читать о нас</a>
                    <div class="decorative lavander"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Наши услуги</h2>
                    <div class="decorative yellow"></div>
                    <div class="row">
                        <?php while($services->fetch()){ ?>
                            <div class="col-lg-4 col-12">
                                <a href="/services/category/?id=<?=$services->field('service_category')['slug']?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$services->display('preview')?>);"></div>
                                    </div>
                                    <div class="service-title"><?=$services->display('post_title')?></div>
                                    <button type="button" class="btn btn-primary">подробнее</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more">
                        <a href="/services" class="underline">смотреть все услуги</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if($stock->total_found()){ ?>
        <section class="stock">
            <div class="container">
                <div class="row">
                    <div class="stock-img col-md-4">
                        <img src="<?=$stock->display('image')?>" alt="Stock">
                    </div>
                    <div class="col-lg-8 col-xs-12">
                        <div class="stock-text bordered">
                            <h2><?=$stock->display('post_title')?></h2>
                            <p>
                                <?=$stock->display('post_content')?>
                            </p>
                            <a href="<?=get_permalink($stock->display('id'))?>" type="button" class="btn btn-primary">Подробнее</a>
                            <img class="ornament" src="<?=$stock->display('patch')?>" alt="Ornament">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>этапы работы</h2>
                    <div class="steps-wrap row">
                        <?php while($stages_of_work->fetch()){ ?>
                            <div class="step col-xl-3 col-sm-6 col-12">
                                <h3><?=$stages_of_work->display('post_title')?></h3>
                                <p><?=$stages_of_work->display('post_content')?></p>
                                <?=$stages_of_work->display('image')?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more">
                        <a href="/" class="underline">смотреть подробности</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php //if (function_exists('wp_corenavi')) wp_corenavi(); ?>

<?php get_footer(); ?>
