<?php
/**
 * The template part for displaying slider
 *
 * @package VW Interior Designs
 * @subpackage vw-interior-designs
 * @since VW Interior Designs 1.0
 */
?>
<div class="col-md-4 col-sm-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>      
	        <div class="new-text">
	          	<?php the_excerpt();?>
	        </div>
	        <div class ="video-btn">
            	<i class="fas fa-home"></i><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html_e('View More','vw-interior-designs'); ?></a>
          	</div>
	    </div>
	    <div class="clearfix"></div>
  	</div>
</div>