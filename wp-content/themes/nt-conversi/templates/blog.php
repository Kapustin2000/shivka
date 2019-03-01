<?php
/*
Template Name: Blog
*/

?>
<?php
$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC",
    'offset' => shivka_offset(6),
);
$data = pods('blog')->find($params);



?>

<?php get_header(); ?>

<div class="smarthoop-wrap smarthoop-blog">
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><span>&nbsp;Наш блог&nbsp;</span></h1>
                    <div class="tabs-wrap lavander">
                        <a href="?type=0" type="button" class="active">
                            <span>Все</span>
                        </a>
                        <a href="?type=1" type="button">
                            <span>Статьи</span>
                        </a>
                        <a href="?type=2" type="button">
                            <span>События</span>
                        </a>
                        <a href="?type=3" type="button">
                            <span>Новости</span>
                        </a>
                    </div>
                    <div class="row">
                        <!--  TEMPORARY  -->
                        <?php  while($data->fetch()){?>
                            <div class="col-md-6 col-12">
                                <a class="blog-post" data-post-type="article" href="<?=get_permalink($data->display('id'))?>">
                                    <div class="blog-img-wrap">
                                        <div class="blog-img" style="background-image: url(<?=$data->display('image')?>);"></div>
                                        <div class="blog-type"><?=$data->display('blog_type')?></div>
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-title"><?=$data->display('post_title')?></div>
                                        <p><?=$data->display('post_content')?></p>
                                    </div>
                                    <button type="button" class="btn btn-primary">смотреть</button>
                                </a>
                            </div>
                        <?php } ?>

                        <!--  TEMPORARY  -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php if (function_exists('wp_corenavi')) wp_corenavi($data->total_found()); ?>
<?php get_footer(); ?>
