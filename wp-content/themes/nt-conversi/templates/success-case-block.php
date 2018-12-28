

        <?php
        //?industry=e-commerece&business_solution=buisness-category&technology=c#
        $styles = array(
          'col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12',
          'col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12'
        );
        $params = array(
            'where'=>hys_filter_by_industry_category_technology_query(),
            'orderby' => hys_sort_by(),
            'offset' => isset($_REQUEST['offset']) ? intval($_REQUEST['offset']) : 0,
            'limit' => isset($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 0
        ); 
        $data = pods('success_cases')->find($params);

        if($data->total()){

         $count_block = 0;
        // Loop through the items returned
        while ( $data->fetch() ) { $count_block++; if($count_block == 5) { $count_block = 1;}  ?>
            <div class="<?php echo $styles[(int) $_REQUEST['size']];  ?>" >
                <div class="success-cases-item">
                    <div class="success-cases-heading">
                        <a class="success-cases-heading-wrap" href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>">
                            <div class="image-wrap"
                                 style="background-image: url(<?php echo $data->display( 'image2' )?>)"></div>
                            <div class="logo-wrap">
                                <img src="<?php echo $data->display( 'logo' )?>" alt="<?php echo $data->display( 'post_title' )?>">
                            </div>
                        </a>
                        <?php foreach(wp_get_object_terms($data->display( 'id' ), 'industry') as $industry) { ?>
                            <a class="tag outline" href="?industry=<?=$industry->slug?>"><?=$industry->name?></a>
                        <?php } ?>
                    </div>
                    <div class="success-case-info">
                        <h3 title="<?php echo $data->display( 'post_title' )?>">
                            <a class="truncate" href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>">
                                <?php echo $data->display( 'post_title' )?>
                            </a>
                        </h3>
                        <?php echo $data->display( 'post_content' )?>
                        <ul class="links-list">
                            <?php foreach(wp_get_object_terms($data->display( 'id' ), 'business_solution') as $business_solution) { ?>
                                <li><a class="link blue" href="/success-cases-search?business_solution=<?=$business_solution->slug?>"><?=$business_solution->name?></a></li>
                            <?php } ?>
                        </ul>
                        <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>&color=<?=$count_block?>" class="btn-icon orange transparent">
                            <i class="ic ic-arrow">
                                <span></span>
                            </i>
                        </a>
                    </div>
                </div>
            </div>
        <?php }  } else {
            header("HTTP/1.0 404 Not Data Found");
            exit();
        }?>