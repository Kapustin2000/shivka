<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23.04.19
 * Time: 13:39
 */
$id = shivka_escapeParam(basename(parse_url($_SERVER["HTTP_REFERER"], PHP_URL_PATH)));

$related_gallery = pods('gallery')->find(array('where' => 'works.slug = "'.$id.'"', 'limit'=>$_REQUEST['limit'], 'offset'=>$_REQUEST['offset']));


       while($related_gallery->fetch()){ ?>
            <div class="col-xl-4 col-sm-6 col-12">
                <a href="<?=get_permalink($related_gallery->display('id'))?>" class="service-item">
                    <div class="service-img-wrap">
                        <div class="service-img" style="background-image: url(<?=$related_gallery->display('preview')?>);"></div>
                    </div>
                    <div class="service-title"><?=$related_gallery->display('post_title')?></div>
                    <span class="btn btn-primary btn-span">смотреть</span>
                </a>
            </div>


<?php } ?>