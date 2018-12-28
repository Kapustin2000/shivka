<?php
/*
Template Name: Services
*/


?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>
<?php
$settings = pods('services_settings')->find();
$params = array(
    'orderby' => 'hot.meta_value DESC,'.hys_sort_by(),
    'limit' => 4
);
$data = pods('services')->find($params);
?>

<section id="services" class="services">
    <div class="services-jumbotron" style="background-image: url(<?=$settings->display('image')?>);">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="text-white">
                       <?=$settings->display('title')?>
                    </h2>
                    <?=$settings->display('description')?>
                </div>
            </div>
        </div>
    </div>
    <div class="services-list">
        <div class="container">
            <div class="row">
                <!--DESKTOP-->
                <div class="hidden-md hidden-sm hidden-xs col-lg-12">
                    <div class="service-item-wrap">
                        <?php $counter = 0; while($data->fetch()){ ?>
                            <div class="service-item <?php if($counter==0){ echo "active"; $counter++; } ?>  col-lg-3">
                                <div class="service-image img-wrap">
                                    <img src="<?=$data->display('image')?>" data-src="" alt="<?=$data->display('post_title')?>">
                                </div>
                                <h3 class="service-title"><?=$data->display('post_title')?></h3>
                                <?=$data->display('post_content')?>
                                <button class="btn-icon blue transparent">
                                    <i class="ic ic-arrow">
                                        <span></span>
                                    </i>
                                </button>
                            </div>
                        <?php } ?>
                        <?php $counter = 0; $data->reset(); while($data->fetch()){ ?>
                            <div class="service-item-details <?php if($counter>0){  echo "hidden";  }$counter++;?>">
                                <h3>Business-Driven Solutions</h3>
                                <ul>
                                    <?php foreach($data->field('solutions') as $solution){  $related_solution = pods('business_solution')->find(array('limit' => 1, 'where' => 't.term_id = '.$solution['term_id'])); ?>
                                        <li>
                                            <span><?=$related_solution->display('title')?></span>
                                            <span><?=$related_solution->display('description')?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!--MOBILE-->
                <div class="hidden-xl hidden-lg col-xs-12">
                    <div class="services-accordion">
                        <?php $data->reset();$counter = 0; while($data->fetch()){ ?>
                            <div class="service-item <?php if($counter==0){  echo "active"; $counter++; }?> col-xs-12">
                                <h3 class="service-title"><?=$data->display('post_title')?></h3>
                                <?=$data->display('post_content')?>
                                <button class="btn-icon blue transparent">
                                    <i class="ic ic-arrow">
                                        <span></span>
                                    </i>
                                </button>
                            </div>
                            <div class="service-item-details col-xs-12 <?php if($counter>0){  echo "invisible";  }$counter++;?>">
                                <h3>Business-Driven Solutions</h3>
                                <ul>
                                    <?php foreach($data->field('solutions') as $solution){  $related_solution = pods('business_solution')->find(array('limit' => 1, 'where' => 't.term_id = '.$solution['term_id'])); ?>
                                        <li>
                                            <span><?=$related_solution->display('title')?></span>
                                            <span><?=$related_solution->display('description')?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FROZEN -->
    <!--    <div class="services-technologies">-->
    <!--        <div class="container">-->
    <!--            <div class="row">-->
    <!--                <div class="col-xs-12">-->
    <!--                    <h2>Technologies What We Use</h2>-->
    <!--                    <div class="row">-->
    <!--                        <div class="technology-group col-xs-3">-->
    <!--                            <h3>Microsoft</h3>-->
    <!--                            <!--DESKTOP-->
    <!--                            <div data-id="dotnet" class="hidden-md hidden-sm hidden-xs blue">.NET</div>-->
    <!--                            <div data-id="webapi" class="hidden-md hidden-sm hidden-xs blue">WebAPI</div>-->
    <!--                            <div data-id="asp-dotnet" class="hidden-md hidden-sm hidden-xs blue">ASP .NET</div>-->
    <!--                            <div data-id="c-sharp" class="hidden-md hidden-sm hidden-xs blue">C#</div>-->
    <!--                            <!--MOBILE-->
    <!--                            <a href="#" class="hidden-xl hidden-lg blue">.NET</a>-->
    <!--                            <a href="#" class="hidden-xl hidden-lg blue">WebAPI</a>-->
    <!--                            <a href="#" class="hidden-xl hidden-lg blue">ASP .NET</a>-->
    <!--                            <a href="#" class="hidden-xl hidden-lg blue">C#</a>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
</section>

<?php

if (  is_active_sidebar( 'services-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'services-page' ) ) : ?>
        <?php dynamic_sidebar( 'services-page' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>


