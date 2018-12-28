	
	<?php 
		get_header();
	
		$nt_conversi_bread_v 		= 	ot_get_option( 'nt_conversi_bread' ); 
		$nt_conversi_s_d_h			= 	ot_get_option( 'nt_conversi_single_disable_heading' );
	
	?>

	<div class="template-cover-style-2 js-full-height-off section-class-scroll index-header">

		<div class="template-overlay"></div>

		<?php  get_template_part('index-header'); ?>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-8 center">
						<div class="template-cover-intro">

							<?php if ( ( $nt_conversi_s_d_h  ) != 'off' ) : ?>
								<h2 class="uppercase lead-heading"><?php echo the_title();?></h2>
							<?php endif; ?>

							<?php if ( ( $nt_conversi_bread_v  ) != 'off' ) : ?>
								<?php if( function_exists( 'bcn_display' ) ) : ?>
									<p class="breadcrubms"><?php  bcn_display();  ?></p>
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
				<div class="fh5co-project-style-4">

					<?php 

						while ( have_posts() ) : 
							the_post(); 
							get_template_part( 'post-format/portfolio/content', get_post_format() ); 
						endwhile; // end of the loop. 

					?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>