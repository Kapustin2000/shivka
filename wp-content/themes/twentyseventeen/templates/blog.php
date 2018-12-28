<?php
/*
Template Name: Blog
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






<!-- YOUR HTML -->


<div class="row">
    <?php  while($data->fetch()){?>
        <div class="l6">
            <?=$data->display('post_title')?>
            <?=$data->display('post_content')?>
            <?=$data->display('image')?>
            <?=$data->display('blog_type')?>
            <?=get_permalink($data->display('id'))?>
        </div>
    <?php } ?>
</div>



<?php get_footer(); ?>
