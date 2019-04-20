
	<?php

		get_header();  

		$nt_conversi_pagelayout 			= 	rwmb_meta( 'nt_conversi_pagelayout' );
		$nt_conversi_disable_title 			= 	rwmb_meta( 'nt_conversi_disable_title' );
		$nt_conversi_page_title 			= 	rwmb_meta( 'nt_conversi_alt_title' );
		$nt_conversi_page_disable_sub 		= 	rwmb_meta( 'nt_conversi_disable_subtitle' );
		$nt_conversi_page_subtitle 			= 	rwmb_meta( 'nt_conversi_subtitle' );
		$nt_conversi_bread_visibility 		= 	ot_get_option( 'nt_conversi_bread', 'on' );

		// subtitle_allowed_tags
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

    <?php get_template_part( 'index-header' ); ?>

    <section class="default-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <?php  if( ( $nt_conversi_disable_title ) != true ): ?>
                        <?php  if( $nt_conversi_page_title  ): ?>
                            <h1> <span><?php echo esc_html( $nt_conversi_page_title ) ; ?></span> </h1>
                        <?php else : ?>
                            <h1> <span><?php echo the_title(); ?></span> </h1>
                        <?php endif; ?>
                    <?php endif; ?>

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
            </div>
        </div>
    </section>

	<?php get_footer(); ?>