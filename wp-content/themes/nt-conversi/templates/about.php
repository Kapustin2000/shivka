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

$settings_website  = pods('website_settings')->find();
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
                    <a href="<?=$settings_website->display('facebook')?>" target="_blank"><i class="icon icon-facebook"></i></a>
                    <a href="<?=$settings_website->display('instagram')?>" target="_blank"><i class="icon icon-instagram"></i></a>
                    <a href="<?=$settings_website->display('youtube')?>" target="_blank"><i class="icon icon-youtube"></i></a>
                    <a href="<?=$settings_website->display('promua')?>" target="_blank"><i class="icon icon-prom"></i></a>
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
                        <div id="marquee" class="partner-wrap">
                            <div>
                                <span>
                                <?php while($partners->fetch()){ ?>
                                    <img src="<?=$partners->display('logo')?>" alt="<?=$partners->display('title')?>">
                                <?php } ?>
                                    <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                                <img src="http://shivka/wp-content/uploads/2019/03/partner1-1.png" alt="Partners1">
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>

<?php get_footer(); ?>
