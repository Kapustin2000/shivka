<?php
/*
Template Name: About
*/

?>

<?php
$settings = pods('about_ui')->find();

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC"
);
$partners = pods('partners')->find();


?>

<!-- Need header -->
<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-about">
    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-desc">
                        <h1><span>&nbsp;о нас&nbsp;</span></h1>
                        <div class="bordered">
                            <?=$settings->display('block1_description')?>
                        </div>
                    </div>
                </div>
                <div class="about-img">
                    <img src=" <?=$settings->display('block1_image')?>" alt="About us">
                </div>
            </div>
        </div>
    </section>
    <section class="socials">
        <div class="about-img">
            <img src=" <?=$settings->display('block2_image')?>" alt="About us">
        </div>
        <div class="socials-description">
            <?=$settings->display('block2_description')?>
            <div class="inner-wrap">
                <div class="social-wrap">
                    <a href="<?=$settings->display('facebook')?>" target="_blank"><i class="icon icon-facebook"></i></a>
                    <a href="<?=$settings->display('instagram')?>" target="_blank"><i class="icon icon-instagram"></i></a>
                    <a href="<?=$settings->display('youtube')?>" target="_blank"><i class="icon icon-youtube"></i></a>
                    <a href="<?=$settings->display('prom')?>" target="_blank"><i class="icon icon-prom"></i></a>
                </div>
                <a href="/blog" class="btn btn-primary btn-span">наш блог</a>
            </div>
        </div>
    </section>
    <?php if($partners->total_found()){ ?>
        <section class="partners">
            <div class="decorative yellow"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>наши клиенты</h2>
                        <div class="partner-wrap">
                            <?php while($partners->fetch()){ ?>
                                <div class="partner">
                                    <img src="<?=$partners->display('logo')?>" alt="<?=$partners->display('title')?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>

<?php get_footer(); ?>
