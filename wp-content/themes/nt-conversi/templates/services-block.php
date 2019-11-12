

<?php
//?industry=e-commerece&business_solution=buisness-category&technology=c#
$styles = array(
    'col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12',
    'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12'
);
$params = array(
    'orderby'=>"order_weight.meta_value + 0 DESC,id DESC",
    'offset' => isset($_REQUEST['offset']) ? intval($_REQUEST['offset']) : 0,
    'limit' => isset($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 0
);
$data = pods('services')->find($params);

if($data->total()){


    while ( $data->fetch() ) {   ?>
<!--        <div class="col-xl-4 col-lg-6 col-12">-->
        <div class="col-4">
            <a href="<?=get_permalink($data->display('id'))?>" class="service-item">
                <div class="service-img-wrap">
                    <div class="service-img" style="background-image: url( <?=$data->display('preview')?>);"></div>
                </div>
                <div class="service-title"><?=$data->display('post_title')?></div>
                <span class="btn btn-primary btn-span">смотреть</span>
            </a>
        </div>
    <?php }  } else {
    header("HTTP/1.0 404 Not Data Found");
    exit();
}?>