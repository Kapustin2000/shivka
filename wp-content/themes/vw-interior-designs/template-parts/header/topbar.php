<?php
/**
 * The template part for header
 *
 * @package VW Interior Designs 
 * @subpackage vw_interior_designs
 * @since VW Interior Designs 1.0
 */
?>

<div id="topbar">
  <div class="container">    
    <div class="logo">
      <?php if( has_custom_logo() ){ vw_interior_designs_the_custom_logo();
        }else{ ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_html($description); ?></p>
      <?php endif; } ?>
    </div>
  </div>
</div>