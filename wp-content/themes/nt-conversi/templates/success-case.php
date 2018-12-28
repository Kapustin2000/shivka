<?php
/*
Template Name: Success - Case
*/

$id = hys_escapeParam(trim($_GET['id'], '/'));
$params = array(
    'limit' => 1,
    'where'=>"post_name = '".$id."'"
);
$data = pods('success_cases')->find($params);

$found = false;
if(!empty($data->total_found())) {
    while ($data->fetch()) {
        hys_SetPodsSeo($data->display('id'));
        $found = true;
        break;
    }
}

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<section id="blog" class="success-case">
    <div class="container has-margin-bottom">
        <div class="row">
            <div class="col-xs-12">
                <a href="/success-cases" class="btn btn-back transparent">
                    <i class="icon icon-arrow-short"></i>
                    <span>Back to Success Cases</span>
                </a>
            </div>
            <div class="col-xs-12">
                <?php
                 if(!isset($_GET['color']) || isset($_GET['color']) && (int) $_GET['color'] > 4){
                     $color_num = 1;
                 }else{
                     $color_num = (int) $_GET['color'];
                 }
                 $colors = array('','blue-overlay', 'green-overlay','violet-overlay', 'orange-overlay');
                ?>
                <div class="container-mx">
                    <?php
                    if($found){ { $id =$data->display( 'id' ); ?>
                        <div class="success-case-jumbotron <?=$colors[$color_num]?>" data-src="<?php echo $data->display( 'image' )?>">
                        <div class="success-case-info">
                            <!--industry tag-->
                            <?php foreach(wp_get_object_terms($data->display( 'id' ), 'industry') as $industry) { ?>
                                <a class="tag white" href="/success-cases-search?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                            <?php } ?>

                            <!--heading-->
                            <h2><?php echo $data->display( 'post_title' )?></h2>

                            <!--short description-->
                            <?php echo $data->display( 'post_content' )?>

                            <small>Business Solutions</small>
                            <ul class="links-list">
                                <?php foreach(wp_get_object_terms($data->display( 'id' ), 'business_solution') as $business_solution) { ?>
                                <li><a class="white" href="/success-cases-search?business_solution=<?=$business_solution->slug?>"><?=$business_solution->name?></a></li>
                                <?php } ?>
                            </ul>

                            <small>Technologies Used</small>
                            <ul class="links-list">
                                <?php foreach(wp_get_object_terms($data->display( 'id' ), 'technology') as $technology) { ?>
                                <li><a class="white" href="/success-cases-search?technology=<?=$technology->slug?>"><?=$technology->name?></a></li>
                                <?php } ?>
                            </ul>

                            <a href="<?php echo $data->display( 'external_link' )?>" target="_blank" class="partner-logo">
                                <img data-src="<?php echo $data->display( 'logo' )?>" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="success-case-content">
                        <div class="row">
                            <div class="col-lg-9 col-md-10 col-xs-12">
                                <div class="links-block">
                                    <small>Business Solutions</small>
                                    <ul class="links-list">
                                        <?php foreach(wp_get_object_terms($data->display( 'id' ), 'business_solution') as $business_solution) { ?>
                                            <li><a class="blue" href="/success-cases-search?business_solution=<?=$business_solution->slug?>"><?=$business_solution->name?></a></li>
                                        <?php } ?>
                                    </ul>

                                    <small>Technologies Used</small>
                                    <ul class="links-list">
                                        <?php foreach(wp_get_object_terms($data->display( 'id' ), 'technology') as $technology) { ?>
                                            <li><a class="blue" href="/success-cases-search?technology=<?=$technology->slug?>"><?=$technology->name?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class="content-editable">
                                    <?php echo $data->display( 'description' )?>
                                </div>
                                <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                                <div class="success-case-footer">
                                    <ul>
                                        <li>
                                            <a id="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                <i class="icon icon-facebook"></i>
                                            </a>
                                        </li>
<!--                                        <li>-->
<!--                                            <a href="#">-->
<!--                                                <i class="icon icon-instagram"></i>-->
<!--                                            </a>-->
<!--                                        </li>-->
                                        <li>
                                            <a id="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                <i class="icon icon-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="twitter" href="http://twitter.com/share?url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                                <i class="icon icon-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="btn-icon outline btn-download" href="/wp-content/uploads/pdf/<?=$id?>.pdf" download="">
                                        <span>Download Case</span>
                                        <span class="tag ghost-white">
                                         PDF
                                         <i class="icon icon-arrow-short"></i>
                                     </span>
                                    </a>
                                </div>

                                <?php } ?>
                            </div>
                            <?php if(!isset($_GET['mode']) || isset($_GET['mode']) && $_GET['mode']!='pdf') { ?>
                            <div class="social-sidebar sticky col-lg-3 col-md-2 hidden-xs">
                                <ul>
                                    <li>
                                        <a id="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                            <i class="icon icon-facebook"></i>
                                        </a>
                                    </li>
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="icon icon-instagram"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
                                    <li>
                                        <a id="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                            <i class="icon icon-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="twitter" href="http://twitter.com/share?url=<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" target="_blank">
                                            <i class="icon icon-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php if(!empty($data->field('related'))){ ?>
                <div class="success-case-related">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Related Cases</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($data->field('related') as $related) {
                            $related_post = pods('success_cases')->find(array('limit' => 1, 'where' => 't.id = '.$related['ID']));
                            while ( $related_post->fetch() ) { ?>
                                <div class="col-md-6 col-xs-12">
                                    <div class="success-cases-item">
                                        <div class="success-cases-heading">
                                            <div class="image-wrap" data-src="<?php echo $related_post->display( 'image2' )?>">
                                                <a class="logo-wrap" href="<?php echo $related_post->display( 'external_link' )?>">
                                                    <img data-src="<?php echo $related_post->display( 'logo' )?>" alt="<?php echo $data->display( 'post_title' )?>">
                                                </a>
                                            </div>
                                            <?php foreach(wp_get_object_terms($related_post->display( 'id' ), 'industry') as $industry) { ?>
                                                <a class="tag outline" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                                            <?php } ?>
                                        </div>
                                        <div class="success-case-info">
                                            <h3 title="<?php echo $related_post->display( 'post_title' )?>">
                                                <a class="truncate" href="<?php echo get_post_permalink( $related_post->display( 'id' ) ) ?>">
                                                    <?php echo $related_post->display( 'post_title' )?>
                                                </a>
                                            </h3>
                                            <?php echo $related_post->display( 'post_content' )?>
                                            <ul class="links-list">
                                                <?php foreach(wp_get_object_terms($related_post->display( 'id' ), 'business_solution') as $category) { ?>
                                                    <li><a class="link blue" href="/success-cases-search?business_solution=<?=$category->slug?>"><?=$category->name?></a></li>
                                                <?php } ?>
                                            </ul>
                                            <a href="<?php echo get_post_permalink( $related_post->display( 'id' ) ) ?>" class="btn-icon orange transparent">
                                                <i class="ic ic-arrow">
                                                    <span></span>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                    </div>


                </div>
                <?php } ?>
                <?php if(!empty($data->field('reference'))){ ?>
                <section class="success-cases-references">
                    <div class="success-cases-content">
                        <div class="row">
                            <!-- Reference -->
                            <div class="col-xs-12">
                                <!-- Wrapper for slides -->
                                <div class="top">
                                    <div id="reference-carousel" class="carousel slide" data-interval="false">
                                        <div class="carousel-inner ajax-call" role="listbox">
                                            <?php
                                            $params = array('where'=>hys_filter_by_industry_category_technology_query(null,true, false, false),
                                                'orderby' => hys_sort_by(),
                                                'limit' => 1
                                            );
                                            $reference = pods('reference')->find($params);
                                            // Loop through the items returned
                                            while ( $reference->fetch() ) {  ?>
                                                <div class="item active">
                                                    <div class="reference-media">
                                                        <?php
                                                        if($reference->field( 'info_type' ) ==  1){ ?>
                                                            <iframe id="soundcloud-player"
                                                                    width="100%"
                                                                    height="300"
                                                                    scrolling="no"
                                                                    frameborder="no"
                                                                    allow="autoplay"
                                                                    class="soundcloud-frame"
                                                                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $reference->display( 'link_info' )?>&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                                        <?php } elseif($reference->field( 'info_type' ) == 2){ ?>
                                                            <div class="youtube-wrap">
                                                                <div class="youtube-thumbnail"
                                                                     id="thumbnail"
                                                                     data-src="<?php echo $reference->display( 'preview' )?>">
                                                                    <button id="play-button" class="btn-circle btn-play" onclick="loadPlayer(this, '<?php echo $reference->display( 'link_info' )?>')"></button>
                                                                </div>
                                                                <div class="player" id="<?php echo $reference->display( 'link_info' )?>"></div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="<?=get_permalink($reference->display('id'));?>" class="reference-description-wrap">
                                                        <h3 class="reference-description"><?php echo $reference->display( 'post_content' )?></h3>
                                                        <div class="reference-description-info">
                                                            <div class="author">
                                                                <div class="author-avatar" data-src="<?php echo $reference->display( 'client_photo' )?>"></div>
                                                                <div class="author-info">
                                                                    <h3 class="author-name text-white"><?php echo $reference->display( 'client_first_name' )?> <?php echo $reference->display( 'client_second_name' )?></h3>
                                                                    <div class="author-position text-white"><?php echo $reference->display( 'client_position' )?></div>
                                                                </div>
                                                            </div>
                                                            <div class="logo-wrap">
                                                                <img data-src="<?php echo $reference->display( 'logo' )?>" alt="<?php echo $reference->display( 'post_title' )?>">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="row">
                                        <div class="col-lg-3 col-xs-12">
                                            <!-- Controls -->
                                            <a class="btn-icon btn-arrow blue" id="reference-next" href="#reference-carousel" role="button" data-slide="next">
                                                <span>Next</span>
                                                <i class="icon-arrow-short"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <a class="btn-icon btn-arrow orange" href="/references">
                                        <span>See More References</span>
                                        <i class="icon-arrow-short"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php    } } } else{ ?>
                    <script language="javascript" type="text/javascript">
                        document.location = "/404";
                    </script>

                <?php }  ?>
            </div>
</section>
<?php

if (  is_active_sidebar( 'success-cases-view-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'success-cases-view-page' ) ) : ?>
        <?php dynamic_sidebar( 'success-cases-view-page' ); ?>
    <?php endif; ?>
<?php endif; ?>


<?php get_footer(); ?>

