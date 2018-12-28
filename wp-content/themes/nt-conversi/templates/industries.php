<?php
/*
Template Name: Industries
*/

if(isset($_GET['id'])) {
    $id = hys_escapeParam(trim($_GET['id'], '/'));

    $params = array('limit' => 1,
        'where' => "slug = '" . $id . "'"
    );
    $industry = pods('industry')->find($params);

    if (!empty($industry->total_found())) {
        while ($industry->fetch()) {
            hys_SetPodsSeo($industry->display('id'), true);
            break;
        }
    }
}
?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>


    <div id="blog" class="industries">
        <section class="industry-info">
            <div class="container has-margin-bottom">
                <div class="container-mx">
                    <div class="row">
                        <?php
                        if(isset($_GET['id'])){
                        $id = hys_escapeParam(trim($_GET['id'], '/'));

                        $params = array('limit' => 1,
                            'where'=>"slug = '".$id."'"
                        );
                        $industry = pods('industry')->find($params);
                        if($industry->total_found()){
                        $_GET['industry'] = $id;




                        /* Whitepaper */


                        $params = array(
                            'where' => hys_filter_by_industry_category_technology_query(null,false,false,false). (hys_filter_by_industry_category_technology_query(null,false,false,false) ? ' AND  ' : '') .'blog_type.meta_value = 1',
                            'orderby' => hys_sort_by(true),
                            'limit' => 1
                        ); 
                        $whitepaper = pods('blog')->find($params);
                            $used_ids = array();
                             while($whitepaper->fetch()){
                                 array_push($used_ids,$whitepaper->display('id'));
                             }
                            /* Blog */
                            $second_filter = '';
                            if(!isset($_GET['type']) || isset($_GET['type']) && $_GET['type'] != 1){
                                $second_filter= (hys_filter_by_industry_category_technology_query($used_ids) ? ' AND  ' : '') .'blog_type.meta_value != 1';
                            }
                            $params = array(
                                'where' => hys_filter_by_industry_category_technology_query($used_ids). $second_filter,
                                'orderby' => hys_sort_by(true),
                                'limit' => 3
                            );
                            $blog = pods('blog')->find($params);
                        /* Reference  */

                        $params = array('where'=>hys_filter_by_industry_category_technology_query(null,true, false, false),
                            'orderby' => hys_sort_by(),
                            'limit' => 3
                        );
                        $reference = pods('reference')->find($params);



                        /*  Success cases  */
                        $params = array('where'=>hys_filter_by_industry_category_technology_query(null,true, false, false),
                            'orderby' => hys_sort_by(),
                            'limit' => 3
                        );
                        $cases = pods('success_cases')->find($params);


                        }
                        ?>
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-lg-5 col-xs-12">
                                    <h2>
                                        <?=$industry->display('title')?>
                                    </h2>
                                    <div class="small-description"><?=$industry->display('description')?></div>
                                    <div class="full-description hidden"><?=$industry->display('description2')?></div>
                                    <button type="button" class="btn transparent toggle-description">Read More</button>
                                </div>
                                <div class="col-md-offset-1 col-md-3 hidden-md hidden-sm hidden-xs">
                                    <div class="industry-info-item">
                                        <a href="/success-cases/?industry=<?=$id?>">
                                            <i class="icon icon-arrow-short"></i>
                                        </a>
                                        <h2 class="text-blue"><?=$cases->total_found();?></h2>
                                        <small class="text-grey-blue">Cases</small>
                                    </div>
                                </div>
                                <div class="col-md-3 hidden-md hidden-sm hidden-xs">
                                    <div class="industry-info-item">
                                        <a href="/blog/?industry=<?=$id?>">
                                            <i class="icon icon-arrow-short"></i>
                                        </a>
                                        <h2 class="text-blue"><?=($blog->total_found()+$whitepaper->total_found());?></h2>
                                        <small class="text-grey-blue">Publications</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if($cases->total_found()){ ?>
            <section class="success-cases">
                <div class="decorative"></div>
                <div class="container has-margin-bottom">
                    <div class="container-mx">
                        <div class="row">
                            <div class="success-cases-content col-xl-8 col-lg-9 col-xs-12">
                                 <div class="row ajax-call">
                                     <!-- Success - cases -->
                                     <?php
                                     // Loop through the items returned
                                     $count_block = 0;
                                     while ( $cases->fetch() ) { $count_block++; if($count_block == 5) { $count_block = 1;}  ?>
                                     <div class="success-cases-item col-xs-12">
                                         <div class="success-cases-heading hidden-md hidden-sm hidden-xs">
                                             <a href="<?php echo get_post_permalink( $cases->display( 'id' ) ) ?>&color=<?=$count_block?>"
                                                class="success-cases-image">
                                                 <div class="success-cases-image-wrap"
                                                      data-src="<?php echo $cases->display( 'image2' )?>"></div>
                                                 <div class="logo-wrap">
                                                     <img src="<?php echo $cases->display( 'logo' )?>" alt="<?php echo $cases->display( 'post_title' )?>">
                                                 </div>
                                             </a>
                                         </div>
                                         <div class="success-cases-info-wrap">
                                             <div class="success-case-info">
                                                 <div class="success-case-info-wrap hidden-xl hidden-lg">
                                                     <a href="<?php echo get_post_permalink( $cases->display( 'id' ) ) ?>&color=<?=$count_block?>"
                                                        class="success-cases-image">
                                                         <div class="success-cases-image-wrap"
                                                              data-src="<?php echo $cases->display( 'image2' )?>"></div>
                                                         <div class="logo-wrap">
                                                             <img src="<?php echo $cases->display( 'logo' )?>" alt="<?php echo $cases->display( 'post_title' )?>">
                                                         </div>
                                                     </a>
                                                     <?php foreach(wp_get_object_terms($cases->display( 'id' ), 'industry') as $industry) { ?>
                                                         <a class="tag outline" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                                                     <?php } ?>
                                                 </div>
                                                 <?php foreach(wp_get_object_terms($cases->display( 'id' ), 'industry') as $industry) { ?>
                                                     <a class="tag outline hidden-md hidden-sm hidden-xs" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                                                 <?php } ?>
                                                 <h3 title="<?php echo $cases->display( 'post_title' )?>">
                                                     <a class="truncate truncate-3" href="<?php echo get_post_permalink( $cases->display( 'id' ) ) ?>&color=<?=$count_block?>">
                                                         <?php echo $cases->display( 'post_title' )?>
                                                     </a>
                                                 </h3>
                                                 <a href="<?php echo get_post_permalink( $cases->display( 'id' ) ) ?>&color=<?=$count_block?>" class="btn-icon blue transparent hidden-md hidden-sm hidden-xs">
                                                     <i class="ic ic-arrow">
                                                         <span></span>
                                                     </i>
                                                 </a>
                                             </div>
                                         </div>
                                     </div>
                                <?php } ?>
                                 </div>
                            </div>
                            <div class="success-cases-description col-xl-offset-1 col-xs-3 hidden-md hidden-sm hidden-xs">
                                <h2 class="text-blue">Our Cases</h2>
                                <p>Read our success cases to find out what business tasks we solve as long-term partners</p>
                                <a href="/success-cases" class="btn-icon btn-arrow orange">
                                    <span>See More Cases</span>
                                    <i class="icon-arrow-short"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <!-- References -->
        <?php
        if($reference->total_found()){ ?>
        <section class="success-cases-references">
            <div class="container has-margin-bottom">
                <div class="success-cases-content">
                    <div class="row">
                        <!-- Reference -->
                        <div class="col-xs-12">
                            <!-- Wrapper for slides -->
                            <h2 class="text-blue hidden-xl hidden-lg">What Our Partners Say</h2>
                            <div class="top">
                                <div id="reference-carousel" class="carousel slide" data-interval="false">
                                    <div class="carousel-inner ajax-call" role="listbox">
                                        <?php
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
                                                            <img src="<?php echo $reference->display( 'logo' )?>" alt="<?php echo $reference->display( 'post_title' )?>">
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
                                        <h2 class="text-blue hidden-md hidden-sm hidden-xs">What Our Partners Say</h2>
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
            </div>
        </section>
        <?php } ?>

        <!-- Blog -->
        <section id="blog-posts" class="blog">
            <div class="top-posts">
                <div class="container has-margin-bottom">
                    <div class="container-mx">
                        <div class="row">
                            <!-- News left -->
                            <div class="left col-xs-12">
                                <div class="row">
                                    <?php if($blog->total_found()){ ?>
                                        <div class="ajax-call">
                                            <?php
                                            $params = array(
                                                'where' => hys_filter_by_industry_category_technology_query($used_ids),
                                                'orderby' => hys_sort_by(true)
                                            );
                                            $data = pods('blog')->find($params);
                                            $total_found = $data->total_found();
                                            ?>
                                        </div>
                                        <div class="ajax-call-message">
                                            <div class="loader-placeholder col-lg-12 col-md-6 col-xs-12">
                                                <div class="placeholder-image-wrap hidden-xl hidden-lg">
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-tags-wrap">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-title-wrap">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-description-wrap">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="loader-placeholder col-lg-12 col-md-6 col-xs-12">
                                                <div class="placeholder-image-wrap hidden-xl hidden-lg">
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-tags-wrap">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-title-wrap">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class="placeholder-description-wrap">
                                                    <div></div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <button type="button" class="btn-icon">
                                                    <span>Show More</span>
                                                    <i class="icon icon-arrow-short"></i>
                                                </button>
                                            </div>
                                        </div>

                                    <?php }else{ ?>
                                        <h3>No data</h3>
                                    <?php } ?>
                                    <div class="col-lg-12 col-md-6 col-xs-12">
                                        <a href="/blog" class="btn-icon btn-arrow orange">
                                            <span>See More Publications</span>
                                            <i class="icon-arrow-short"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Whitepaper right -->
                            <?php

                            // Loop through the items returned
                            $whitepaper->reset();
                            while ( $whitepaper->fetch() ) {    ?>

                                <div class="right col-xs-12">
                                    <div class="blog-filters row">
                                        <div class="filters-wrap col-xs-12">
                                            <div class="tabs">
                                                <div class="tab-nav">
                                                    <button id="0" <?php if(isset($_GET['type']) && $_GET['type'] == 0 || !isset($_GET['type'])){ ?> class="active" <?php } ?> type="button">All</button>
                                                    <button id="2" <?php if(isset($_GET['type']) && $_GET['type'] == 2){ ?> class="active" <?php } ?> type="button">Research</button>
                                                    <button id="3" <?php if(isset($_GET['type']) && $_GET['type'] == 3){ ?> class="active" <?php } ?> type="button">News</button>
                                                    <button id="1" <?php if(isset($_GET['type']) && $_GET['type'] == 1){ ?> class="active" <?php } ?> type="button">White papers</button>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image-container" data-src="<?=$whitepaper->display( 'image' )?>"></div>
                                    <div class="blog-item">
                                        <div class="blog-item-heading">
                                            <a href="/blog-search?type=<?=$whitepaper->field( 'blog_type' )?>" class="tag-doubled night-blue">
                                                <span><?php echo $whitepaper->display( 'blog_type' )?></span>
                                                <span><?php echo $whitepaper->display( 'file_type' )?></span>
                                            </a>
                                        </div>
                                        <div class="blog-info">
                                            <h3>
                                                <a class="truncate" href="<?php echo get_post_permalink( $whitepaper->display( 'id' ) ) ?>">
                                                    <?php echo $whitepaper->display( 'post_title' )?>
                                                </a>
                                            </h3>
                                            <?php echo $whitepaper->display( 'post_content' )?>
                                            <a href="<?php echo get_post_permalink( $whitepaper->display( 'id' ) ) ?>" class="btn-icon blue transparent">
                                                <i class="ic ic-arrow">
                                                    <span></span>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php }  ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
    <?php echo do_shortcode('[get_book_meeting_block]') ?>
<?php }else{ ?>
    <script language="javascript" type="text/javascript">
        document.location = "/404";
    </script>
      <?php  } ?>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            hys_init_tabs(2, <?php echo json_encode($used_ids); ?>);
        });
    </script>

<?php get_footer(); ?>