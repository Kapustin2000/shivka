<?php
/*
Template Name: How to order
*/
$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
);
$stages_of_work = pods('stages_of_work')->find($params);
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
<!--                        --><?php //$count = 0; while($stages_of_work->fetch()){ ?>
<!--                            --><?php //if($count!=0){?>
<!--<!--                                <div class="step content-editable col-xl-7 col-12">-->-->
<!--                                <div class="step content-editable col-7">-->
<!--                                    --><?php //if($stages_of_work->field('image')){ ?><!--<img src="--><?//=$stages_of_work->display('image')?><!--" alt="--><?//=$stages_of_work->field('image')['post_title']?><!--"> --><?php //} ?>
<!--                                    <h3>--><?//=$stages_of_work->display('post_title')?><!--</h3>-->
<!--                                    --><?//=$stages_of_work->display('full_description')?>
<!--                                          </div>-->
<!--                            --><?php //}else{ ?>
<!--<!--                                <div class="step col-xl-7 col-12">-->-->
<!--                                <div class="step col-7">-->
<!--                                    <h3>--><?//=$stages_of_work->display('post_title')?><!--</h3>-->
<!--                                    <div class="content-editable">-->
<!--                                        <div class="content-editable">-->
<!--                                            --><?//=$stages_of_work->display('full_description')?>
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            --><?php //}  $count++;} ?>




                        <?php $count=0; while($stages_of_work->fetch()){ ?>
                            <!--  Block 1 -->
                            <?php if($count==0){ ?>




                                <!--  Block 2 -->
                            <?php $count++; }else{ ?>




                            <?php $count = 0;} ?>

                        <?php }   ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php get_footer(); ?>
