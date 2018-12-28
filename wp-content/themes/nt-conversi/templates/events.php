<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'index-header' ); ?>











<!-- Leave before footer -->
<?php

if (  is_active_sidebar( 'events-page' )  ) : ?>
    <?php if ( is_active_sidebar( 'events-page' ) ) : ?>
        <?php dynamic_sidebar( 'events-page' ); ?>
    <?php endif; ?>
<?php endif; ?>

 
<?php get_footer(); ?>