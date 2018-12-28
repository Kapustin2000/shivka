<?php
/*
Template Name: Privacy-policy
*/

?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>

<?php

 $privacy_text = pods('privacy_policy_ui')->find();

?>

<section id="blog" class="privacy-policy">
    <div class="container has-margin-bottom">
        <div class="container-mx">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?php  if( ( $nt_conversi_disable_title ) != true ): ?>
                        <?php  if( $nt_conversi_page_title  ): ?>
                            <h2 class="text-night-blue"><?php echo esc_html( $nt_conversi_page_title ) ; ?></h2>
                        <?php else : ?>
                            <h2 class="text-night-blue"><?php echo the_title(); ?></h2>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?=$privacy_text->display('description')?>

                    <div class="sticky-mobile">
                        <ul>
                            <?php
                            $privacy_links = pods('privacy_policy_links')->find(array(
                                'orderby' => 'id DESC'
                            ));
                            while($privacy_links->fetch()){ ?>
                                <li>
                                    <a href="#"
                                       class="blue"
                                       data-scroll-tag="<?php echo $privacy_links->display('url')?>">
                                        <?php echo $privacy_links->display('post_title')?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="content-editable">
                        <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            // Include the page content template.
                            get_template_part( 'content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            // End the loop.
                        endwhile;
                        ?>
                    </div>
                </div>
                <div class="sticky col-md-4 col-xs-12">
                    <ul>
                        <!-- TODO: remove unnecessary backend call -->
                        <?php
                        $privacy_links->reset();
                        while($privacy_links->fetch()){ ?>
                         <li>
                             <a href="#"
                                class="blue"
                                data-scroll-tag="<?php echo $privacy_links->display('url')?>">
                                 <?php echo $privacy_links->display('post_title')?>
                             </a>
                         </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo do_shortcode('[get_book_meeting_block]') ?>

<?php get_footer(); ?>
