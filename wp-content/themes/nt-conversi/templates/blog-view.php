<?php
/*
Template Name: Blog - view
*/
if($id = shivka_escapeParam(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) {
    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('blog')->find($params);

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
    <div class="smarthoop-wrap smarthoop-blog-post">
        <section class="blog-post">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-block">
                            <div class="image-wrap">
                                <div class="img" style="background-image: url(<?=$data->display('image')?>);"></div>
                            </div>
                            <h1>
                                <span><?=$data->display('post_title')?></span>
                            </h1>
                            <div class="blog-type"><?=$data->display('blog_type')?></div>
                        </div>
                        <div class="blog-description">
                            <div class="blog-content"><?=$data->display('post_content')?></div>
                            <div class="blog-desc-inner">
                                <?=$data->display('description')?>
                            </div>
                        </div>
                        <a href="/blog" class="back">
                            <span>
                                <i class="icon icon-arrow"></i>
                                вернуться назад
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?=$data->display('patch')?>

<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>

<?php get_footer(); ?>

