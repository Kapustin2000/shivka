<?php
/*
Template Name: Services
*/

?>
<?php

$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC"
);
$data = pods('services')->find();


?>









<!-- Need header -->
<?php get_header(); ?>
<!-- -->





    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>&nbsp;Наши услуги&nbsp;</span>
                    </h1>
                    <div class="decorative yellow"></div>
                    <div class="decorative lavander"></div>
                    <div class="row">
                        <?php  while($data->fetch()){?>
                            <div class="col-lg-4 col-12">
                                <a href="<?=get_permalink($data->display('id'))?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style=" background-image: url( <?=$data->display('preview')?>);"></div>
                                    </div>
                                    <div class="service-title"><?=$data->display('post_title')?></div>
                                    <button type="button" class="btn btn-primary">смотреть</button>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="see-more">
                        <a href="/" class="underline">смотреть больше</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- YOUR HTML -->






<?php get_footer(); ?>
