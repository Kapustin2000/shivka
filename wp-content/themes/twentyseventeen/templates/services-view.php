<?php
/*
Template Name: Services - view
*/
$id = shivka_escapeParam(trim($_GET['id'], '/'));
$params = array('limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('services')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        shivka_SetPodsSeo($data->display('id'));
        $found = true;
        break;

    }
}


$params = array(
    'orderby'=>"order_weight.meta_value DESC,id DESC",
    'limit'=> 4
);
$gallery = pods('gallery')->find();


?>




    <!-- Html -->


    <!-- Need header -->
<?php get_header(); ?>
    <!-- -->






<?php if($found){ ?>

    <div class="smarthoop-single-service">
        <section class="single-service-description">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bordered">
                            <div class="row">
                                <div class="col-xl-6 col-12">
                                    <div class="service-img">
                                        <img src="  <?=$data->display('preview')?>" alt="Service">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <h1>
                                        <span><?=$data->display('post_title')?></span>
                                    </h1>
                                    <div class="text-wrap">
                                        <p>
                                            <?=$data->display('post_content')?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="single-service-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Фото готовых работ</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="gallery-wrap">
                                    <?php while($gallery->fetch()){?>
                                        <div style="background-image: url(<?=$gallery->display('image')?>);" class="img-wrap"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="see-more">
                            <a href="/" class="underline">смотреть больше фото</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-service-more">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>описание услуги</h2>
                        <div class="row">
                            <?=$data->display('full_description')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-service-shop">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bordered">
                            <h2>Готовые товары с нашей вышивкой</h2>
                            <p>Мы создаем эксклюзивные и необычайно художественные вышивки для коллекций таких брендов, как Yulia Magdych, Jean Gritsfeldt, Anna K, Varenyky Fashion, Marchi, MarKa Ua.</p>
                            <p>Мы также вышиваем шевроны и нашивки, логотипы и эмблемы компаний, создадим вышивку на одежде и крое, домашнем текстиле и полотенцах, коже и замше.</p>
                            <a type="button" class="btn btn-primary">перейти в магазин</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-service-related">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php  }else{ ?>


    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>

<?php } ?>



<?php get_footer() ?>
