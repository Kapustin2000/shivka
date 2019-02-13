
	<?php

		get_header();

		$nt_conversi_bread_visibility 		= 	ot_get_option( 'nt_conversi_bread');
		$nt_conversi_search_layout 			= 	ot_get_option( 'nt_conversi_searchlayout' );
		$nt_conversi_search_heading 		= 	ot_get_option( 'nt_conversi_search_heading' );
		$nt_conversi_single_disable_heading = 	ot_get_option( 'nt_conversi_search_heading_visibility' );
		$nt_conversi_search_slogan 			= 	ot_get_option( 'nt_conversi_search_slogan' );
		$nt_conversi_single_disable_slogan 	= 	ot_get_option( 'nt_conversi_search_slogan_visibility' );

	?>
	
	<div class="template-cover-style-2 js-full-height-off section-class-scroll index-header">

		<div class="template-overlay"></div>
		
		<?php  get_template_part( 'index-header' ); ?>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-8 center">
						<div class="template-cover-intro">

							<?php if ( $nt_conversi_single_disable_heading != 'off' ) : ?>

								<?php if ( $nt_conversi_search_heading != '' ) : ?>
									<h2 class="uppercase lead-heading"><?php echo ( $nt_conversi_search_heading ); ?></h2> 
								<?php else : ?>
									<h2 class="uppercase lead-heading"><?php echo esc_html( $wp_query->found_posts ); ?> <?php esc_html_e( 'Search Results Found For', 'nt-conversi' ); ?>: "<?php the_search_query(); ?>"</h2>
								<?php endif; ?>

							<?php endif; ?>

							<?php if ( $nt_conversi_single_disable_slogan != 'off' ) : ?>

								<?php if ( $nt_conversi_search_slogan != '' ) : ?>
									<h2 class="cover-text-sublead wow"><?php echo esc_html( $nt_conversi_search_slogan ); ?></h2> 
								<?php else : ?>
									<h2 class="cover-text-sublead wow"><?php echo  the_title();?></h2>
								<?php endif; ?>

							<?php endif; ?>

							<?php 
								if ( ( $nt_conversi_bread_visibility  ) != 'off' && function_exists( 'bcn_display' ) ) : 
							 ?>
								<p class="breadcrubms"> <?php bcn_display(); ?></p>
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
				<div class="col-md-12-off has-margin-bottom-off">

				<?php if( ( $nt_conversi_search_layout ) == 'right-sidebar' || ( $nt_conversi_search_layout ) == '' ) { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">

				<?php } elseif( ( $nt_conversi_search_layout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">

				<?php } elseif( ( $nt_conversi_search_layout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php

						if ( have_posts() ) : 

							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'search' );
							endwhile;
							the_posts_pagination( array(
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'nt-conversi' ) . ' </span>',
							) );
							else :
							get_template_part( 'content', 'none' );

						endif;

						wp_link_pages(); 
					 ?>

				</div><!-- #end sidebar+ content -->

				<?php 
					if( ( $nt_conversi_search_layout ) == 'right-sidebar' || ( $nt_conversi_search_layout ) == '') {
						get_sidebar(); 
					} 
				?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>