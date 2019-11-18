<?php
/*
Template Name: Home
*/

?>


<?php
$settings = pods('home_ui')->find();



$params = array(
    'orderby'=>"order_weight2.meta_value DESC,id DESC",
    'limit' => 3
);
$services = pods('services')->find($params);



$params = array(
    'orderby'=>"order_weight2.meta_value DESC,id DESC",
    'limit' => 1
);
$stock = pods('stock')->find($params);



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
                        <div class="see-more eye-hover" id="see-more">
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
                                <video width="100%" height="100%" class="video-player">
                                    <source src="<?=$settings->display('video')?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="player-controls">
                                    <div class="video-thumbnail" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/videoblocks.jpg);"></div>
                                    <div class="progress">
                                        <div class="progress-filled"></div>
                                    </div>
                                    <div class="toggler"></div>
                                    <button class="player-button"></button>
                                </div>
                            </div>
                        <?php } ?>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section id="common-service-description" class="common-service-description">
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
                            <a href="/about" class="btn btn-outline btn-span">Читать о нас</a>
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
                    <div class="services-desktop">
                        <div class="row">
                            <?php while($services->fetch()){ ?>
                                <div class="col-xl-4 col-6">
                                    <a href="<?=get_permalink($services->display('id'))?>" class="service-item">
                                        <div class="service-img-wrap">
                                            <div class="service-img" style="background-image: url(<?=$services->display('preview')?>);"></div>
                                        </div>
                                        <div class="service-title"><?=$services->display('post_title')?></div>
                                        <span class="btn btn-primary btn-span">подробнее</span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="services-mobile">
                        <div class="row">
                            <div id="services-carousel">
                                <?php while($services->fetch()){ ?>
                                    <a href="<?=get_permalink($services->display('id'))?>" class="service-item">
                                        <div class="service-img-wrap">
                                            <div class="service-img" style="background-image: url(<?=$services->display('preview')?>);"></div>
                                        </div>
                                        <div class="service-title"><?=$services->display('post_title')?></div>
                                        <span class="btn btn-primary btn-span">подробнее</span>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
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
                            <div class="stock-img">
                                <img src="<?=$stock->display('image')?>" alt="Stock">
                            </div>
                            <div class="stock-text-wrap">
                                <div class="stock-text bordered">
                                    <h2><?=$stock->display('post_title')?></h2>
                                    <div class="stock-short-desc">
                                        <?=$stock->display('post_content')?>
                                    </div>
                                    <a href="<?=get_permalink($stock->display('id'))?>" class="btn btn-primary btn-span">Подробнее</a>
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
                    <div class="steps-scroll">
                        <div class="steps-wrap row">
                            <?php while($stages_of_work->fetch()){ ?>
                                <div class="step col-xl-3 col-md-6">
                                    <h3><?=$stages_of_work->display('post_title')?></h3>
                                    <?=$stages_of_work->display('post_content')?>
                                </div>
                            <?php } ?>
                        </div>
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
<script>
    var player = document.querySelector('.video-carousel');
    var video = player.querySelector('.video-player');
    var progress = player.querySelector('.progress');
    var progressBar = player.querySelector('.progress-filled');
    var playButton = player.querySelector('.player-button');
    var thumbnail = player.querySelector('.video-thumbnail');
    var toggler = player.querySelector('.toggler');

    var togglePlay = function() {
        if (video.paused) {
            thumbnail.style.zIndex = '-1';
            playButton.style.zIndex = '-1';
            video.style.zIndex = '3';
            video.play();
        } else {
            thumbnail.style.zIndex = '1';
            playButton.style.zIndex = '1';
            video.style.zIndex = '-1';
            video.pause();
        }
    };

    var handleProgress = function() {
        const percent = (video.currentTime / video.duration) * 100;
        progressBar.style.width = percent+'%';
    };

    var scrub = function(e) {
        const scrubTime = (e.offsetX / progress.offsetWidth) * video.duration;
        video.currentTime = scrubTime;
    };

    toggler.addEventListener('click', togglePlay);
    video.addEventListener('timeupdate', handleProgress);
    progress.addEventListener('click', scrub);
</script>

<?php get_footer(); ?>
