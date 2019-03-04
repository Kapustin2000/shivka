<?php
/*
Template Name: Services - category
*/
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('services')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
       // shivka_SetPodsSeo($data->display('id'),true);
        $found = true;
        break;

    }
}



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
                        <div class="row">
                            <?php if($data->field('related_single_service')){  ?>
                            <?php foreach($data->field('related_single_service') as $service) { $related_service = pods('single_services')->find(array('limit' => 1, 'where' => 'ID = '.$service['ID']));?>
                            <div class="col-lg-6 col-12">
                                <a href="<?=get_permalink($related_service->display('id'))?>" class="service-item">
                                    <div class="service-title-wrap">
                                        <div class="service-title"><?=$related_service->display('post_title')?></div>
                                        <?php if($related_service->field('post_title')){ ?>
                                        <div class="service-desc service-small-desc"><?=$related_service->display('post_title')?></div>
                                        <br>
                                        <?php } ?>
                                        <?php if($related_service->field('post_content')){ ?>
                                        <div class="service-desc service-full-desc"><?=$related_service->display('post_content')?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$related_service->display('preview')?>);"></div>
                                    </div>
                                    <button type="button" class="btn btn-primary">подробнее</button>
                                </a>
                            </div>
                            <?php } } ?>
                        </div>
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
