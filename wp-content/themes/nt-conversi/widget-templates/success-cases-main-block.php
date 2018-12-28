<section class="success-cases">
    <div class="decorative"></div>
    <div class="container has-margin-bottom">
        <div class="row">
            <div class="success-cases-description col-lg-3 col-xs-12">
                <h2 class="text-blue">HYS Enterprise Helps You Succeed </h2>
                <p>Read our success cases to find out what business tasks we solve as long-term partners</p>
                <a href="/success-cases" class="btn-icon btn-arrow orange hidden-md hidden-sm hidden-xs">
                    <span>See More Cases</span>
                    <i class="icon-arrow-short"></i>
                </a>
            </div>
            <div class="success-cases-content col-xl-offset-1 col-xl-8 col-lg-9 col-xs-12">
                <div class="row ajax-call">
                    <!-- Success - cases -->
                    <?php
                    $params = array('where'=>hys_filter_by_industry_category_technology_query(null,true, false, false),
                        'orderby' => hys_sort_by(),
                        'limit' => 3
                    );
                    $data = pods('success_cases')->find($params);
                    // Loop through the items returned
                    $count_block = 0;
                    while ( $data->fetch() ) { $count_block++; if($count_block == 5) { $count_block = 1;}  ?>
                        <div class="success-cases-item col-xs-12">
                            <div class="success-cases-heading hidden-md hidden-sm hidden-xs">
                                <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>"
                                   class="success-cases-image">
                                    <div class="success-cases-image-wrap"
                                         data-src="<?php echo $data->display( 'image2' )?>"></div>
                                    <div class="logo-wrap">
                                        <img src="" data-src="<?php echo $data->display( 'logo' )?>" alt="<?php echo $data->display( 'post_title' )?>">
                                    </div>
                                </a>
                            </div>
                            <div class="success-cases-info-wrap">
                                <div class="success-case-info">
                                    <div class="success-case-info-wrap hidden-xl hidden-lg">
                                        <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>"
                                           class="success-cases-image">
                                            <div class="success-cases-image-wrap"
                                                 data-src="<?php echo $data->display( 'image2' )?>"></div>
                                            <div class="logo-wrap">
                                                <img src="" data-src="<?php echo $data->display( 'logo' )?>" alt="<?php echo $data->display( 'post_title' )?>">
                                            </div>
                                        </a>
                                        <?php foreach(wp_get_object_terms($data->display( 'id' ), 'industry') as $industry) { ?>
                                            <a class="tag outline" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                                        <?php } ?>
                                    </div>
                                    <?php foreach(wp_get_object_terms($data->display( 'id' ), 'industry') as $industry) { ?>
                                        <a class="tag outline hidden-md hidden-sm hidden-xs" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                                    <?php } ?>
                                    <h3 title="<?php echo $data->display( 'post_title' )?>">
                                        <a class="truncate truncate-3" href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>">
                                            <?php echo $data->display( 'post_title' )?>
                                        </a>
                                    </h3>
                                    <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>" class="btn-icon blue transparent hidden-md hidden-sm hidden-xs">
                                        <i class="ic ic-arrow">
                                            <span></span>
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <a href="/success-cases" class="btn-icon btn-arrow orange hidden-xl hidden-lg">
                    <span>See More Cases</span>
                    <i class="icon-arrow-short"></i>
                </a>
            </div>
        </div>
    </div>
</section>