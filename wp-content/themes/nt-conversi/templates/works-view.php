<?php
/*
Template Name: Works - view
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

<style>
    .work-gallery {
        display: grid;
        grid-column-gap: 50px;
    }
</style>

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-works">
        <section class="work-info">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h1><span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span></h1>
                        <?=$data->display('description')?>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="about-img">
                            <img src="<?=$data->display('image')?>" alt="Work">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="work-gallery">
                            <img src="<?=$data->display('image')?>" alt="Work">
                            <img src="<?=$data->display('image')?>" alt="Work">
                            <img src="<?=$data->display('image')?>" alt="Work">
                            <img src="<?=$data->display('image')?>" alt="Work">
                            <img src="<?=$data->display('image')?>" alt="Work">
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
