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
<!--                    <div class="col-xl-6 col-12">-->
                    <div class="col-6">
                        <div class="info-block">
                            <h1><span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span></h1>
                            <?=$data->display('post_content')?>
                        </div>
                    </div>
<!--                    <div class="col-xl-6 col-12">-->
                    <div class="col-6">
                        <div class="work-info-img">
                            <img src="<?=$data->display('preview')?>" alt="<?=$data->display('post_title')?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="related-categories services extra-services">
                            <div class="row">
                                <?php foreach($data->field('related_works') as $work) { $related_works = pods('works')->find(array('limit' => 1, 'where' => 'ID = '.$work['ID']));?>
                                    <?php while($related_works->fetch()){ ?>
<!--                                        <div class="col-md-4 col-12">-->
                                        <div class="col-4">
                                            <a href="<?=get_permalink($related_works->display('id'))?>" class="service-item">
                                                <div class="service-img-wrap">
                                                    <div class="service-img" style=" background: #000 url(<?=$related_works->display('preview')?>);"></div>
                                                </div>
                                                <div class="service-title"><?=$related_works->display('post_title')?></div>
                                                <button type="button" class="btn btn-primary">смотреть</button>
                                            </a>
                                        </div>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="see-more">
                            <a href="<?=get_permalink($data->field('gallery')['ID'])?>" class="underline">смотреть больше</a>
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

<?php get_footer(); ?>
