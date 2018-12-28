<?php
/*
Template Name: Index
*/

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<div id="main-page" class="main-page">
    <!-- Header -->
    <?php
    $settings = pods('front_page_settings')->find();
    ?>
    <div id="trigger1"></div>
    <section class="main-jumbotron">
        <div class="background-overlay"
             style="background-image: url(<?php echo $settings->display('image') ?>);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-white"><?php echo $settings->display('title') ?></h1>
                    <h3 class="text-white"><?php echo $settings->display('description') ?></h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Blocks after header -->
    <section class="hys-features">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a target="_blank" href="https://meetings.hubspot.com/mikhail-kapustin">  <button id="book-meeting" class="btn orange">Book A Meeting</button> </a>
                </div>
                <?php echo $settings->display('blocks_after_header') ?>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section class="hys-partners">
        <div class="container hidden-scrollbar">
            <div class="row">
                <div class="col-lg-7">
                    <?php
                    $partners = pods('partners')->find(
                        array(
                            'orderby' => 'order_weight.meta_value DESC, id DESC'
                        )
                    );
                    while ( $partners->fetch() ) { ?>
                        <a href="<?php echo $partners->display('external_link') ?>" target="_blank" class="partner-image">
                            <img src="" data-src="<?php echo $partners->display('logo') ?>" alt="Partner" />
                        </a>
                    <?php } ?>
                </div>
                <div class="col-lg-5">
                    <!-- Pages for header -->
                    <ul>
                        <?php
                        $pages  = $settings->field('related_pages');
                        if(!empty($pages)){
                            foreach($pages as $page){ ?>
                                <li><a href="/<?php  echo $page['post_name']  ; ?>"><?php echo $page['post_title']; ?></a></li>
                            <?php  } } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php get_sidebar(); ?>

    <!-- Get reference form -->


    <!-- Epicflow-->
    <?php if($settings->field('epicflow')){ ?>
        <section class="epicflow">
            <div class="container">
                <div class="row">
                    <!-- Epicflow -->
                    <?php
                    $epicflow = pods('epicflow')->find();
                    ?>
                    <div class="col-lg-offset-1 col-lg-3 col-xs-12 hidden-xl hidden-lg">
                        <h2 class="text-blue"><?php echo $epicflow->display('title') ?></h2>
                        <?php echo $epicflow->display('description') ?>
                    </div>
                    <div class="devices col-lg-8 col-xs-12">
                        <div class="img-wrap mac">
                            <img src="" data-src="<?php echo $epicflow->display('image') ?>" alt="<?php echo $epicflow->display('title') ?>" />
                        </div>
                        <div class="img-wrap iphone">
                            <img src="" data-src="<?php echo $epicflow->display('image2') ?>" alt="<?php echo $epicflow->display('title') ?>" />
                        </div>
                        <a href="<?php echo $epicflow->display('external_link') ?>" class="btn-icon btn-arrow orange hidden-xl hidden-lg">
                            <span>More About Epicflow</span>
                            <i class="icon-arrow-short"></i>
                        </a>
                    </div>
                    <div class="epicflow-description col-lg-3 col-xs-12 hidden-md hiddem-sm hidden-xs">
                        <h2 class="text-blue"><?php echo $epicflow->display('title') ?></h2>
                        <?php echo $epicflow->display('description') ?>
                        <a href="<?php echo $epicflow->display('external_link') ?>" target="_blank" class="btn-icon btn-arrow orange">
                            <span>More About Epicflow</span>
                            <i class="icon-arrow-short"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>



</div>



<?php get_footer(); ?>
