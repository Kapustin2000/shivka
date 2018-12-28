<?php
/*
Template Name: References
*/

?>
<?php
$settings = pods('reference_settings')->find();
$params = array(
    'orderby' => hys_sort_by(true),
    'limit' => 1
);
$main_reference = pods('reference')->find($params);



$used_ids = array();

array_push($used_ids,$main_reference->display( 'id' ));


$params = array('where'=>hys_filter_by_industry_category_technology_query($used_ids,true, false, false),
    'orderby' => hys_sort_by()
);
  $all_references = pods('reference')->find($params);

?>
<?php get_header();
      get_template_part( 'index-header' ); ?>

<section id="references" class="references">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="references-title">
                    <h2 class="text-night-blue"><?=$settings->display('title')?></h2>
                    <div class="row">
                        <div class="col-xs-12">
                            <?=$settings->display('description')?>
                        </div>
                    </div>
                </div>
                <div class="filters-wrap">
                    <?php
                    $data = pods('industry')->find(
                        array(
                            'orderby' => 'order_weight.meta_value DESC , term_id DESC',
                        )
                    );?>

                    <div id="industry" class="tag-wrap">
                        <div data-name="0" class="tag outline">All</div>
                        <?php while ( $data->fetch() ) {   ?>
                            <?php if( $data->display('count') > 0) { ?>

                                <div class="tag outline <?php if(isset($_GET['industry'])) {
                                    $technology = explode(',',$_GET['industry']);
                                    foreach($technology as $item){
                                        if($item== $data->display( 'slug' )){
                                            echo "active";
                                        }
                                    }
                                }?>"
                                     data-name="<?php echo $data->display( 'slug' )?>">
                                    <?php echo $data->display( 'name' )?>
                                </div>
                            <?php }} ?>
                    </div>

                    <div class="industry-wrap">
                        <?php
                        $data->reset()?>
                        <select id="industry" class="industry-select accordion hidden">
                            <option value="0">All industries</option>
                            <?php while ( $data->fetch() ) {   ?>
                                <?php if( $data->display('count') > 0) { ?>
                                    <option
                                        <?php if(isset($_GET['industry'])) {
                                            $industry = explode(',',$_GET['industry']);
                                            foreach($industry as $item){
                                                if($item== $data->display( 'slug' )){
                                                    echo "selected";
                                                }
                                            }
                                        }?>
                                            value="<?php echo $data->display( 'slug' )?>"><?php echo $data->display( 'name' )?></option>
                                <?php } } ?>
                        </select>
                    </div>

                    <div class="content-type-wrap">
                        <?php
                        $content_type = 0;
                        if(isset($_GET['content-type'])){
                            $content_type =  ((int) $_GET['content-type'] <=3 ? (int) $_GET['content-type'] : 0);
                        }

                        ?>
                        <select id="content-type" class="content-type-select accordion hidden">
                            <option value="0">All Content Type</option>
                            <option <?php if($content_type==1) echo "selected" ?> value="1">Audio</option>
                            <option <?php if($content_type==2) echo "selected" ?>  value="2">Video</option>
                            <option <?php if($content_type==3) echo "selected" ?>  value="3">Text</option>
                        </select>
                    </div>

                </div>
                <?php if($main_reference->total_found()){ ?>
                    <div class="success-cases-references">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="pinned-reference-wrap">
                                    <div class="reference-media">
                                        <?php if($main_reference->field('info_type') == 1 ){ ?>
                                            <!-- Soundcloud -->
                                            <iframe id="soundcloud-player"
                                                    width="100%"
                                                    height="300"
                                                    scrolling="no"
                                                    frameborder="no"
                                                    allow="autoplay"
                                                    class="soundcloud-frame"
                                                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $main_reference->display( 'link_info' )?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                        <?php }elseif($main_reference->field('info_type') == 2 ){ ?>
                                            <!-- Youtube -->
                                            <div class="youtube-wrap">
                                                <div class="youtube-thumbnail"
                                                     id="thumbnail"
                                                     data-src="<?=$main_reference->display('preview');?>">
                                                    <button id="play-button" class="btn-circle btn-play" onclick="loadPlayer(this, '<?=$main_reference->display('link_info')?>')"></button>
                                                </div>
                                                <div class="player" id="<?=$main_reference->display('link_info')?>"></div>
                                            </div>
                                        <?php }elseif($main_reference->field('info_type') == 3 ){ ?>
                                            <!-- Text -->
                                            <div class="youtube-wrap">
                                                <div class="youtube-thumbnail"
                                                     id="thumbnail"
                                                     data-src="<?=$main_reference->display('preview');?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a href="<?=get_permalink($main_reference->display('id'))?>" class="reference-description-wrap">
                                        <h3 class="reference-description">
                                            <?=$main_reference->display('post_content')?>
                                        </h3>
                                        <div class="reference-description-info">
                                            <div class="author">
                                                <div class="author-avatar" data-src="<?=$main_reference->display('client_photo')?>"></div>
                                                <div class="author-info">
                                                    <h3 class="author-name text-white"><?=$main_reference->display('client_first_name') .' '.$main_reference->display('client_second_name')?></h3>
                                                    <div class="author-position text-white"><?=$main_reference->display('client_position')?></div>
                                                </div>
                                            </div>
                                            <div class="logo-wrap">
                                                <img src="<?=$main_reference->display('external_link')?>" data-src="<?=$main_reference->display('logo')?>" alt="Author">
                                            </div>
                                        </div>
                                    </a>
                                    <div class="reference-title">
                                        <div class="label-wrap">
                                            <label><?=$main_reference->display('industry')?></label>
                                            <label><?=$main_reference->display('info_type')?></label>
                                        </div>
                                        <h2><?=$main_reference->display('post_title')?></h2>
                                        <a class="btn-icon btn-arrow blue hidden-md hidden-sm hidden-xs" href="<?=get_permalink($main_reference->display('id'))?>">
                                            <span>See details</span>
                                            <i class="icon-arrow-short"></i>
                                        </a>
                                    </div>
                                    <a class="btn-icon btn-arrow blue hidden-xl hidden-lg" href="<?=get_permalink($main_reference->display('id'))?>">
                                        <span>See details</span>
                                        <i class="icon-arrow-short"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($all_references->total_found()){ ?>
                <div class="success-cases-reference-list">
                    <div class="row">
                        <?php while($all_references->fetch()){ ?>
                            <div class="col-lg-6 col-xs-12">
                                <a href="<?=get_permalink($all_references->display('id'))?>" class="reference-description-wrap">
                                    <div class="label-wrap">
                                        <label><?=$all_references->display('industry')?></label>
                                        <label><?=$all_references->display('info_type')?></label>
                                    </div>
                                    <h3 class="reference-description">
                                        <?=$all_references->display('post_content')?>
                                    </h3>
                                    <div class="reference-description-info">
                                        <div class="author">
                                            <div class="author-avatar" data-src="<?=$all_references->display('client_photo')?>"></div>
                                            <div class="author-info">
                                                <h3 class="author-name"><?=$all_references->display('client_first_name') .' '.$all_references->display('client_second_name')?></h3>
                                                <div class="author-position"><?=$all_references->display('client_position')?></div>
                                            </div>
                                        </div>
                                        <div class="logo-wrap">
                                            <img src="" data-src="<?=$all_references->display('logo')?>" alt="Author">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
             <?php }else{ ?>
                    <h3>No data</h3>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php

    if (  is_active_sidebar( 'references-page' )  ) : ?>
        <?php if ( is_active_sidebar( 'references-page' ) ) : ?>
            <?php dynamic_sidebar( 'references-page' ); ?>
        <?php endif; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
