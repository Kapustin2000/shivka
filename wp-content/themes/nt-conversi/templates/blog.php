<?php
/*
Template Name: Blog
*/

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>
<!-- Define settings and Count-->
<?php
$used_ids = array();

?>

<section id="blog" class="blog">
    <div class="top-posts">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="row">
                    <!-- News left -->
                    <?php
                    $params = array(
                        'where' => 'blog_type.meta_value != 1',
                        'orderby' => hys_sort_by(true),
                        'limit' => 2
                    );
                    $data = pods('blog')->find($params);
                    ?>
                    <div class="col-xl-4 col-lg-5 col-xs-12">
                        <div class="list-title">
                            <i class="icon icon-pin"></i>
                            <small>Most Popular Publications</small>
                        </div>
                        <div class="row">
                            <?php while ( $data->fetch() ) { array_push($used_ids,$data->display( 'id' ));  ?>
                                <div class="blog-item col-lg-12 col-md-6 col-xs-12">
                                    <div class="blog-item-heading">
                                        <div class="blog-item-heading-wrap">
                                            <a href="/blog-search?type=<?=$data->field( 'blog_type' )?>" class="tag"><?php echo $data->display( 'blog_type' )?></a>
                                            <span class="date"><?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?></span>
                                        </div>
                                        <div class="blog-statistics">
                                            <?php
                                            $settings = pods('ui_settings');
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
                            <?php }  ?>
                        </div>
                    </div>

                    <!-- Whitepaper right -->
                    <?php
                    $params = array(
                        'where' => 'blog_type.meta_value = 1',
                        'orderby' => hys_sort_by(true),
                        'limit' => 1
                    );
                    $data = pods('blog')->find($params);
                    // Loop through the items returned

                    while ( $data->fetch() ) { array_push($used_ids,$data->display( 'id' ));  ?>
                        <div class="right col-xl-7 col-lg-6 col-md-6 col-xl-offset-1 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
                            <div class="image-container" data-src="<?=$data->display( 'image' )?>"></div>
                            <div class="blog-item">
                                <div class="blog-item-heading">
                                    <a href="/blog-search?type=<?=$data->field( 'blog_type' )?>" class="tag-doubled night-blue">
                                        <span><?php echo $data->display( 'blog_type' )?></span>
                                        <span><?php echo $data->display( 'file_type' )?></span>
                                    </a>
                                </div>
                                <div class="blog-info">
                                    <h3 title="<?php echo $data->display( 'post_title' )?>">
                                        <a class="truncate" href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>">
                                            <?php echo $data->display( 'post_title' )?>
                                        </a>
                                    </h3>
                                    <?php echo $data->display( 'post_content' )?>
                                    <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" class="btn-icon blue transparent">
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

    <!-- All data -->
    <div class="all-posts" id="blog-posts">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="blog-filters sticky-panel row">
                    <div class="filters-wrap col-xs-12">
                        <div class="tabs" data-total="<?php echo $total_found ?>" data-used-ids="<?php echo json_encode($used_ids); ?>">
                            <div class="tab-nav">
                                <button id="0" <?php if(isset($_GET['type']) && $_GET['type'] == 0 || !isset($_GET['type'])){ ?> class="active" <?php } ?> type="button">All</button>
                                <button id="2" <?php if(isset($_GET['type']) && $_GET['type'] == 2){ ?> class="active" <?php } ?> type="button">Research</button>
                                <button id="3" <?php if(isset($_GET['type']) && $_GET['type'] == 3){ ?> class="active" <?php } ?> type="button">News</button>
                                <button id="1" <?php if(isset($_GET['type']) && $_GET['type'] == 1){ ?> class="active" <?php } ?> type="button">White papers</button>
                                <hr>
                            </div>
                        </div>

                        <div class="technology-wrap">
                            <?php
                            $data = pods('industry')->find(
                                array(
                                    'orderby' => 'order_weight.meta_value DESC , term_id DESC',
                                )
                            );?>
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
                        <?php
                        $params = array(
                            'where' => hys_filter_by_industry_category_technology_query($used_ids,false),
                            'select' => ' YEAR(t.post_date)  AS year',
                            'orderby' =>  'YEAR(t.post_date) DESC',
                            'groupby' => ' YEAR(t.post_date)'
                        );
                        $data = pods('blog')->find($params);
                        if($data->total_found()){ ?>
                        <div class="date-wrap">
                            <select id="date" class="date-select accordion hidden">
                                <option value="0">All years</option>
                                <?php  while ( $data->fetch() ) { ?>
                                    <option <?php if(isset($_GET['date']) && $_GET['date'] == $data->display('year')){ ?> selected <?php } ?> value="<?=$data->display('year')?>"><?=$data->display('year')?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php }  ?>
                        <form action="/blog-search" method="get" id="search-form" class="search-form" novalidate>
                            <div class="form-group">
                                <button type="button" class="btn-icon btn-search transparent">
                                    <i class="icon icon-search"></i>
                                </button>
                                <input name="search2" type="text" placeholder="Search by Publication Title" minlength="2">
                                <button type="button" class="btn-icon btn-close transparent">
                                    <i class="icon icon-cross"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="blog-content ajax-call row">
                    <?php
                        $params = array(
                            'where' => hys_filter_by_industry_category_technology_query($used_ids),
                            'orderby' => hys_sort_by(true)
                        );
                        $data = pods('blog')->find($params);
                        $total_found = $data->total_found();
                    ?>
                </div>
                <?php get_template_part( 'templates/loader' ); ?>
            </div>
        </div>

    </div>
</section>

<?php

if (  is_active_sidebar( 'blog-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'blog-page' ) ) : ?>
        <?php dynamic_sidebar( 'blog-page' ); ?>
    <?php endif; ?>
<?php endif; ?>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        hys_init_tabs(0, <?php echo json_encode($used_ids); ?>, <?php echo $total_found ?>, "all");
    });
</script>
<?php get_footer(); ?>
