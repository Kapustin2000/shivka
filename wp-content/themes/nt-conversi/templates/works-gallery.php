<?php
/*
Template Name: Works Gallery
*/
if(isset($_GET['id'])) {
    $id = shivka_escapeParam(trim($_GET['id'], '/'));
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
    $pages_count = round(count($data->field('images'))/4);
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
                                <?php for($i=0 + ((isset($_GET['page']) && (int) $_GET['page']!=1) ? ((int) $_GET['page'] * 4 - 4) : 0);$i<((isset($_GET['page']) && (int) $_GET['page']!=1) ? ((int) $_GET['page'] * 4) : 4);$i++) {?>
                                <div class="gallery-item">
                                    <img src="<?=$data->field('images')[$i]['guid']?>" alt="<?=$data->field('images')[$i]['post_title']?>">
                                </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if($pages_count!=1){ ?>
                        <div class="bottom">
                            <div class="pagination">
                                <?php if(isset($_GET['page']) && (int) $_GET['page']!=1){ ?>
                                <a href="<?=$_SERVER['REQUEST_URI']?>&page=<?=(int) $_GET['page']-1?>" class="arrow prev-arrow">
                                    <i class="icon icon-prev"></i>
                                </a>
                                <?php } ?>
                                <?php for($i=1;$i<=$pages_count;$i++){ ?>
                                    <a href="<?=$_SERVER['REQUEST_URI']?>&page=<?=$i?>" <?php if(isset($_GET['page']) && (int) $_GET['page'] == $i || !isset($_GET['page']) && $i==1) { ?> class="active" <?php } ?>><?=$i?></a>
                                <?php } ?>
                                <?php if($pages_count>1 && (!isset($_GET['page']) || $_GET['page']==1) || isset($_GET['page']) && ((int) $_GET['page'] + 1) <= $pages_count){ ?>
                                    <a <?php if(!isset($_GET['page'])){ ?> href="<?=$_SERVER['REQUEST_URI']?>&page=2"  <?php }else{ ?> href="<?=$_SERVER['REQUEST_URI']?>&page=<?=$_GET['page']+1?>" <?php } ?> class="arrow next-arrow">
                                    <i class="icon icon-next"></i>
                                </a>
                                <?php } ?>
                            </div>
                            <a href="/works" class="back">
                                <span>
                                    <i class="icon icon-arrow"></i>
                                    Назад к работам
                                </span>
                            </a>
                        </div>
                        <?php } ?>
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




