<?php
/*
Template Name: Works
*/

?>
<?php
$params = array(
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC",
    'limit'=>3
);
$data =  pods('works')->find($params);
$total_found = pods('works')->find()->total_found();


?>
<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-works">
    <section class="services extra-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>&nbsp;Наши работы&nbsp;</span>
                    </h1>
                    <div class="decorative yellow"></div>
                    <div class="decorative lavander"></div>
                    <div class="row">
                        <?php  while($data->fetch()){?>
<!--                            <div class="col-lg-4 col-12">-->
                            <div class="col-4">
                               <a href="<?=get_permalink($data->display('id'))?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url( <?=$data->display('preview')?>);"></div>
                                   </div>
                                   <div class="service-title"><?=$data->display('post_title')?></div>
                                   <button type="button" class="btn btn-primary">смотреть</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more eye-hover">
                        <a href="/" class="underline">смотреть больше</a>
                        <i class="icon icon-eye"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>


<?php // while($data->fetch()){?>
<!--    <div class="l6">-->
<!--        --><?//=$data->display('post_title')?>
<!--        --><?//=$data->display('post_content')?>
<!--        --><?//=$data->display('image')?>
<!--        --><?//=$data->display('blog_type')?>
<!--        --><?//=get_permalink($data->display('id'))?>
<!--    </div>-->
<?php //} ?>

