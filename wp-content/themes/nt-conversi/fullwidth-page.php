	<?php

		/*
		Template name: Fullwidth Template
		*/

		get_header();  

		$nt_conversi_pagelayout 			= 	rwmb_meta( 'nt_conversi_pagelayout' );
		$nt_conversi_disable_title 			= 	rwmb_meta( 'nt_conversi_disable_title' );
		$nt_conversi_page_title 			= 	rwmb_meta( 'nt_conversi_alt_title' );
		$nt_conversi_page_disable_sub 		= 	rwmb_meta( 'nt_conversi_page_disable_subtitle' );
		$nt_conversi_page_subtitle 			= 	rwmb_meta( 'nt_conversi_page_subtitle' );
		$nt_conversi_bread_visibility 		= 	ot_get_option( 'nt_conversi_bread', 'on' );

		$nt_conversi_subtitle_tag_attribs = array(
		'id' 	=> array(),
		'class' => array(),
		'title' => array(),
		'style' => array(),
		);
		$nt_conversi_subtitle_allowed_tags = array(
		'p' 	=> $nt_conversi_subtitle_tag_attribs,
		'span' 	=> $nt_conversi_subtitle_tag_attribs,
		'i' 	=> $nt_conversi_subtitle_tag_attribs,
		'hr' 	=> $nt_conversi_subtitle_tag_attribs,
		'img' 	=> array_merge( $nt_conversi_subtitle_tag_attribs, array(
				'src'		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'alt'		=> array(),
			) ),
		);

	?>

	<div class="template-cover-style-2 js-full-height-off section-class-scroll page-id-<?php echo get_the_ID(); ?> index-header">

		<div class="template-overlay"></div>

		<?php  get_template_part( 'index-header' ); ?>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-8 center">
						<div class="template-cover-intro">

							<?php  if( ( $nt_conversi_disable_title ) != true ): ?>
								<?php  if( $nt_conversi_page_title  ): ?>
									<h2 class="uppercase lead-heading"><?php echo esc_html( $nt_conversi_page_title ) ; ?></h2>
								<?php else : ?>
									<h2 class="uppercase lead-heading"><?php echo the_title(); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php  if( ( $nt_conversi_page_disable_sub ) != true ): ?>
								<?php  if( $nt_conversi_page_subtitle  ): ?>
									<h2 class="cover-text-sublead wow">
										<?php echo wp_kses( $nt_conversi_page_subtitle, $nt_conversi_subtitle_allowed_tags );?>
									</h2>
								<?php endif; ?>
							<?php endif; ?>	

							<?php if ( ( $nt_conversi_bread_visibility  ) != 'off' ) : ?>
								<?php if( function_exists( 'bcn_display' ) ) : ?>
									<p class="breadcrubms"> <?php bcn_display();  ?></p>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section id="blog">
		<div class="container-off has-margin-bottom">
			<div class="row-off">
				<div class="col-md-12-off has-margin-bottom">
					<?php

						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						endif;

					?>
				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>