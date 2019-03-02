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
                            <?php if($data->field('service_category')){  ?>
                            <?php foreach($data->field('service_category') as $category) { $related_category = pods('service_categories')->find(array('limit' => 1, 'where' => 't.term_id = '.$category['term_id']));?>
                            <div class="col-lg-6 col-12">
                                <a href="<?=get_permalink($related_category->field('single_service')['ID'])?>" class="service-item">
                                    <div class="service-title-wrap">
                                        <div class="service-title"><?=$related_category->display('title')?></div>
                                        <?php if($related_category->field('title')){ ?>
                                        <div class="service-desc service-small-desc"><?=$related_category->display('title')?></div>
                                        <br>
                                        <?php } ?>
                                        <?php if($related_category->field('description')){ ?>
                                        <div class="service-desc service-full-desc"><?=$related_category->display('description')?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$related_category->display('preview')?>);"></div>
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
