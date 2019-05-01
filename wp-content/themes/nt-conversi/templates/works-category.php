<?php
/*
Template Name: Works - Category
*/
if(isset($_GET['id'])) {
    $id = shivka_escapeParam(trim($_GET['id'], '/'));
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('works')->find($params);

    $found = false;
    if (!empty($data->total_found())) {
        while ($data->fetch()) {
            shivka_SetPodsSeo($data->display('id'));
            $found = true;
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
                        <div class="info-block">
                            <h1><span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span></h1>
                            <?=$data->display('post_content')?>
                        </div>
                        <div class="work-info-img">
                            <img src="<?=$data->display('preview')?>" alt="<?=$data->display('post_title')?>">
                        </div>

                        <div class="related-categories services extra-services">
                            <div class="row ajax-call">
                            </div>
                        </div>
                        <div class="see-more eye-hover" id="works-category-ajax" data-total="<?=count($data->field('related_works'))?>">
                            <span class="underline">смотреть больше</span>
                            <i class="icon icon-eye"></i>
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
