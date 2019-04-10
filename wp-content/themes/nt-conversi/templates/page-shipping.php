<?php
/*
Template Name: Shipping
*/
$settings = pods('delivery_ui')->find();
?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-shipping">
    <section class="delivery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="delivery-info">
                        <div class="bordered">
                            <h1>
                                <span>&nbsp;доставка и&nbsp;<br>&nbsp;оплата&nbsp;</span>
                            </h1>
                            <h2>
                                <?=$settings->display('first_block_title')?>
                            </h2>
                            <div class="content-editable">
                                <?=$settings->display('first_block_text')?>
                            </div>
                        </div>
                    </div>
                    <div class="delivery-img-wrap">
                        <img src=" <?=$settings->display('first_block_image')?>" alt="<?=$settings->field('first_block_image')['post_title']?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="payment">
        <div class="decorative light-yellow"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="payment-img-wrap">
                        <img src="<?=$settings->display('second_block_image')?>" alt="<?=$settings->field('second_block_image')['post_title']?>">
                    </div>
                    <div class="payment-info">
                        <h2> <?=$settings->display('second_block_title')?></h2>
                        <div class="content-editable">
                            <?=$settings->display('second_block_text')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>






