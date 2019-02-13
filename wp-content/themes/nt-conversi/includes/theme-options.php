<?php
	add_action( 'init', 'nt_conversi_custom_theme_options' );
	function nt_conversi_custom_theme_options() {
	 
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;

	$nt_conversi_saved_settings = get_option( ot_settings_id(), array() );
	$nt_conversi_custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
	
	'sections'        => array( 
		array(
			'id'          => 'generalcolor',
			'title'       => esc_html__( 'General Color', 'nt-conversi' ),
		),
		array(
			'id'          => 'general',
			'title'       => esc_html__( 'Logo', 'nt-conversi' ),
		),  
		  array(
			'id'          => 'pre',
			'title'       => esc_html__( 'Preloader', 'nt-conversi' ),
		), 
		 array(
			'id'          => 'google_fonts',
			'title'       => esc_html__( 'Google Fonts', 'nt-conversi' ),
		),
		  array(
			'id'          => 'typography',
			'title'       => esc_html__( 'Typography', 'nt-conversi' ),
		),
		array(
			'id'          => 'top_header',
			'title'       => esc_html__( 'Top Header', 'nt-conversi' ),
		),
		array(
			'id'          => 'navigation',
			'title'       => esc_html__( 'Navigation', 'nt-conversi' ),
		), 
		array(
			'id'          => 'sidebars',
			'title'       => esc_html__( 'Sidebars', 'nt-conversi' ),
		),
		array(
			'id'          => 'sidebars_settings',
			'title'       => esc_html__( 'Sidebar Colors', 'nt-conversi' ),
		),
		array(
			'id'          => 'header',
			'title'       => esc_html__( 'Blog Header', 'nt-conversi' ),
		),
		array(
			'id'          => 'header_color',
			'title'       => esc_html__( 'Blog Heading', 'nt-conversi' ),
		),	  
		array(
			'id'          => 'post_color',
			'title'       => esc_html__( 'Blog Post Colors', 'nt-conversi' ),
		),
		array(
			'id'          => 'single_header',
			'title'       => esc_html__( 'Single Page', 'nt-conversi' ),
		),
		array(
			'id'          => 'archive_page',
			'title'       => esc_html__( 'Archive Page', 'nt-conversi' ),
		),
		array(
			'id'          => 'error_page',
			'title'       => esc_html__( '404 Page', 'nt-conversi' ),
		),
		array(
			'id'          => 'search_page',
			'title'       => esc_html__( 'Search Page', 'nt-conversi' ),
		),	  
		array(
			'id'          => 'breadcrubms',
			'title'       => esc_html__( 'Breadcrubms', 'nt-conversi' ),
		),	  
		array(
			'id'          => 'copyright',
			'title'       => esc_html__( 'Footer', 'nt-conversi' ),
		),
		array(
			'id'          => 'copyright_color',
			'title'       => esc_html__( 'Footer Color', 'nt-conversi' ),
		),
		array(
			'id'          => 'maps',
			'title'       => esc_html__( 'Google maps settings', 'nt-conversi' ),
		),
	), // sidebar end
	
// options start
'settings'        => array( 

		// THEME SKIN
		array(
			'id'          => 'nt_conversi_boxed',
			'label'       => esc_html__('Theme layout', 'nt-conversi' ),
			'desc'        => esc_html__('Choose layout home page', 'nt-conversi' ),
			'std'         => 'stretched',
			'type'        => 'select',
			'section'     => 'generalcolor',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'       => 'stretched',
					'label'       => esc_html__('Stretched', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => 'boxed',
					'label'       => esc_html__('Boxed', 'nt-conversi' ),
					'src'         => ''
				)
			)
		),
		array(
			'id'          => 'nt_conversi_theme_body_bg',
			'label'       => esc_html__('Use body background image or bg color', 'nt-conversi' ),
			'desc'        => esc_html__('Upload background image', 'nt-conversi' ),
			'type'        => 'background',
			'condition'   => 'nt_conversi_boxed:is(boxed)',
			'section'     => 'generalcolor'
		),
		array(
			'id'          => 'nt_conversi_theme_body_bgcolor',
			'label'       => esc_html__( 'Theme body background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_boxed:is(stretched)',
			'section'     => 'generalcolor'
		),
		array(
			'id'          => 'nt_conversi_theme_color',
			'label'       => esc_html__('Theme Color', 'nt-conversi' ),
			'desc'        => esc_html__('Choose theme general color', 'nt-conversi' ),
			'std'         => '#3ebcfa',
			'type'        => 'select',
			'section'     => 'generalcolor',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '#3ebcfa',
					'label'       => esc_html__('Blue', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '#44d86e',
					'label'       => esc_html__('Green', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '#fb53c2',
					'label'       => esc_html__('Pink', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '#c95ef5',
					'label'       => esc_html__('Purple', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '#ff7469',
					'label'       => esc_html__('Red', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '#f7b943',
					'label'       => esc_html__('Yellow', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => 'custom',
					'label'       => esc_html__('Custom Color', 'nt-conversi' ),
					'src'         => ''
				),

			)
		),
		array(
			'id'          => 'nt_conversi_custom_color',
			'label'       => esc_html__( 'Theme general color 1', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_theme_color:is(custom)',
			'section'     => 'generalcolor'
		),

		/*** LOGO SETTINS **/
		array(
			'id'          => 'nt_conversi_logo_type',
			'label'       => esc_html__('Logo Type', 'nt-conversi' ),
			'desc'        => esc_html__('Choose logo type', 'nt-conversi' ),
			'std'         => 'text',
			'type'        => 'select',
			'section'     => 'general',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => 'img',
					'label'       => esc_html__('Image Logo', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => 'text',
					'label'       => esc_html__('Text Logo', 'nt-conversi' ),
					'src'         => ''
				)
			)
		),
		array(
			'id'          => 'nt_conversi_whitelogoimg',
			'label'       => esc_html__('Upload static menu logo image', 'nt-conversi' ),
			'desc'        => esc_html__('Upload white logo image', 'nt-conversi' ),
			'type'        => 'upload',
			'condition'   => 'nt_conversi_logo_type:is(img)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_darklogoimg',
			'label'       => esc_html__('Upload sticky menu logo image', 'nt-conversi' ),
			'desc'        => esc_html__('Upload dark logo image', 'nt-conversi' ),
			'type'        => 'upload',
			'condition'   => 'nt_conversi_logo_type:is(img)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_logo_dimension',
			'label'       => esc_html__( 'Static Logo dimension', 'nt-conversi' ),
			'desc'        => esc_html__( 'Static Logo image dimension', 'nt-conversi' ),
			'type'        => 'dimension',
			'condition'   => 'nt_conversi_logo_type:is(img)',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_conversi_logo_dimension_sticky',
			'label'       => esc_html__( 'Sticky Logo dimension', 'nt-conversi' ),
			'desc'        => esc_html__( 'Sticky Logo image dimension', 'nt-conversi' ),
			'type'        => 'dimension',
			'condition'   => 'nt_conversi_logo_type:is(img)',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_conversi_textlogo',
			'label'       => 'Text logo',
			'desc'        => 'Text logo',
			'std'         => 'CONVERSI',
			'type'        => 'text',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_logo_link',
			'label'       => 'Logo custom link',
			'desc'        => 'Add logo your custom URL/link',
			'std'         => '',
			'type'        => 'text',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_logo_target',
			'label'       => esc_html__( 'Target logo link', 'nt-conversi' ),
			'desc'        => esc_html__( 'Select logo link target type.' , 'nt-conversi' ),
			'std'         => '',
			'type'        => 'select',
			'section'     => 'general',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '',
					'label'       => esc_html__( 'Select target', 'nt-conversi' )
				),
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-conversi' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-conversi' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-conversi' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-conversi' )
				),
			)
		),
		array(
			'id'          => 'nt_conversi_textlogo_fs',
			'label'       => esc_html__('Font size', 'nt-conversi' ),
			'desc'        => esc_html__('Font size for text logo', 'nt-conversi' ),
			'std'         => '30',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'min_max_step'=> '0,100',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_textlogo_fw',
			'label'       => esc_html__('Font weight', 'nt-conversi' ),
			'desc'        => esc_html__('Font weight for text logo', 'nt-conversi' ),
			'std'         => '700',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'min_max_step'=> '100,900,100',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_textlogo_lettersp',
			'label'       => esc_html__('Letter spacing', 'nt-conversi' ),
			'desc'        => esc_html__('Letter spacing for text logo', 'nt-conversi' ),
			'std'         => '0',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'min_max_step'=> '0,10',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_textlogo_fstyle',
			'label'       => esc_html__('Font style', 'nt-conversi' ),
			'desc'        => esc_html__('Choose font style for text logo', 'nt-conversi' ),
			'std'         => 'normal',
			'type'        => 'select',
			'section'     => 'general',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => 'normal',
					'label'       => esc_html__('Normal', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => 'italic',
					'label'       => esc_html__('Italic', 'nt-conversi' ),
					'src'         => ''
				)
			)
		),
		array(
			'id'          => 'nt_conversi_staticlogo_color',
			'label'       => esc_html__( 'Static Text Logo color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color for static menu text logo', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_stickylogo_color',
			'label'       => esc_html__( 'Sticky Text Logo color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color for sticky menu text logo', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_conversi_padding_logo',
			'label'       => esc_html__( 'Logo padding', 'nt-conversi' ),
			'desc'        => esc_html__( 'Logo padding', 'nt-conversi' ),
			'type'        => 'spacing',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_conversi_margin_logo',
			'label'       => esc_html__( 'Logo margin', 'nt-conversi' ),
			'desc'        => esc_html__( 'Logo margin', 'nt-conversi' ),
			'type'        => 'spacing',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_conversi_padding_logo_sticky',
			'label'       => esc_html__( 'Sticky Logo padding', 'nt-conversi' ),
			'desc'        => esc_html__( 'Sticky Logo padding', 'nt-conversi' ),
			'type'        => 'spacing',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_conversi_margin_logo_sticky',
			'label'       => esc_html__( 'Sticky Logo margin', 'nt-conversi' ),
			'desc'        => esc_html__( 'Sticky Logo margin', 'nt-conversi' ),
			'type'        => 'spacing',
			'section'     => 'general',
		),
		//PRELOADER
		array(
			'id'          => 'nt_conversi_pre',
			'label'       => esc_html__( 'Preloader', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Preloader visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_preloader',
			'label'       => esc_html__( 'Preloader selection', 'nt-conversi' ),
			'desc'        => esc_html__( 'Select preloader type. Default or Custom preloader' , 'nt-conversi' ),
			'std'         => 'default',
			'type'        => 'select',
			'section'     => 'pre',
			'condition'   => 'nt_conversi_pre:is(on)',
			'operator'    => 'and',
			'choices'     => array( 
			array(
				'value'   => 'default',
				'label'   => esc_html__( 'Default Preloader', 'nt-conversi' )
			),
			array(
				'value'   => 'custom',
				'label'   => esc_html__( 'Custom Preloader', 'nt-conversi' )
			)
		  )
		),

		//CUSTOM PRELOADER
		array(
			'id'          => 'nt_conversi_custom_preloader',
			'label'       => esc_html__( 'Custom preloader html area', 'nt-conversi' ),
			'desc'        => esc_html__('Add your custom preloader html', 'nt-conversi' ),
			'type'        => 'textarea',
			'rows'        => '15',
			'condition'   => 'nt_conversi_pre:is(on),nt_conversi_preloader:is(custom)',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_preloadercss',
			'label'       => esc_html__( 'Custom preloader CSS', 'nt-conversi' ),
			'desc'        => esc_html__('You can add additional css for custom preloader', 'nt-conversi' ),
			'type'        => 'css',
			'condition'   => 'nt_conversi_pre:is(on),nt_conversi_preloader:is(custom)',
			'section'     => 'pre',
			'rows'        => '20',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_custom_preloader_js',
			'label'       => esc_html__( 'Use custom javascript ?', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'You can use custom javascript for your custom preloader class or ID name. %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'condition'   => 'nt_conversi_pre:is(on),nt_conversi_preloader:is(custom)',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_preloaderjs',
			'label'       => esc_html__( 'Custom preloader JS', 'nt-conversi' ),
			'desc'        => esc_html__('You can add additional javascript function for your custom preloader', 'nt-conversi' ),
			'type'        => 'javascript',
			'condition'   => 'nt_conversi_pre:is(on),nt_conversi_preloader:is(custom),nt_conversi_custom_preloader_js:is(on)',
			'section'     => 'pre',
			'rows'        => '20',
			'operator'    => 'and'
		),

		/**  GOOGLE FONTS SETTINGS.  **/  
		array(
			'id'          => 'body_google_fonts',
			'label'       => esc_html__( 'Google Fonts', 'nt-conversi'  ),
			'desc'        => 'Add Google Font and after the save settings follow these steps Dashbont_conversi > Appearance > Theme Options > Typography',
			'type'        => 'google-fonts',
			'section'     => 'google_fonts',
			'operator'    => 'and'
		),

		/**  TYPOGRAPHY SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_tipigrof',
			'label'       => esc_html__( 'Typography', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof1',
			'label'       => esc_html__( 'Typography h1', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof2',
			'label'       => esc_html__( 'Typography h2', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof3',
			'label'       => esc_html__( 'Typography h3', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof4',
			'label'       => esc_html__( 'Typography h4', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof5',
			'label'       => esc_html__( 'Typography h5', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_tipigrof6',
			'label'       => esc_html__( 'Typography h6', 'nt-conversi' ),
			'desc'        => 'The Typography option type is for adding typography styles to your site.',
			'type'        => 'typography',
			'section'     => 'typography',
			'operator'    => 'and'
		),
		//TOP HEADER
		//contact section
		array(
			'id'          => 'nt_conversi_top_header_tabcontact',
			'label'       => esc_html__( 'Top header contact', 'nt-conversi' ),
			'type'        => 'tab',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_header_contact_display',
			'label'       => esc_html__( 'Top header contact section display ', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose social section display %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'top_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_mobile_contact_display',
			'label'       => esc_html__( 'Mobile menu contact section display ', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose contact section display %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_header_contact',
			'label'       => esc_html__( 'Contact', 'nt-conversi' ),
			'desc'        => esc_html__( 'Add contact detail to top-header', 'nt-conversi' ),
			'type'        => 'list-item',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'settings'    => array( 
				array(
					'id'          => 'nt_conversi_header_contact_icon',
					'label'       => esc_html__( 'Before text icon', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter icon name. example : fa fa-phone', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_header_contact_text',
					'label'       => esc_html__( 'Contact text', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter contact detail text.example:+2543589415 or email', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_header_contact_link',
					'label'       => esc_html__( 'Add link/URL', 'nt-conversi' ),
					'desc'        => esc_html__( 'You can add to link for this text', 'nt-conversi' ),
					'type'        => 'text'
				),
			)
		),
		array(
			'id'          => 'nt_conversi_header_contact_target',
			'label'       => esc_html__( 'Target contact link', 'nt-conversi' ),
			'desc'        => esc_html__( 'Select contact link target type. Default : _blank' , 'nt-conversi' ),
			'std'         => '_blank',
			'type'        => 'select',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-conversi' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-conversi' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-conversi' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-conversi' )
				),
			)
		),
		array(
			'id'          => 'nt_conversi_top_header_textcolor',
			'label'       => esc_html__( 'Top header contact text color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_iconcolor',
			'label'       => esc_html__( 'Top header contact icon color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_linkcolor',
			'label'       => esc_html__( 'Top header contact link color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_linkhovercolor',
			'label'       => esc_html__( 'Top header contact link hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_contact_display:is(on)',
			'section'     => 'top_header'
		),
		//social section
		array(
			'id'          => 'nt_conversi_top_header_tabsocial',
			'label'       => esc_html__( 'Top header social', 'nt-conversi' ),
			'type'        => 'tab',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_header_social_display',
			'label'       => esc_html__( 'Top header social section display ', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose social section display %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'top_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_header_mobile_social_display',
			'label'       => esc_html__( 'Mobile menu social section display ', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose social section display %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_header_social',
			'label'       => esc_html__( 'Top header social media', 'nt-conversi' ),
			'desc'        => esc_html__( 'Add social media to top-header', 'nt-conversi' ),
			'type'        => 'list-item',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'settings'    => array( 
				array(
					'id'          => 'nt_conversi_header_social_text',
					'label'       => esc_html__( 'social icon name', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter icon name. example : fa fa-facebook', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_header_social_link',
					'label'       => esc_html__( 'URL', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter a url for social media', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_header_social_name',
					'label'       => esc_html__( 'social media name', 'nt-conversi' ),
					'desc'        => esc_html__( 'Use simple social media name for bg color. example : facebook, twitter, pinterest and etc.', 'nt-conversi' ),
					'type'        => 'text'
				),
			)
		),
		array(
			'id'          => 'nt_conversi_header_social_target',
			'label'       => esc_html__( 'Target social media', 'nt-conversi' ),
			'desc'        => esc_html__( 'Select social media target type. Default : _blank' , 'nt-conversi' ),
			'std'         => '_blank',
			'type'        => 'select',
			'section'     => 'top_header',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-conversi' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-conversi' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-conversi' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-conversi' )
				),
			)
		),
		array(
			'id'          => 'nt_conversi_top_header_socialcolor',
			'label'       => esc_html__( 'Top header social icon color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_socialhovercolor',
			'label'       => esc_html__( 'Top header social icon hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_socialbgcolor',
			'label'       => esc_html__( 'Change social icon background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_socialbghovercolor',
			'label'       => esc_html__( 'Change social icon background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_header_social_display:is(on)',
			'section'     => 'top_header'
		),
		//top header general section
		array(
			'id'          => 'nt_conversi_top_header_style',
			'label'       => esc_html__( 'Top header Style', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'tab',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_bgcolor',
			'label'       => esc_html__( 'Top header background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'top_header'
		),
		array(
			'id'          => 'nt_conversi_top_header_pad_top',
			'label'       => esc_html__('Top header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std'		  => '20',
			'section'     => 'top_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_top_header_pad_bot',
			'label'       => esc_html__('Top header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std'		  => '20',
			'section'     => 'top_header',
			'operator'    => 'and'
		),
		/**  NAVIGATION SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_navigationbg',
			'label'       => esc_html__( 'Theme navigation background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_conversi_navitem',
			'label'       => esc_html__( 'Theme navigation menu item color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_conversi_navitemhover',
			'label'       => esc_html__( 'Theme navigation menu item hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_conversi_menubtn_display',
			'label'       => esc_html__( 'Navigation Signup button display', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Navigation Signup button display %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'navigation',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_menubtn',
			'label'       => 'Navigation Signup button title',
			'std'         => 'Sign-Me Up!',
			'type'        => 'text',
			'section'     => 'navigation',
			'condition'   => 'nt_conversi_menubtn_display:is(on)',
		),
		array(
			'id'          => 'nt_conversi_menubtnurl',
			'label'       => 'Navigation Signup button URL/link',
			'std'         => '#0',
			'type'        => 'text',
			'section'     => 'navigation',
			'condition'   => 'nt_conversi_menubtn_display:is(on)',
		),
		array(
			'id'          => 'nt_conversi_menubtntarget',
			'label'       => esc_html__('Signup button target', 'nt-conversi' ),
			'desc'        => esc_html__('Choose button target type', 'nt-conversi' ),
			'std'         => '_blank',
			'type'        => 'select',
			'section'     => 'navigation',
			'condition'   => 'nt_conversi_menubtn_display:is(on)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '_blank',
					'label'       => esc_html__('_blank', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__('_self', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__('_parent', 'nt-conversi' ),
					'src'         => ''
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__('_top', 'nt-conversi' ),
					'src'         => ''
				),
			)
		),
		/**  SIDEBAR TYPE SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_bloglayout',
			'label'       => esc_html__( 'Blog Layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose blog page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_pagelayout',
			'label'       => esc_html__( 'Default Page Layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose default page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_searchlayout',
			'label'       => esc_html__( 'Search page Layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose search page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_postlayout',
			'label'       => esc_html__( 'Blog single page layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose post page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archivelayout',
			'label'       => esc_html__( 'archive page layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose archive page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_404layout',
			'label'       => esc_html__( '404 page layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'woosingle',
			'label'       => esc_html__( 'Woocommerce single page layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose Woocommerce single page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'woopage',
			'label'       => esc_html__( 'Woocommerce  page layout', 'nt-conversi' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-conversi' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),

		/**  SIDEBAR SETTINGS.  **/	
	    array(
			'id'          => 'nt_conversi_sidebarwidgetareabgcolor',
			'label'       => esc_html__( 'Theme Sidebar widget area background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
	    array(
			'id'          => 'nt_conversi_sidebarwidgetgeneralcolor',
			'label'       => esc_html__( 'Theme Sidebar widget general color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
		array(
			'id'          => 'nt_conversi_sidebarwidgettitlecolor',
			'label'       => esc_html__( 'Theme Sidebar widget title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
 		array(
			'id'          => 'nt_conversi_sidebarlinkcolor',
			'label'       => esc_html__( 'Theme Sidebar link title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
 		array(
			'id'          => 'nt_conversi_sidebarlinkhovercolor',
			'label'       => esc_html__( 'Theme Sidebar link title hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
  		array(
			'id'          => 'nt_conversi_sidebarsearchsubmittextcolor',
			'label'       => esc_html__( 'Theme Sidebar search submit text color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
      	array(
			'id'          => 'nt_conversi_sidebarsearchsubmitbgcolor',
			'label'       => esc_html__( 'Theme Sidebar search submit background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),

		/**  POST SETTINGS.  **/
      	array(
			'id'          => 'nt_conversi_blogposttitlecolor',
			'label'       => esc_html__( 'Blog Post Title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogposttitlhoverecolor',
			'label'       => esc_html__( 'Blog Post Title hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogmetacolor',
			'label'       => esc_html__( 'Blog Post Meta Title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogmetalinktextcolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogmetalinkhovercolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogmetalinktextbgcolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogmetalinktextbghovercolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogpostparagraphcolor',
			'label'       => esc_html__( 'Blog Post Paragraph color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_conversi_blogpostbuttonbgcolor',
			'label'       => esc_html__( 'Blog Post button background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_conversi_blogpostbuttonbghovercolor',
			'label'       => esc_html__( 'Blog Post button background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_conversi_blogpostbuttontitlecolor',
			'label'       => esc_html__( 'Blog Post button title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_conversi_blogpostbuttontitlehovercolor',
			'label'       => esc_html__( 'Blog Post button title hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_conversi_blogsharebgcolor',
			'label'       => esc_html__( 'Blog Post Share Icon background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_conversi_blogsharebghovercolor',
			'label'       => esc_html__( 'Blog Post Share Icon background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_conversi_blogsharecolor',
			'label'       => esc_html__( 'Blog Post Share Icon color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_conversi_blogsharehovercolor',
			'label'       => esc_html__( 'Blog Post Share Icon hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_blogcommentformsubmitcolor',
			'label'       => esc_html__( 'Single post comment button title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_blogcommentformsubmithovercolor',
			'label'       => esc_html__( 'Single post comment button title hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_blogcommentformsubmitbgcolor',
			'label'       => esc_html__( 'Single post comment button background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_blogcommentformsubmitbghovercolor',
			'label'       => esc_html__( 'Single post comment button background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_pagertitlecolor',
			'label'       => esc_html__( 'Pager button title color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_pagertitlehovercolor',
			'label'       => esc_html__( 'Pager button title hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_pagerbgcolor',
			'label'       => esc_html__( 'Pager button background color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_conversi_pagerbghovercolor',
			'label'       => esc_html__( 'Pager button background hover color', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),

		/**  BLOG/PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_blog_mask_v',
			'label'       => esc_html__( 'Blog header background overlay mask visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Blog header background overlay mask  %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blog_mask_c',
			'label'       => esc_html__( 'Blog header background overlay mask color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_blog_mask_v:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_conversi_blog_h_bg',
			'label'       =>  esc_html__( 'Blog Pages Header Section background image', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-conversi' ),
			'type'        => 'upload',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blog_h_h',
			'label'       => esc_html__('Blog Pages Header height', 'nt-conversi' ),
			'desc'        => esc_html__('Blog Pages Header height', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std		 '=> '65',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blog_h_p',
			'label'       => esc_html__('Header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blogheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'header',
			'operator'    => 'and'
		),

		/**  BLOG/PAGE HEADING COLOR SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_disable_title',
			'label'       => esc_html__( 'Blog Page Heading visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Blog Page Heading visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header_color',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blog_title',
			'label'       => esc_html__( 'Blog Page Heading', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Blog Page Heading', 'nt-conversi' ),
			'std'         => 'BLOG',
			'type'        => 'text',
			'condition'   => 'nt_conversi_disable_title:is(on)',
			'section'     => 'header_color'
		),
		array(
			'id'          => 'nt_conversi_blogheadingfontsize',
			'label'       => esc_html__('Blog Heading font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter Blog Heading font size', 'nt-conversi' ),
			'std'         => '42',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_conversi_disable_title:is(on)',
			'section'     => 'header_color',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blogheadingcolor',
			'label'       => esc_html__( 'Blog Pages Heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_disable_title:is(on)',
			'section'     => 'header_color'
		),
		array(
			'id'          => 'nt_conversi_page_disable_sub',
			'label'       => esc_html__( 'Blog Page Subtitle visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Blog Page Subtitle visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header_color',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blog_subtitle',
			'label'       => esc_html__( 'Blog Page Subtitle', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Blog Page Subtitle', 'nt-conversi' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_conversi_page_disable_sub:is(on)',
			'section'     => 'header_color'
		),
		array(
			'id'          => 'nt_conversi_blogsubheadingfontsize',
			'label'       => esc_html__('Blog Subtitle font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter Blog Subtitle font size', 'nt-conversi' ),
			'std'         => '21',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_conversi_page_disable_sub:is(on)',
			'section'     => 'header_color',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blogsubtitlecolor',
			'label'       => esc_html__( 'Blog Pages Subtitle color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_page_disable_sub:is(on)',
			'section'     => 'header_color'
		),

		/**  SINGLE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_single_mask_v',
			'label'       => esc_html__( 'Single header background overlay mask visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Single header background overlay mask  %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_single_mask_c',
			'label'       => esc_html__( 'Single header background overlay mask color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_single_mask_v:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_conversi_singlepageheadbg',
			'label'       =>  esc_html__( 'Single Header Section background image', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-conversi' ),
			'type'        => 'upload',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_singleheaderbgcolor',
			'label'       => esc_html__( 'Single Pages Header Section background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_conversi_single_disable_heading',
			'label'       => esc_html__( 'Single pages heading post title visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Please select single pages heading post title  visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_singleheadingcolor',
			'label'       => esc_html__( 'Single Pages Heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_single_disable_heading:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_conversi_single_heading_fontsize',
			'label'       => esc_html__('Single Heading font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter Single Heading font size', 'nt-conversi' ),
			'std'         => '65',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_conversi_single_disable_heading:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_singleheaderbgheight',
			'label'       => esc_html__('Single Pages Header height', 'nt-conversi' ),
			'desc'        => esc_html__('Single Pages Header height', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std		 '=> '65',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_singleheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_singleheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'single_header',
			'operator'    => 'and'
		),

		/**  ARCHIVE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_archive_mask_v',
			'label'       => esc_html__( 'Archive header background overlay mask visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Archive header background overlay mask  %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archive_mask_c',
			'label'       => esc_html__( 'Archive header background overlay mask color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_archive_mask_v:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_conversi_archivepageheadbg',
			'label'       =>  esc_html__( 'Archive Header Section background image', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-conversi' ),
			'type'        => 'upload',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archiveheaderbgcolor',
			'label'       => esc_html__( 'Archive Pages Header Section background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_conversi_archiveheaderbgheight',
			'label'       => esc_html__('Archive Pages Header height', 'nt-conversi' ),
			'desc'        => esc_html__('Archive Pages Header height', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std		 '=> '65',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archiveheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archiveheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archive_heading_visibility',
			'label'       => esc_html__( 'Archive Heading visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Archive Heading visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),	  
		array(
			'id'          => 'nt_conversi_archive_heading',
			'label'       => esc_html__( 'Archive Heading', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Archive Heading', 'nt-conversi' ),
			'std'         => 'Our Archive',
			'type'        => 'text',
			'condition'   => 'nt_conversi_archive_heading_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_conversi_archive_heading_fontsize',
			'label'       => esc_html__('Archive Heading font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter Archive Heading font size', 'nt-conversi' ),
			'std'         => '65',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_conversi_archive_heading_visibility:is(on)',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archiveheadingcolor',
			'label'       => esc_html__( 'Archive Pages Heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_archive_heading_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_conversi_archive_slogan_visibility',
			'label'       => esc_html__( 'Archive Heading visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Archive slogan visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_archive_slogan',
			'label'       => esc_html__( 'Archive Slogan', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Archive Slogan', 'nt-conversi' ),
			'std'         => 'Welcome to your Archive. This is your all post. Edit or delete them, then start writing!',
			'type'        => 'text',
			'condition'   => 'nt_conversi_archive_slogan_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_conversi_archiveheaderparagraphcolor',
			'label'       => esc_html__( 'Archive Pages paragraph/slogan color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_archive_slogan_visibility:is(on)',
			'section'     => 'archive_page'
		),

		/**  404 PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_error_mask_v',
			'label'       => esc_html__( '404 header background overlay mask visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( '404 header background overlay mask  %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_error_mask_c',
			'label'       => esc_html__( '404 header background overlay mask color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_error_mask_v:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_conversi_errorpageheadbg',
			'label'       =>  esc_html__( '404 Header Section background image', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-conversi' ),
			'type'        => 'upload',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_errorheaderbgcolor',
			'label'       => esc_html__( '404 Pages Header Section background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_conversi_errorheaderbgheight',
			'label'       => esc_html__('404 Pages Header height', 'nt-conversi' ),
			'desc'        => esc_html__('404 Pages Header height', 'nt-conversi' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std		 '=> '65',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_errorheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_errorheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_error_heading_visibility',
			'label'       => esc_html__( '404 Page Heading visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'error Heading visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),	  
		array(
			'id'          => 'nt_conversi_error_heading',
			'label'       => esc_html__( '404 Page Heading', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Error Heading', 'nt-conversi' ),
			'std'         => '404 Page',
			'type'        => 'text',
			'condition'   => 'nt_conversi_error_heading_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_conversi_error_heading_fontsize',
			'label'       => esc_html__('404 Page Heading font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter 404 Page Heading font size', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'error_page',
			'condition'   => 'nt_conversi_error_heading_visibility:is(on)',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_errorheadingcolor',
			'label'       => esc_html__( '404 Pages Heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_error_heading_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_conversi_error_slogan_visibility',
			'label'       => esc_html__( '404 Page slogan visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( '404 Page slogan visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_error_slogan',
			'label'       => esc_html__( '404 Page Slogan', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter 404 Page Slogan', 'nt-conversi' ),
			'std'         => 'Oops! That page can not be found.',
			'type'        => 'text',
			'condition'   => 'nt_conversi_error_slogan_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_conversi_errorheaderparagraphcolor',
			'label'       => esc_html__( '404 Pages paragraph/slogan color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_error_slogan_visibility:is(on)',
			'section'     => 'error_page'
		),

		/**  SEARCH PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_search_mask_v',
			'label'       => esc_html__( 'Search header background overlay mask visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Search header background overlay mask  %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_search_mask_c',
			'label'       => esc_html__( 'Search header background overlay mask color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_conversi_search_mask_v:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_conversi_searchpageheadbg',
			'label'       =>  esc_html__( 'Search Header Section background image', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-conversi' ),
			'type'        => 'upload',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_searchheaderbgcolor',
			'label'       => esc_html__( 'Search Pages Header Section background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_conversi_searchheaderbgheight',
			'label'       => esc_html__('Search Pages Header height', 'nt-conversi' ),
			'desc'        => esc_html__('Search Pages Header height', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std		 '=> '65',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_searchheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_searchheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-conversi' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_search_heading_visibility',
			'label'       => esc_html__( 'Search Page Heading visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'search Heading visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_search_heading',
			'label'       => esc_html__( 'Search Page Heading', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Search Heading', 'nt-conversi' ),
			'std'         => 'Search Page',
			'type'        => 'text',
			'condition'   => 'nt_conversi_search_heading_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_conversi_search_heading_fontsize',
			'label'       => esc_html__('Search Page Heading font size', 'nt-conversi' ),
			'desc'        => esc_html__('Enter Search Page Heading font size', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_conversi_search_heading_visibility:is(on)',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_searchheadingcolor',
			'label'       => esc_html__( 'Search Pages Heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_search_heading_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_conversi_search_slogan_visibility',
			'label'       => esc_html__( 'Search Page slogan visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Search Page slogan visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_search_slogan',
			'label'       => esc_html__( 'Search Page Slogan', 'nt-conversi' ),
			'desc'        => esc_html__( 'Enter Search Page Slogan', 'nt-conversi' ),
			'std'         => 'Search completed',
			'type'        => 'text',
			'condition'   => 'nt_conversi_search_slogan_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_conversi_searchheaderparagraphcolor',
			'label'       => esc_html__( 'Search Pages paragraph/slogan color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_search_slogan_visibility:is(on)',
			'section'     => 'search_page'
		),

		/**  BREADCRUBMS SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_bread',
			'label'       => esc_html__( 'Default and Fullwidth  Page breadcrubms visibility', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Breadcrubms visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_blogbreadcrubmscolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_conversi_blogbreadcrubmshovercolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms hover color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_conversi_blogbreadcrubmscurrentcolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms current page text color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_conversi_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_conversi_bread_f_s',
			'label'       => esc_html__('Breadcrubms font size', 'nt-conversi' ),
			'desc'        => esc_html__('Blog/Pages Header Breadcrubms font size', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'std		 '=> '18',
			'min_max_step'=> '0,100',
			'section'     => 'breadcrubms',
			'condition'   => 'nt_conversi_bread:is(on)',
			'operator'    => 'and'
		),

		/**  FOOTER SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_widgetize',
			'label'       => esc_html__( 'Footer top widgetize area section', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_footerwidgetizepadding',
			'label'       => esc_html__('Footer widgetize padding top and botom', 'nt-conversi' ),
			'desc'        => esc_html__('Enter padding top and botom for widgetize footer', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'std'		  => '40',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_conversi_widgetize:is(on)',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_defaultfooter_visibility',
			'label'       => esc_html__( 'Default footer section display', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_copyright_visibility',
			'label'       => esc_html__( 'footer powered section', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose footer powered section %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on)',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_copyright',
			'label'       => esc_html__( 'Footer copyright', 'nt-conversi' ),
			'std'         => esc_html__( 'Ninetheme Conversi. All Rights Reserved', 'nt-conversi' ),
			'type'        => 'textarea',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on),nt_conversi_copyright_visibility:is(on)',
			'section'     => 'copyright'
		),
		array(
			'id'          => 'nt_conversi_footercopyrightpadding',
			'label'       => esc_html__('Footer copyright padding top and botom', 'nt-conversi' ),
			'desc'        => esc_html__('Enter padding top and botom for footer copyright', 'nt-conversi' ),
			'type'        => 'numeric-slider',
			'std'		  => '30',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on),nt_conversi_copyright_visibility:is(on)',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_social_section',
			'label'       => esc_html__( 'social section visibility ', 'nt-conversi' ),
			'desc'        => sprintf( esc_html__( 'Choose social section visibility %s or %s.', 'nt-conversi' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on)',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_conversi_social',
			'label'       => esc_html__( 'Footer Social Icons', 'nt-conversi' ),
			'desc'        => esc_html__( 'Footer Social Icons', 'nt-conversi' ),
			'type'        => 'list-item',
			'section'     => 'copyright',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on),nt_conversi_social_section:is(on)',
			'settings'    => array( 
				array(
					'id'          => 'nt_conversi_social_text',
					'label'       => esc_html__( 'social icon name', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter icon name. example : fa fa-facebook', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_social_link',
					'label'       => esc_html__( 'URL', 'nt-conversi' ),
					'desc'        => esc_html__( 'Enter a url for social media', 'nt-conversi' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_conversi_social_class',
					'label'       => esc_html__( 'social icon class name', 'nt-conversi' ),
					'desc'        => esc_html__( 'Use simple social media name for bg color. example : facebook, twitter, pinterest and etc.', 'nt-conversi' ),
					'type'        => 'text'
				),
			)
		),
		array(
			'id'          => 'nt_conversi_social_target',
			'label'       => esc_html__( 'Target social media', 'nt-conversi' ),
			'desc'        => esc_html__( 'Select social media target type. Default : _blank' , 'nt-conversi' ),
			'std'         => '_blank',
			'type'        => 'select',
			'section'     => 'copyright',
			'condition'   => 'nt_conversi_defaultfooter_visibility:is(on),nt_conversi_social_section:is(on)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-conversi' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-conversi' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-conversi' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-conversi' )
				),
			)
		),

		/**  FOOTER COLOR SETTINGS.  **/
		array(
			'id'          => 'nt_conversi_footerwidgetizebgcolor',
			'label'       => esc_html__( 'Footer widgetize background color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_conversi_footer_h_c',
			'label'       => esc_html__( 'Footer widget heading color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_conversi_footer_t_c',
			'label'       => esc_html__( 'Footer general text color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_conversi_footer_a_c',
			'label'       => esc_html__( 'Footer general a(link/URL) color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_conversi_footerbgcolor',
			'label'       => esc_html__( 'Footer copyright( default ) background  color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_conversi_footer_p_c',
			'label'       => esc_html__( 'Footer copyright text color ', 'nt-conversi' ),
			'desc'        => esc_html__( 'Please select color', 'nt-conversi' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright_color'
		),

		// GOOGLE MAPS
		array(
			'id'          => 'nt_conversi_map_api_key',
			'label'       =>  esc_html__( 'Google Maps api key', 'nt-conversi' ),
			'desc'        =>  esc_html__( 'You must create an api key and paste this box. Create :https://developers.google.com/maps/documentation/javascript/get-api-key#key ', 'nt-conversi' ),
			'type'        => 'text',
			'section'     => 'maps'
		),
		array(
			'id'          => 'nt_conversi_longitude',
			'label'       => esc_html__( 'Google Maps longitude', 'nt-conversi' ),
			'type'        => 'text',
			'section'     => 'maps'
		),
		array(
			'id'          => 'nt_conversi_latitude',
			'label'       => esc_html__( 'Google Maps latitude', 'nt-conversi' ),
			'type'        => 'text',
			'section'     => 'maps'
		),

	) // end array

); // end function

	/* allow settings to be filtered before saving */
	$nt_conversi_custom_settings = apply_filters( ot_settings_id() . '_args', $nt_conversi_custom_settings );
	
	/* settings are not the same update the DB */
	if ( $nt_conversi_saved_settings !== $nt_conversi_custom_settings ) {
		update_option( ot_settings_id(), $nt_conversi_custom_settings ); 
	}
	
	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
	
	}