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
<!--CATEGORY!!!!-->

<?php get_header(); ?>

<?php if($found){ ?>

    <div class="smarthoop-wrap smarthoop-services smarthoop-services-category">
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            <span>&nbsp;вышивка на крое&nbsp;</span>
                        </h1>
                        <div class="decorative yellow"></div>
                        <div class="decorative lavander"></div>
                        <div class="row">

                                <div class="col-lg-6 col-12">
                                    <a href="#" class="service-item">
                                        <div class="service-title-wrap">
                                            <div class="service-title">вышивка на футболках, поло, толстовках</div>
                                            <div class="service-desc service-small-desc">Краткое описание услуги Заказывайте у нас вышивку орнаментов любой сложности для вышиванок. Мы можем предложить вам готовые узоры, а также выполнить вышивку по вашему макету. Краткое описание услуги Заказывайте у нас вышивку орнаментов любой сложности для вышиванок. </div>
                                            <br>
                                            <div class="service-desc service-full-desc">Мы можем предложить вам готовые узоры, а также выполнить вышивку по вашему макету.Краткое описание услуги Заказывайте у нас вышивку орнаментов любой сложности для вышиванок. Мы можем предложить вам готовые узоры, а также выполнить вышивку по вашему макету.</div>
                                        </div>
                                        <div class="service-img-wrap">
                                            <div class="service-img" style="background-image: url(http://shivka/wp-content/uploads/2018/11/photo5346096641628809665.jpg);"></div>
                                        </div>
                                        <button type="button" class="btn btn-primary">подробнее</button>
                                    </a>
                                </div>

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



<?php get_footer() ?>
