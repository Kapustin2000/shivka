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
                                <?php foreach($data->field('images') as $image) { ?>
                                    <div class="gallery-item">
                                        <img src="<?=$image['guid']?>" alt="<?=$image['post_title']?>">
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="bottom">
                            <div class="pagination">
                                <a href="#" class="arrow prev-arrow">
                                    <i class="icon icon-prev"></i>
                                </a>
                                <a href="#" class="active">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#" class="arrow next-arrow">
                                    <i class="icon icon-next"></i>
                                </a>
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
            </div>
        </section>
    </div>


<?php }else{ ?>

    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>

<?php get_footer(); ?>




