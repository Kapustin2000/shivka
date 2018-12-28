
	<?php

		get_header();

		$nt_conversi_error_heading_v 		= 	ot_get_option( 'nt_conversi_error_heading_visibility' );
		$nt_conversi_error_heading 			= 	ot_get_option( 'nt_conversi_error_heading' );
		$nt_conversi_bread_visibility 		= 	ot_get_option( 'nt_conversi_bread' );
		$nt_conversi_single_disable_heading = 	ot_get_option( 'nt_conversi_single_disable_heading' );
		$nt_conversi_404_layout 			= 	ot_get_option( 'nt_conversi_404layout' );

	?>

	<?php  get_template_part( 'index-header' ); ?>

    <section id="blog" class="not-found">
        <div class="container has-margin-bottom">
            <div class="container-mx">
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10 col-xs-12">
                        <h1 class="text-night-blue">404</h1>
                        <h3>Sorry, the page you were looking for doesn’t exist.</h3>
                        <div class="btn-wrap">
                            <a href="/blog" class="btn btn-arrow orange">
                                <span>Check Our Publications</span>
                                <i class="icon-arrow-short"></i>
                            </a>
                            <a href="/success-cases" class="btn btn-arrow orange">
                                <span>Check Our Success Cases</span>
                                <i class="icon-arrow-short"></i>
                            </a>
                            <a href="/career" class="btn btn-arrow orange">
                                <span>Check Our Open Vacancies</span>
                                <i class="icon-arrow-short"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'templates/book-meeting' ); ?>

	<?php get_footer(); ?>