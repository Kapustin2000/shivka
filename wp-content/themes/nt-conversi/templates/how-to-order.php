<?php
/*
Template Name: How to order
*/
$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
);
$stages_of_work = pods('how_to_order')->find($params);
?>

<!-- Need header -->
<?php get_header(); ?>
<!-- -->

<div class="smarthoop-wrap smarthoop-how-to-order">
    <section class="steps">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>как заказать</span>
                    </h1>
                    <div class="steps-wrap row">
                        <?php  while($stages_of_work->fetch()){ ?>


                                <div class="step content-editable">

                                    <h3><?=$stages_of_work->display('post_title')?></h3>
                                    <?=$stages_of_work->display('full_description')?>
                                    <?php if($stages_of_work->field('image')){ ?><img src="<?=$stages_of_work->display('image')?>" alt="<?=$stages_of_work->field('image')['post_title']?>"> <?php } ?>
                                </div>



                        <?php }   ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>
