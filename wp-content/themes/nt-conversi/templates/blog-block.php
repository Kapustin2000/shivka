<?php
$styles = array(
    'col-md-6 col-xs-12',
    'col-xs-12',
    'col-lg-12 col-md-6 col-xs-12'
);
$second_filter = '';
if(!isset($_REQUEST['types']) ||  isset($_REQUEST['types']) &&  $_REQUEST['types']!="all"){
    if(!isset($_REQUEST['type']) || isset($_REQUEST['type']) && $_REQUEST['type'] != 1){
        $second_filter= (hys_filter_by_industry_category_technology_query(isset($_REQUEST['used_ids']) ? $_REQUEST['used_ids'] : null ) ? ' AND  ' : '') .'blog_type.meta_value != 1';
    }
}
$params = array(
    'where'=>hys_filter_by_industry_category_technology_query(isset($_REQUEST['used_ids']) ? $_REQUEST['used_ids'] : null ).$second_filter,
    'orderby' => hys_sort_by(true),
    'offset' => isset($_REQUEST['offset']) ? intval($_REQUEST['offset']) : 0,
    'limit' => isset($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 0
);


$data = pods('blog')->find($params);

if($data->total()){

    // Loop through the items returned
    while ( $data->fetch() ) {  ?>

        <div class="<?php echo $styles[(int) $_REQUEST['size']];  ?>">
            <div class="blog-item">
                <div class="blog-item-heading">
                    <div class="blog-item-heading-wrap">
                        <a class="image-wrap"
                           href="<?php echo $data->display( 'external_link' )?>"
                           style="background-image: url(<?php echo $data->display( 'image' )?>);">
                        </a>
                        <?php if($data->field( 'blog_type' ) == 1) { ?>
                            <a href="/blog-search?type=<?=$data->display( 'blog_type' )?>" class="tag-doubled night-blue">
                                <span><?php echo $data->display( 'blog_type' )?></span>
                                <span><?php echo $data->display( 'file_type' )?></span>
                            </a>
                        <?php }else{  ?>
                            <a href="/blog-search?type=<?=$data->display( 'blog_type' )?>"
                               class="tag <?php if($data->field( 'blog_type' ) == 3){ echo "orange"; } ?>">
                                <?php echo $data->display( 'blog_type' )?>
                            </a>
                        <?php } ?>
                        <span class="date"><?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?></span>
                        <div class="blog-statistics">
                            <?php
                            $settings = pods('ui_settings');
                            if( $settings->field('dispaly_react_system_blog')){ ?>
                                <ul class="links-list">
                                    <li>
                                        <i class="icon icon-views"></i>
                                        <?php echo ($data->display( 'views') + 1 )?>
                                    </li>
                                    <li>
                                        <i class="icon icon-clap"></i>
                                        <?php echo $data->display( 'claps' )?>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="blog-info">
                    <h3 title="<?php echo $data->display( 'post_title' )?>">
                        <a class="truncate" href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>">
                            <?php echo $data->display( 'post_title' )?>
                        </a>
                    </h3>
                    <?php echo $data->display( 'post_content' )?> 
                    <div class="blog-statistics blog-statistics-mobile">
                        <?php
                        if( $settings->field('dispaly_react_system_blog')){ ?>
                            <ul class="links-list">
                                <li>
                                    <i class="icon icon-views"></i>
                                    <?php echo $data->display( 'views')?>
                                </li>
                                <li>
                                    <i class="icon icon-clap"></i>
                                    <?php echo $data->display( 'claps' )?>
                                </li>
                            </ul>
                        <?php }  ?>
                    </div>
                    <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" class="btn-icon blue transparent">
                        <i class="ic ic-arrow">
                            <span></span>
                        </i>
                    </a>
                </div>
            </div>
        </div>

    <?php }  } else {
    header('HTTP/1.1 500 No data');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
}?>