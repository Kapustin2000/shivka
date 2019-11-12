<?php
/*
Template Name: Works
*/

?>
<?php
$params = array(
    'orderby'=>"order_weight.meta_value + 0 DESC,id DESC",
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
                    <div class="row ajax-call">
                    </div>
                    <div class="see-more eye-hover" id="works-ajax" data-total="<?=$total_found?>">
                        <span class="underline">смотреть больше</span>
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

