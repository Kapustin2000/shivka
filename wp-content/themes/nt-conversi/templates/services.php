<?php
/*
Template Name: Services
*/

?>
<?php

$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value + 0 DESC,term_id DESC",
);
$total_found = pods('services')->find()->total_found();
$data = pods('services')->find($params);

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
                    <div class="row ajax-call">
                    </div>
                    <div class="see-more eye-hover" id="services-ajax" data-total="<?=$total_found?>">
                        <span class="underline">смотреть больше</span>
                        <i class="icon icon-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
