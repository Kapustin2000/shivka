
	<?php

		get_header();

		$nt_conversi_error_heading_v 		= 	ot_get_option( 'nt_conversi_error_heading_visibility' );
		$nt_conversi_error_heading 			= 	ot_get_option( 'nt_conversi_error_heading' );
		$nt_conversi_bread_visibility 		= 	ot_get_option( 'nt_conversi_bread' );
		$nt_conversi_single_disable_heading = 	ot_get_option( 'nt_conversi_single_disable_heading' );
		$nt_conversi_404_layout 			= 	ot_get_option( 'nt_conversi_404layout' );

	?>

	<?php  get_template_part( 'index-header' ); ?>

    <section class="not-found">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>404</h1>
                    <p>Страница не найдена</p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'templates/book-meeting' ); ?>

	<?php get_footer(); ?>