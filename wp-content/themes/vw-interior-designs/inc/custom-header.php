<?php
/**
 * @package VW Interior Designs
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_interior_designs_header_style()
*/
function vw_interior_designs_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_interior_designs_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'vw_interior_designs_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_interior_designs_custom_header_setup' );

if ( ! function_exists( 'vw_interior_designs_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see relief_medical_hospital_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_interior_designs_header_style' );
function vw_interior_designs_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'vw-interior-designs-basic-style', $custom_css );
	endif;
}
endif; // vw_interior_designs_header_style