<?php
/**
 * The template part for header
 *
 * @package VW Interior Designs 
 * @subpackage vw_interior_designs
 * @since VW Interior Designs 1.0
 */
?>

<div class="container">
	<div id="header" class="menubar">
		<div class="row">
			<div class="col-md-9 col-sm-9">
			  	<div class="nav">
			    	<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
			  	</div>
			</div>
			<div class="col-md-2 col-sm-2 col-6">
				<?php if(class_exists('woocommerce')){ ?>
					<div class="cart_icon">
			          	<a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-bag"></i></a>
		            	<li class="cart_box">
			              	<span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
		            	</li>
			        </div>
			    <?php } ?>
			</div>
			<div class="search-box col-md-1 col-sm-1 col-6">
		        <span><i class="fas fa-search"></i></span>
	      	</div>	      	
		</div>
	</div>
</div>
<div class="serach_outer">
	<div class="closepop"><i class="far fa-window-close"></i></div>
	<div class="serach_inner">
		<?php get_search_form(); ?>
	</div>
</div>