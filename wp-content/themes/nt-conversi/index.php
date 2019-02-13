	
	<?php 
		get_header();

		$nt_conversi_pagelayout 		= 	ot_get_option( 'nt_conversi_bloglayout' );
		$nt_conversi_disable_title 		= 	ot_get_option( 'nt_conversi_disable_title' );
		$nt_conversi_blog_title 		= 	ot_get_option( 'nt_conversi_blog_title' );
		$nt_conversi_page_disable_sub 	= 	ot_get_option( 'nt_conversi_page_disable_sub' );
		$nt_conversi_blog_subtitle 		= 	ot_get_option( 'nt_conversi_blog_subtitle' );
		$nt_conversi_bread_visibility 	= 	ot_get_option( 'nt_conversi_bread' );
		
		/* logo options */
		$nt_conversi_logo_option 	= ( ot_get_option( 'nt_conversi_logo_type' ) );
		$nt_conversi_img_whitelogo 	= ( ot_get_option( 'nt_conversi_whitelogoimg' ) );
		$nt_conversi_img_darklogo 	= ( ot_get_option( 'nt_conversi_darklogoimg' ) );
		$nt_conversi_text_logo 		= ( ot_get_option( 'nt_conversi_textlogo' ) );
		$nt_conversi_btn_display 	= ( ot_get_option( 'nt_conversi_menubtn_display' ) );
		$nt_conversi_menubtn 		= ( ot_get_option( 'nt_conversi_menubtn' ) );
		$nt_conversi_menubtnurl 	= ( ot_get_option( 'nt_conversi_menubtnurl' ) );
		$nt_conversi_menubtntarget 	= ( ot_get_option( 'nt_conversi_menubtntarget' ) );

	?>

	<div class="template-cover-style-2 js-full-height-off section-class-scroll index-header">

		<div class="template-overlay"></div>

		<?php get_template_part( 'index-header' ); ?>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="template-cover-intro">

							<?php if ( ( $nt_conversi_disable_title  ) != 'off') : ?>
								<?php if ( ( $nt_conversi_blog_title  ) != '') : ?>
									<h2 class="white capitalize"> <?php echo esc_html($nt_conversi_blog_title); ?> </h2>
								<?php else: ?>
									<h2 class="white capitalize"> <?php echo bloginfo('name'); ?> </h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ( $nt_conversi_page_disable_sub  ) != 'off') : ?>
								<?php if ( ( $nt_conversi_blog_subtitle  ) != '') : ?>
									<h2 class="cover-text-sublead wow" ><?php echo esc_html( $nt_conversi_blog_subtitle );  ?></h2>
								<?php else: ?>
									<h2 class="cover-text-sublead wow" ><?php echo bloginfo('description'); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ( $nt_conversi_bread_visibility  ) != 'off') : ?>
								<?php if( function_exists('bcn_display') ) : ?>
									<p class="breadcrubms"> <?php  bcn_display();  ?></p>
								<?php endif; ?>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">
				<?php if( ( $nt_conversi_pagelayout ) =='right-sidebar' || ($nt_conversi_pagelayout ) =='' ){ ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif(( $nt_conversi_pagelayout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif(( $nt_conversi_pagelayout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>
				
				<?php 
					if ( have_posts() ) :  
					while ( have_posts() ) : the_post(); 
						 get_template_part( 'post-format/content', get_post_format() ); 
					endwhile; 
					 
					 the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'nt-conversi' ),
							'next_text'          => esc_html__( 'Next page', 'nt-conversi' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
						) ); 
						
					 else : 
					 
					 get_template_part( 'content', 'none' ); 
					 
					 endif; 
				 ?>	
				
				</div>
				
			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
	