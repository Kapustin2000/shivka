<?php
/*
Template Name: Works
*/

?>
<?php

$params = array(
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC"
);
$data = pods('blog')->find();


?>








<!-- Need header -->
<?php get_header(); ?>
<!-- -->





<?php  while($data->fetch()){?>
    <div class="l6">
        <?=$data->display('post_title')?>
        <?=$data->display('post_content')?>
        <?=$data->display('image')?>
        <?=$data->display('blog_type')?>
        <?=get_permalink($data->display('id'))?>
    </div>
<?php } ?>








<?php get_footer(); ?>
