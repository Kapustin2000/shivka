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
            shivka_SetPodsSeo($data->display('term_id',true,'works'));
            $found = true;
            $related_gallery = pods('gallery')->find(array('where' => 'works.slug = "'.$id.'"','orderby'=>"order_weight.meta_value + 0 DESC,ID DESC"));

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
                            <div class="row ajax-call"></div>
                        </div>
                        <div class="see-more eye-hover" id="works-category-ajax" data-total="<?=$related_gallery->total_found()?>">
                            <span class="underline">смотреть больше</span>
                            <i class="icon icon-eye"></i>
                        </div>
                        
                        <a href="/nashi-raboti" class="back">
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
