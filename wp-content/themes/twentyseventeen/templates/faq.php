<?php
/*
Template Name: Faq
*/

?>

<?php
$params = array(
    'orderby'=>"order_weight.meta_value + 0 DESC,id DESC"
);
$data = pods('faq')->find(); ?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-faq">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <span>F.A.Q.</span>
                </h1>
            </div>
            <div class="inner-wrap col-12">
                <div class="decorative lavander"></div>
                <div class="decorative yellow"></div>
                <?php  while($data->fetch()){?>
                    <div class="panel content-editable">
                        <h2 class="panel-question"><?=$data->display('post_title')?></h2>
                        <div class="panel-answer">
                            <?=$data->display('post_content')?>
                            <ul>
                                <li>Вы отправляете нам заявку с картинкой для будущей вышивки с указанием размеров, тиража и вашими пожеланиями.</li>
                            </ul>
                        </div>
                        <!--                    --><?//=$data->display('preview')?>
                        <!--                    --><?//=get_permalink($data->display('id'))?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>






