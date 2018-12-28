<?php
/*
Template Name: Success - Cases - Search
*/


?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<section id="blog" class="success-cases-search">
    <div class="container has-margin-bottom">
        <div class="container-mx">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/success-cases" class="btn btn-back transparent">
                        <i class="icon icon-arrow-short"></i>
                        <span>Back to Success Cases</span>
                    </a>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <form action="/success-cases-search" method="get" id="search-form" class="search-form" novalidate>
                        <div class="form-group">
                            <button type="button" class="btn-icon transparent">
                                <i class="icon icon-search"></i>
                            </button>
                            <input name="search2" type="text" placeholder="Search by Case Title" minlength="2">
                        </div>
                    </form>
                    <?php
                    if(isset($_GET['business_solution']) && hys_validate_pod_item('business_solution',$_GET['business_solution'])){ ?>
                        <h3> <span>Posts Tagged With</span> <span class="text-grey-blue">“<?php echo hys_validate_pod_item('business_solution',$_GET['business_solution']) ?>”</span></h3>
                    <?php }elseif(isset($_GET['search2'])){ ?>
                        <h3> <span>Search by Case Title</span> <span class="text-grey-blue">“<?php echo  $_GET['search2'] ; ?>”</span></h3>
                    <?php } ?>
                    <div class="success-cases-content">
                        <div class="row ajax-call">
                            <?php
                            $params = array('where'=>hys_filter_by_industry_category_technology_query(),
                                'orderby' => hys_sort_by()
                            );
                            $data = pods('success_cases')->find($params);
                            $total_found = $data->total_found();
                            ?>
                        </div>
                        <?php get_template_part( 'templates/loader-fullwidth' ); ?>
                    </div>
                </div>
                <div class="sticky col-xs-12 col-sm-4">
                    <div class="list-title">
                        <i class="icon icon-tag"></i>
                        <small>Business Solutions</small>
                    </div>
                    <ul class="business-solution-list">
                        <?php
                        $data = pods('business_solution')->find(array('orderby' => 'order_weight.meta_value DESC , term_id DESC',
                        )); ?>
                        <?php while ( $data->fetch() ) {     ?>
                        <?php if( $data->display('count') > 0) { ?>
                            <li>
                                <a href="?business_solution=<?=$data->display( 'slug' )?>" class="blue"><?=$data->display( 'name' )?>  </a>
                            </li>
                        <?php } } ?>
                    </ul>

                </div>

            </div>
        </div>
</section>

<?php

if (  is_active_sidebar( 'success-cases-search-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'success-cases-search-page' ) ) : ?>
        <?php dynamic_sidebar( 'success-cases-search-page' ); ?>
    <?php endif; ?>
<?php endif; ?>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        hys_inifite_loading('hys_SCAjax', 1, <?php echo $total_found ?>);
    });
</script>
<?php get_footer(); ?>


