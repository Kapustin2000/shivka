<?php
/*
Template Name: Blog
*/

?>
<?php
$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC"
);
$count = pods('blog')->find($params);
$pages_count = round(  (int) $count->total_found() /6);

$params = array(
    'where' => shivka_filters(),
    'orderby'=>"order_weight.meta_value +0 DESC,id DESC",
    'offset'=>(isset($_GET['pages']) && (int) $_GET['pages'] != 1 ? ((int) $_GET['pages']*6-6) : 0),
    'limit'=>6
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
                        <a href="?type=0" class="btn-span" <?php if(!isset($_GET['type']) || (int) $_GET['type']==0){ ?> class="active" <?php } ?>>
                            <span>Все</span>
                        </a>
                        <a href="?type=1" class="btn-span" <?php if(isset($_GET['type']) && (int) $_GET['type']==1){ ?> class="active" <?php } ?>>
                            <span>Статьи</span>
                        </a>
                        <a href="?type=2" class="btn-span" <?php if(isset($_GET['type']) && (int) $_GET['type']==2){ ?> class="active" <?php } ?>>
                            <span>События</span>
                        </a>
                        <a href="?type=3" class="btn-span" <?php if(isset($_GET['type']) && (int) $_GET['type']==3){ ?> class="active" <?php } ?>>
                            <span>Новости</span>
                        </a>
                    </div>
                    <div class="blog-inner-wrap">
                        <div class="row">
                            <?php  while($data->fetch()){?>
                                <div class="col-6">
                                    <a class="blog-post" data-post-type="article" href="<?=get_permalink($data->display('id'))?>">
                                        <div class="blog-img-wrap">
                                            <div class="blog-img" style="background-image: url(<?=$data->display('image')?>);"></div>
                                            <div class="blog-type"><?=$data->display('blog_type')?></div>
                                        </div>
                                        <div class="blog-info">
                                            <div class="blog-title"><?=$data->display('post_title')?></div>
                                            <div class="blog-short-desc"><?=$data->display('post_content')?></div>
                                        </div>
                                        <span class="btn btn-primary btn-span">подробнее</span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="blog-pagination">
                        <div class="row">
                            <div class="col-12">
                                <div class="bottom">
                                    <?php if($pages_count!=1){ ?>
                                        <div class="pagination">
                                            <?php if(isset($_GET['pages']) && (int) $_GET['pages']!=1){ ?>
                                                <a href="<?=$_SERVER['REQUEST_URI']?><?php echo (!isset($_GET['type']) && !isset($_GET['pages']) ? '?' :'&') ?>pages=<?=(int) $_GET['pages']-1?>" class="arrow prev-arrow">
                                                    <i class="icon icon-prev"></i>
                                                </a>
                                            <?php } ?>
                                            <?php for($i=1;$i<=$pages_count;$i++){ ?>
                                                <a href="<?=$_SERVER['REQUEST_URI']?><?php echo (!isset($_GET['type']) && !isset($_GET['pages']) ? '?' :'&') ?>pages=<?=$i?>" <?php if(isset($_GET['pages']) && (int) $_GET['pages'] == $i || !isset($_GET['pages']) && $i==1) { ?> class="active" <?php } ?>><?=$i?></a>
                                            <?php } ?>
                                            <?php if($pages_count>1 && (!isset($_GET['pages']) || $_GET['pages']==1) || isset($_GET['pages']) && ((int) $_GET['pages'] + 1) <= $pages_count){ ?>
                                                <a <?php if(!isset($_GET['pages'])){ ?> href="<?=$_SERVER['REQUEST_URI']?><?php echo (!isset($_GET['type']) && !isset($_GET['pages']) ? '?' :'&') ?>pages=2"  <?php }else{ ?> href="<?=$_SERVER['REQUEST_URI']?>&page=<?=$_GET['pages']+1?>" <?php } ?> class="arrow next-arrow">
                                                    <i class="icon icon-next"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div class="back"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
