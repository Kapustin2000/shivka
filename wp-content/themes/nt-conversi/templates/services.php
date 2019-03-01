<?php
/*
Template Name: Services
*/

?>
<?php

$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'offset' => shivka_offset(9),
);
$data = pods('services')->find();

?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-services">
    <section class="services extra-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>&nbsp;Наши услуги&nbsp;</span>
                    </h1>
                    <div class="decorative yellow"></div>
                    <div class="decorative lavander"></div>
                    <div class="row">
                        <?php  while($data->fetch()){?>
                            <div class="col-lg-4 col-12">
                                <a href="<?=get_permalink($data->display('id'))?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style=" background-image: url( <?=$data->display('preview')?>);"></div>
                                    </div>
                                    <div class="service-title"><?=$data->display('post_title')?></div>
                                    <button type="button" class="btn btn-primary">смотреть</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
<!--                    <div class="see-more">-->
<!--<!--                        TODO: Change link-->-->
<!--                        <a href="/" class="underline">смотреть больше</a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </section>
</div>
<?php if (function_exists('wp_corenavi')) wp_corenavi($data->total_found(),9); ?>
<?php get_footer(); ?>
