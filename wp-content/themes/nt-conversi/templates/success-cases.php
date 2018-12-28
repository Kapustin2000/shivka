<?php
/*
Template Name: Success - Cases
*/


?>

<?php get_header(); ?>


<?php get_template_part( 'index-header' ); ?>

<section id="blog" class="success-cases">
    <div class="container has-margin-bottom">
        <div class="container-mx">
            <div class="success-cases-filters">
                <div class="row">
                    <div class="filters-wrap col-xs-12">
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
                                        <?php if($_GET['industry']) {
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

                        <div class="technology-wrap">
                            <?php
                            $data = pods('technology')->find(
                                array(
                                    'orderby' => 'order_weight.meta_value DESC , term_id DESC',
                                )
                            );?>

                            <select id="technology" class="technology-select accordion hidden">
                            <option value="0">All technologies</option>
                            <?php while ( $data->fetch() ) {   ?>
                                <?php if( $data->display('count') > 0) { ?>
                                    <option
                                    <?php if(isset($_GET['technology'])) {
                                        $technology = explode(',',$_GET['technology']);
                                        foreach($technology as $item){
                                            if($item== $data->display( 'slug' )){
                                                echo "selected";
                                            }
                                        }
                                    }?>
                                        value="<?php echo $data->display( 'slug' )?>"><?php echo $data->display( 'name' )?></option>
                            <?php } } ?>
                        </select>
                        </div>
                        <form action="/success-cases-search" method="get" id="search-form" class="search-form" novalidate>
                            <div class="form-group">
                                <button type="button" class="btn-icon transparent">
                                    <i class="icon icon-search"></i>
                                </button>
                                <input name="search2" type="text" placeholder="Search by Case Title" minlength="2">
                                <button type="button" class="btn-icon btn-close transparent">
                                    <i class="icon icon-cross"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="success-cases-content">
                <div class="row ajax-call">
                    <?php
                    //?industry=e-commerece&business_solution=buisness-category&technology=c#
                    $params = array(
                            'where'=>hys_filter_by_industry_category_technology_query(),
                        'orderby' => hys_sort_by()
                    );
                    $data = pods('success_cases')->find($params);
                    $total_found = $data->total_found();
                    ?>
                </div>

                <?php get_template_part( 'templates/loader' ); ?>

            </div>
        </div>
</section>
<?php

if (  is_active_sidebar( 'success-cases-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'success-cases-page' ) ) : ?>
        <?php dynamic_sidebar( 'success-cases-page' ); ?>
    <?php endif; ?>
<?php endif; ?>


<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        hys_inifite_loading('hys_SCAjax', 0, <?php echo $total_found ?>);
    });
</script>
<?php get_footer(); ?>
