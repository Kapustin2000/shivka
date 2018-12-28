<?php
/*
Template Name: Faq
*/

?>


<?php

$params = array(
    'orderby'=>"order_weight.meta_value + 0 DESC,id DESC"
);
$data = pods('faq')->find();


?>


<!-- Need header -->
<?php get_header(); ?>
<!-- -->

<?php  while($data->fetch()){?>
    <div class="l6">
        <?=$data->display('post_title')?>
        <?=$data->display('post_content')?>
        <?=$data->display('preview')?>
        <?=get_permalink($data->display('id'))?>
    </div>
<?php } ?>












<?php get_footer(); ?>






