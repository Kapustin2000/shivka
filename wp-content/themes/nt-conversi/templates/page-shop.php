<?php /* Template Name: Shop */ ?>

<?php

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC"
);
$data = pods('services')->find();

?>

<?php get_header(); ?>

Shop




<?php get_footer(); ?>
