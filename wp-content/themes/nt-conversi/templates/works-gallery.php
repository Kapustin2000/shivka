<?php
/*
Template Name: Works Gallery
*/
if($id = shivka_escapeParam(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)))) {

    $params = array('limit' => 1,
        'where' => "post_name = '" . $id . "'"
    );
    $data = pods('gallery')->find($params);

    $found = false;
    if (!empty($data->total_found())) {
        while ($data->fetch()) {
            shivka_SetPodsSeo($data->display('id'));
            $found = true;
            break;
        }
    } 
    $pages_count = ceil(count($data->field('images'))/10);
}else{
    $found = false;
}

?>
<?php get_header(); ?>

<?php if($found) {  ?>


    <div class="smarthoop-wrap smarthoop-works">
        <section class="work-info">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="work-info-img">
                            <img src="<?=$data->display('preview')?>" alt="<?=$data->display('post_title')?>">
                        </div>
                        <div class="info-block">
                            <h1><span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span></h1>
                            <?=$data->display('post_content')?>
                        </div> 
                        <?php if(!empty($data->field('images'))){ ?>
                            <div class="work-gallery">
                                <?php for($i=0 + ((isset($_GET['pages']) && (int) $_GET['pages']!=1) ? ((int) $_GET['pages'] * 10 - 10) : 0);$i<((isset($_GET['pages']) && (int) $_GET['pages']!=1) ? ((int) $_GET['pages'] * 10) : 10);$i++) { if(isset($data->field('images')[$i])){?>
                                <div class="gallery-item">
                                    <img src="<?=$data->field('images')[$i]['guid']?>" alt="<?=$data->field('images')[$i]['post_title']?>">
                                </div>
                                <?php }} ?>
                            </div>
                        <?php } ?>
                        <div class="bottom">
                            <?php if($pages_count!=1){ ?>
                            <div class="pagination">
                                <?php if(isset($_GET['pages']) && (int) $_GET['pages']!=1){ ?>
                                <a href="<?=$_SERVER['REQUEST_URI']?>&pages=<?=(int) $_GET['pages']-1?>" class="arrow prev-arrow">
                                    <i class="icon icon-prev"></i>
                                </a>
                                <?php } ?>
                                <?php for($i=1;$i<=$pages_count;$i++){ ?>
                                    <a href="<?=$_SERVER['REQUEST_URI']?><?php echo (!isset($_GET['pages']) ? '?' : '&') ?>pages=<?=$i?>" <?php if(isset($_GET['pages']) && (int) $_GET['pages'] == $i || !isset($_GET['pages']) && $i==1) { ?> class="active" <?php } ?>><?=$i?></a>
                                <?php } ?>
                                <?php if($pages_count>1 && (!isset($_GET['pages']) || $_GET['pages']==1) || isset($_GET['pages']) && ((int) $_GET['pages'] + 1) <= $pages_count){ ?>
                                    <a <?php if(!isset($_GET['pages'])){ ?> href="<?=$_SERVER['REQUEST_URI']?>?pages=2"  <?php }else{ ?> href="<?=$_SERVER['REQUEST_URI']?>&pages=<?=$_GET['pages']+1?>" <?php } ?> class="arrow next-arrow">
                                    <i class="icon icon-next"></i>
                                </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <a href="/nashi-raboti" class="back">
                                <span>
                                    <i class="icon icon-arrow"></i>
                                    Назад к работам
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php }else{ ?>

    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>

<?php get_footer(); ?>




