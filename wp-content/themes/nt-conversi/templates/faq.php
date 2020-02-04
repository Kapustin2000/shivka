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
                    <span>ВОПРОСЫ И ОТВЕТЫ</span>
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
                            <?=$data->display('description')?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>






