<?php
/*
Template Name: Blog - Search
*/


?>

<style>

</style>

<?php get_header(); ?>


<?php get_template_part( 'index-header' ); ?>
<?php $used_ids = array(); ?>
<section id="blog" class="blog blog-search">
    <div class="container has-margin-bottom">
        <div class="container-mx">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/blog" class="btn btn-back transparent">
                        <i class="icon icon-arrow-short"></i>
                        <span>Back to Blog</span>
                    </a>
                </div>
                <div class="col-md-6">
                    <form action="/blog-search" method="get" id="search-form" class="search-form" novalidate>
                        <div class="form-group">
                            <button type="button" class="btn-icon transparent">
                                <i class="icon icon-search"></i>
                            </button>
                            <input name="search2" type="text" placeholder="Search by Publication Title">
                        </div>
                    </form>
                    <?php
                    if(isset($_GET['business_solution']) && hys_validate_pod_item('business_solution',$_GET['business_solution'])){ ?>
                        <h3> <span>Posts Tagged With</span> <span class="text-grey-blue">“<?php echo hys_validate_pod_item('business_solution',$_GET['business_solution']) ?>”</span></h3>
                    <?php }elseif(isset($_GET['search'])){ ?>
                        <h3> <span>Search by Publication Title</span> <span class="text-grey-blue">“<?php echo  $_GET['search'] ; ?>”</span></h3>
                    <?php }elseif(isset($_GET['search2'])){ ?>
                        <h3> <span>Search by Publication Title</span> <span class="text-grey-blue">“<?php echo  $_GET['search2'] ; ?>”</span></h3>
                     <?php } ?>
                    <div class="blog-content">
                        <div class="row ajax-call">
                            <?php
                            $params = array('where'=>hys_filter_by_industry_category_technology_query(),
                                'orderby' => hys_sort_by()
                            );
                            $data = pods('success_cases')->find($params);
                            ?>
                        </div>
                        <div class="row ajax-call-message">
                            <div class="loader-placeholder col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="placeholder-image-wrap">
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
                        </div>
                        <div class="default-form">
                        </div>
                    </div>
                </div>
                <div class="sticky col-md-4 col-xs-12">
                    <div class="tag-search">
                        <div class="list-title">
                            <i class="icon icon-tag"></i>
                            <small>Most Popular Tags</small>
                        </div>
                        <?php
                        $data = pods('industry')->find(
                            array(
                                'orderby' => 'order_weight.meta_value DESC , term_id DESC',
                            )
                        );?>

                        <div id="industry" class="tag-wrap">
                            <?php while ( $data->fetch() ) {   ?>
                            <?php if( $data->display('count') > 0) { ?>
                                <div class="tag outline <?php if($_GET['industry']) {
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
                            <?php } } ?>
                        </div>
                    </div>

                    <div class="publications-search hidden-sm hidden-xs">
                        <div class="list-title">
                            <i class="icon icon-tag"></i>
                            <small>Most Popular Publications</small>
                        </div>
                        <?php
                            $params = array(
                                'where' => 'blog_type.meta_value != 1',
                                'orderby' => 'order_weight.meta_value DESC',
                                'limit' => 2
                            );
                            $data = pods('blog')->find($params);
                            $total_found = $data->total_found();
                        ?>
                        <div>
                            <?php while ( $data->fetch() ) { array_push($used_ids,$data->display( 'id' ));  ?>
                                <div class="blog-item">
                                    <div class="blog-item-heading">
                                        <div class="blog-item-heading-wrap">
                                            <a href="/blog-search?type=<?=$data->field( 'blog_type' )?>" class="tag"><?php echo $data->display( 'blog_type' )?></a>
                                            <span class="date"><?php echo date('F j, Y', strtotime($data->display( 'post_date' )));  ?></span>
                                        </div>
                                        <div class="blog-statistics hidden-md">
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

                </div>
            </div>
        </div>
</section>

<?php

if (  is_active_sidebar( 'blog-search-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'blog-search-page' ) ) : ?>
        <?php dynamic_sidebar( 'blog-search-page' ); ?>
    <?php endif; ?>
<?php endif; ?>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        hys_inifite_loading('hys_BLOGAjax', 1, <?php echo $total_found ?>);
    });
</script>

<?php get_footer(); ?>


