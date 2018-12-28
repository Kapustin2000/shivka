<?php $used_ids = array(); ?>
<section id="blog-posts" class="blog">
    <div class="top-posts">
        <div class="container">
            <div class="row">
                <!-- News left -->
                <?php
                $second_filter = '';
                if(!isset($_GET['type']) || isset($_GET['type']) && $_GET['type'] != 1){
                    $second_filter= (hys_filter_by_industry_category_technology_query() ? ' AND  ' : '') .'blog_type.meta_value != 1';
                }
                $params = array(
                    'where' => hys_filter_by_industry_category_technology_query(). $second_filter,
                    'orderby' => hys_sort_by(true),
                    'limit' => 3
                );

                $data = pods('blog')->find($params);
                ?>
                <div class="left col-xs-12">
                    <div class="row">
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
                $params = array(
                    'where' => 'blog_type.meta_value = 1',
                    'orderby' => hys_sort_by(true),
                    'limit' => 1
                );
                $data = pods('blog')->find($params);
                // Loop through the items returned

                while ( $data->fetch() ) { array_push($used_ids,$data->display( 'id' ));  ?>
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
</section>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        hys_init_tabs(2, <?php echo json_encode($used_ids); ?>);
    });
</script>