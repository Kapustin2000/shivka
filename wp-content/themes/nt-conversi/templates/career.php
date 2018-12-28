<?php
/*
Template Name: Career
*/


?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<?php

$career_ui = pods('career_ui')->find();

$params = array(
    'where'=>hys_filter_by_industry_category_technology_query(false,false,true),
    'orderby' => 'hot.meta_value DESC,'.hys_sort_by(),
);
$data = pods('vacancies')->find($params);
$count_vacancies = pods('vacancies')->find();
  $types_params = array(
            'orderby' => 'order_weight.meta_value DESC , term_id DESC',
        );
        $types = pods('vacancies_type')->find($types_params);
?>

<section id="blog" class="career">
    <div class="career-jumbotron" style="background-image: url(<?=$career_ui->display('image')?>);">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="text-white"><?=$career_ui->display('title')?></h2>
                        <?=$career_ui->display('description')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="career-wrap">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="row">
                    <div class="career-search col-xs-12">
                        <form method="get" id="search-form" class="search-form search-vacancies" novalidate>
                            <div class="form-group">
                                <input name="search2" type="text" placeholder="Search vacancies" required>
                            </div>
                            <select id="vacancy_type" name="vacancy_type" class="vacancies-select accordion hidden">
                                <option value="0">All Specialities</option>
                                <?php
                                while ( $types->fetch() ) {  ?>
                                <?php if( $types->display('count') > 0) { ?>
                                    <option value="<?php echo $types->display('slug')?>"><?php echo $types->display('title')?></option>
                                <?php } }  ?>
                            </select>
                            <button type="submit" class="btn">Search</button>
                        </form>

                        <h3>All vacancies (<?php echo $count_vacancies->total_found() ?>)</h3>
                        <a class="tag outline <?php if( !isset($_GET['vacancy_type']) || isset($_GET['vacancy_type']) && $_GET['vacancy_type'] == "0" ){ echo "active";  } ?>" href="?vacancy_type=0">
                            All
                            <span><?php echo $count_vacancies->total_found() ?></span>
                        </a>
                        <?php
                        // Loop through the items returned
                        $types->reset();
                        while ( $types->fetch() ) {  ?>
                            <?php if( $types->display('count') > 0) { ?>
                                <a class="tag outline  <?php if($_GET['vacancy_type']) {
                                    $vacancy_type = explode(',',$_GET['vacancy_type']);
                                    foreach($vacancy_type as $item){
                                        if($item== $types->display( 'slug' )){
                                            echo "active";
                                        }
                                    }
                                }?>"
                                   href="?vacancy_type=<?php echo $types->display('slug')?>">
                                    <?php echo $types->display('name')?>
                                    <span><?php echo $types->display('count') ?></span>
                                </a>
                            <?php  } } ?>
                    </div>
                    <div class="career-vacancies col-xs-12">
                        <div class="row"> 
                            <?php
                            if($data->total_found()){


                            // Loop through the items returned
                            while ( $data->fetch() ) { $id =  $data->display('id'); ?>
                            <a href="<?php echo get_post_permalink( $data->display( 'id' ) ) ?>" class="col-xl-3 col-md-6 col-xs-12">
                                <span class="vacancy">
                                    <?php
                                      if($data->display('hot')){ ?>
<!--                                          HOOOOOT-->
                                    <?php  }  ?>
                                    <h3><?php echo $data->display('position')?></h3>
                                    <p><?php echo $data->display('vacancies_type')?></p>
                                </span>
                            </a>
                            <?php  }  } else{ ?>
                                <div class="col-xs-12">
                                    <h3>No data</h3>
                                </div>
                       <?php     } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'templates/no-suitable-roles-block' ); ?>

<?php get_footer(); ?>


