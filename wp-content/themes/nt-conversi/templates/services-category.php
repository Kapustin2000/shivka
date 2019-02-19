<?php
/*
Template Name: Services - category
*/
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"slug = '".$id."'"
);
$data = pods('service_categories')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
       // shivka_SetPodsSeo($data->display('id'),true);
        $found = true;
        break;

    }
}
$params = array(
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC",
    'where'=> 'service_categories.slug ="'.$id.'"'
);
$services = pods('single_services')->find($params);



?>

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-services smarthoop-services-category">
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            <span><?=$data->display('title')?></span>
                        </h1>
                        <div class="decorative yellow"></div>
                        <div class="decorative lavander"></div>
                        <?php if($services->total_found()){ ?>
                        <div class="row">
                            <?php while($services->fetch()){ ?>
                            <div class="col-lg-6 col-12">
                                <a href="<?=get_permalink($services->display('id'));?>" class="service-item">
                                    <div class="service-title-wrap">
                                        <div class="service-title"><?=$services->display('post_title')?></div>
                                        <?php if($services->field('post_content')){ ?>
                                        <div class="service-desc service-small-desc"><?=$services->display('post_content')?></div>
                                        <br>
                                        <?php } ?>
                                        <?php if($services->field('full_description')){ ?>
                                        <div class="service-desc service-full-desc"><?=$services->display('full_description')?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$services->display('preview')?>);"></div>
                                    </div>
                                    <button type="button" class="btn btn-primary">подробнее</button>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>



<?php get_footer() ?>
