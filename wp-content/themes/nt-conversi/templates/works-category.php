<?php
/*
Template Name: Works - Category
*/
if($id = shivka_escapeParam(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) {

    $params = array('limit' => 1,
        'where' => "slug = '" . $id . "'"
    );
    $data = pods('works')->find($params); 
    $found = false;
    if (!empty($data->total_found())) {
        while ($data->fetch()) {
            shivka_SetPodsSeo($data->display('term_id',true));
            $found = true;
            $related_gallery = pods('gallery')->find(array('where' => 'works.slug = "'.$id.'"'));
            break;
        }
    }
}else{
    $found = false;
}

?>

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-works smarthoop-works-category">
        <section class="work-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="work-info-img">
                            <img src="<?=$data->display('preview')?>" alt="<?=$data->display('name')?>">
                        </div>
                        <div class="info-block">
                            <h1><span>&nbsp;<?=$data->display('name')?>&nbsp;</span></h1>
                            <div class="content-editable">
                                <?=$data->display('description')?>
                            </div>
                        </div>


                        <div class="related-categories services extra-services">
                            <?php if($related_gallery->total_found()){  while($related_gallery->fetch()){?>
                            <div class="col-xl-4 col-sm-6 col-12">
                                <a href="<?=get_permalink($related_gallery->display('term_id'))?>" class="service-item">
                                    <div class="service-img-wrap">
                                        <div class="service-img" style="background-image: url(<?=$related_gallery->display('preview')?>);"></div>
                                    </div>
                                    <div class="service-title"><?=$related_gallery->display('name')?></div>
                                    <span class="btn btn-primary btn-span">смотреть</span>
                                </a>
                            </div>
                            <?php } } ?>
                         </div>
                        
                        <a href="/works" class="back">
                            <span>
                                <i class="icon icon-arrow"></i>
                                Назад к работам
                            </span>
                        </a>
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

<?php get_footer(); ?>
