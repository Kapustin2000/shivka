<?php
/*
Template Name: Works Category
*/

?>
<?php
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"slug = '".$id."'"
);
$data = pods('work_categories')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        $found = true;
        break;

    }
}
//$params = array(
//    'orderby'=>"order_weight.meta_value +0 DESC,id DESC",
//    'where'=> 'service_categories.slug ="'.$id.'"'
//);
//$services = pods('single_services')->find($params);



?>
<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-works-category">
    <section class="works-category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bordered">
                        <div class="row">
                            <div class="col-xl-6 col-12">
                                <h1>
                                    <span><?=$data->display('title')?></span>
                                </h1>
                                <div class="text-wrap">
                                    <p>
                                        <?=$data->display('description')?>
                                    </p>
                                    <p>
                                        <?=$data->display('full_description')?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="service-img">
                                    <img src="<?=$data->display('preview')?>" alt="<?=$data->display('title')?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services extra-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        <span>&nbsp;Наши работы&nbsp;</span>
                    </h1>
                    <div class="decorative yellow"></div>
                    <div class="decorative lavander"></div>
                    <?php if($data->field('gallery')){ ?>
                    <div class="row">
                        <?php foreach($data->field('gallery') as $related) {$related_gallery = pods('gallery')->find(array('limit' => 1, 'where' => 't.id = '.$related['ID'])); ?>
                         <div class="col-lg-4 col-12">
                             <a href="<?=get_permalink($related_gallery->display('id'))?>" class="service-item">
                                 <div class="service-img-wrap">
                                     <div class="service-img" style="background-image: url(<?=$related_gallery->display('preview')?>);"></div>
                               </div>
                               <div class="service-title"><?=$related_gallery->display('post_title')?></div>
                                 <button type="button" class="btn btn-primary">смотреть</button>
                             </a>
                         </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="see-more">
<!--                        TODO: Change link-->
                        <a href="/" class="underline">смотреть больше</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="/works" class="back">
        <span>
            <i class="icon icon-arrow"></i>
            назад к работам
        </span>
    </a>
</div>

<?php get_footer(); ?>




