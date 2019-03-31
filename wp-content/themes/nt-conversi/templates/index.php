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
                                <?=$settings->display('main_screen_title')?>
                            </span>
                        </h1>
                        <div class="see-more eye-hover">
                            <span class="underline">узнать больше</span>
                            <i class="icon icon-arrow"></i>
                            <i class="icon icon-eye"></i>
                        </div>
                        <?php if($settings->field('main_screen')) { ?>
                        <?php if(!empty($settings->field('sliders'))){ ?>    
                        <div id="main-slider" class="main-slider">
                            <div class="slides-wrap">
                                <?php foreach($settings->field('sliders') as $slider) { ?>
                                    <div class="img" style="background-image: url(<?=$slider['guid']?>);"></div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php }else{ ?>
                            <?=$settings->display('video')?>
                            <div class="video-carousel">
                                <div class="decorative lavander"></div>
                                <video width="100%" height="100%" controls>
                                    <source src="<?php bloginfo('template_url'); ?>/video/smarthoop.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
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
                <div class="col-12">
                    <div class="common-service-wrap">
                        <div class="common-service-img">
                            <img src="<?=$settings->display('block_image')?>" alt="<?=$settings->display('block_title')?>">
                        </div>
                        <div class="common-service-text-wrap">
                            <div class="common-service-text bordered">
                                <h2><?=$settings->display('block_title')?></h2>
                                <?=$settings->display('block_description')?>
                            </div>
                            <a href="/about" type="button" class="btn btn-outline">Читать о нас</a>
                            <div class="decorative lavander"></div>
                        </div>
                    </div>
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
<!--                            <div class="col-lg-4 col-12">-->
                            <div class="col-4">
                                <a href="<?=get_permalink($services->display('id'))?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$services->display('preview')?>);"></div>
                                    </div>
                                    <div class="service-title"><?=$services->display('post_title')?></div>
                                    <button type="button" class="btn btn-primary">подробнее</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more eye-hover">
                        <a href="/services" class="underline">смотреть все услуги</a>
                        <i class="icon icon-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if($stock->total_found()){ ?>
        <section class="stock">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="stock-wrap">
                            <!--                    <div class="stock-img col-md-4">-->
                            <div class="stock-img">
                                <img src="<?=$stock->display('image')?>" alt="Stock">
                            </div>
                            <!--                    <div class="col-lg-8 col-xs-12">-->
                            <div class="stock-text-wrap">
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
<!--                            <div class="step col-xl-3 col-sm-6 col-12">-->
                            <div class="step col-3">
                                <h3><?=$stages_of_work->display('post_title')?></h3>
                                <p><?=$stages_of_work->display('post_content')?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more eye-hover">
                        <a href="/how-to-order/" class="underline">смотреть подробности</a>
                        <i class="icon icon-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php //if (function_exists('wp_corenavi')) wp_corenavi(); ?>

<?php get_footer(); ?>
