<?php
/**
 * VW Interior Designs Theme Customizer
 *
 * @package VW Interior Designs
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_interior_designs_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_interior_designs_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-interior-designs' ),
	    'description' => __( 'Description of what this panel does.', 'vw-interior-designs' ),
	) );

	$wp_customize->add_section( 'vw_interior_designs_left_right', array(
    	'title'      => __( 'General Settings', 'vw-interior-designs' ),
		'priority'   => 30,
		'panel' => 'vw_interior_designs_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_interior_designs_theme_options',array(
        'default' => __('Right Sidebar','vw-interior-designs'),
        'sanitize_callback' => 'vw_interior_designs_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_interior_designs_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-interior-designs'),
        'section' => 'vw_interior_designs_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-interior-designs'),
            'Right Sidebar' => __('Right Sidebar','vw-interior-designs'),
            'One Column' => __('One Column','vw-interior-designs'),
            'Three Columns' => __('Three Columns','vw-interior-designs'),
            'Four Columns' => __('Four Columns','vw-interior-designs'),
            'Grid Layout' => __('Grid Layout','vw-interior-designs')
        ),
	) );	
    
	//Slider
	$wp_customize->add_section( 'vw_interior_designs_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-interior-designs' ),
		'priority'   => null,
		'panel' => 'vw_interior_designs_panel_id'
	) );

	$wp_customize->add_setting('vw_interior_designs_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_interior_designs_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-interior-designs'),
       'section' => 'vw_interior_designs_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_interior_designs_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_interior_designs_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_interior_designs_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-interior-designs' ),
			'description' => __('Slider image size (1500 x 600)','vw-interior-designs'),
			'section'  => 'vw_interior_designs_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Featured Articals
	$wp_customize->add_section( 'vw_interior_designs_video_post_section' , array(
    	'title'      => __( 'Video Post Section', 'vw-interior-designs' ),
		'priority'   => null,
		'panel' => 'vw_interior_designs_panel_id'
	) );

	$post_list = get_posts();
	$i = 0;
	$pst[]= 'select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_interior_designs_video_section',array(
		'sanitize_callback' => 'vw_interior_designs_sanitize_choices',
	));
	$wp_customize->add_control('vw_interior_designs_video_section',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','vw-interior-designs'),
		'section' => 'vw_interior_designs_video_post_section',
	));
	
	//Footer Text
	$wp_customize->add_section('vw_interior_designs_footer',array(
		'title'	=> __('Footer','vw-interior-designs'),
		'description'=> __('This section will appear in the footer','vw-interior-designs'),
		'panel' => 'vw_interior_designs_panel_id',
	));	
	
	$wp_customize->add_setting('vw_interior_designs_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_interior_designs_footer_text',array(
		'label'	=> __('Copyright Text','vw-interior-designs'),
		'section'=> 'vw_interior_designs_footer',
		'setting'=> 'vw_interior_designs_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_interior_designs_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Interior_Designs_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Interior_Designs_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Interior_Designs_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Interior Pro Theme', 'vw-interior-designs' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-interior-designs' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/interior-design-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-interior-designs-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-interior-designs-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Interior_Designs_Customize::get_instance();