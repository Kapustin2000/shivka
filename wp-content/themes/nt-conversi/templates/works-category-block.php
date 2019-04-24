<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.04.19
 * Time: 13:39
 */
$id = shivka_escapeParam(trim($_REQUEST['id'], '/'));
$params = array('limit' => 1,
    'where' => "post_name = '" . $id . "'"
);
$data = pods('works')->find($params);
?>

<?php foreach($data->field('related_works') as $work) { $related_works = pods('works')->find(array('limit' => 1, 'where' => 'ID = '.$work['ID']));?>
    <?php while($related_works->fetch()){ ?>
        <!--                                        <div class="col-md-4 col-12">-->
        <div class="col-4">
            <a href="<?=get_permalink($related_works->display('id'))?>" class="service-item">
                <div class="service-img-wrap">
                    <div class="service-img" style="background-image: url(<?=$related_works->display('preview')?>);"></div>
                </div>
                <div class="service-title"><?=$related_works->display('post_title')?></div>
                <button type="button" class="btn btn-primary">смотреть</button>
            </a>
        </div>
    <?php } }?>