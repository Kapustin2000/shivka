<?php /* Template Name: Shop */ ?>

<?php

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC"
);
$data = pods('services')->find();

?>

<?php get_header(); ?>

<section style="margin-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <span>Эта страница находится в разработке</span>
                </h1>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
