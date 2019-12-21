<?php
/*
Template Name: Stock
*/

?>
<?php

$params = array(
    'where' => "end_date.meta_value >= '".date("Y-m-d")."'",
    'orderby'=>"order_weight.meta_value + 0 DESC,id DESC"
);
$data = pods('stock')->find($params);


?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-stock">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <span>&nbsp;Наши акции&nbsp;</span>
                </h1>
                <div class="row">
                    <?php  while($data->fetch()){?>
                        <div class="col-md-6 col-12">
                            <div class="stock-item bordered">
                                <div class="content-editable">
                                    <h2><?=$data->display('post_title')?></h2>
                                    <?=$data->display('post_content')?>
                                </div>
                                <img src="<?=$data->display('patch')?>" alt="<?=$data->display('post_title')?>">
                                <a class="btn btn-outline btn-span" href="<?=get_permalink($data->display('id'))?>">Подробнее</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
