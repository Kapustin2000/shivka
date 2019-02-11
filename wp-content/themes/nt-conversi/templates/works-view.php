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

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-works">
        <section class="work-info">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <div class="work-info-img">
                            <img src="<?=$data->display('image')?>" alt="Work">
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="info-block">
                            <h1><span>&nbsp;<?=$data->display('post_title')?>&nbsp;</span></h1>
                            <?=$data->display('description')?>
                            <p>
                                Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.
                            </p>
                            <p>
                                Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.
                            </p>
                            <p>
                                Современное промышленное японское (Toyota) и немецкое Современное промышленное японское (Toyota) и немецкоеСовременное промышленное японское (Toyota) и немецкое Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="work-gallery">
                            <div class="gallery-item">
                                <img src="<?=$data->display('image')?>" alt="Work">
                            </div>
                            <div class="gallery-item">
                                <img src="<?=$data->display('image')?>" alt="Work">
                            </div>
                            <div class="gallery-item">
                                <img src="<?=$data->display('image')?>" alt="Work">
                            </div>
                            <div class="gallery-item">
                                <img src="<?=$data->display('image')?>" alt="Work">
                            </div>
                            <div class="gallery-item">
                                <img src="<?=$data->display('image')?>" alt="Work">
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="pagination">
                                <a href="#"><</a>
                                <a href="#" class="active">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                ...
                                <a href="#">21</a>
                                <a href="#">></a>
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



<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>

<?php get_footer(); ?>
