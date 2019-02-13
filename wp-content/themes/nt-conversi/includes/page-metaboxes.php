<?php

add_filter( 'rwmb_meta_boxes', 'nt_conversi_register_meta_boxes' );
function nt_conversi_register_meta_boxes( $meta_boxes ) {
$prefix = 'nt_conversi_';
$meta_boxes = array();


/* ----------------------------------------------------- */
// Frontpage Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' 		=> 'pagesettings',
	'title' 	=> esc_html__( 'Page Settings', 'nt-conversi' ),
	'pages' 	=> array( 'page' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',

	'hide'   	=> array(
		'template'    => array( 'one-page-template.php' )
	),
		
	'fields' 	=> array(
	
		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Page Title Options', 'nt-conversi' )
		),
		
		array(
			'name' 		=> esc_html__( 'Disable Page Title', 'nt-conversi' ),
			'id'   		=> $prefix . "disable_title",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),

		array(
			'name'		=> esc_html__( 'Alternate Page Title', 'nt-conversi' ),
			'id'		=> $prefix . "alt_title",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_id',
		),	
		
		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Subtitle Options', 'nt-conversi' ),
		),
		array(
			'name' 		=> esc_html__( 'Disable Page Subtitle', 'nt-conversi' ),
			'id'   		=> $prefix . "disable_subtitle",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),
		array(
			'name' 		=> esc_html__( 'Page Subtitle / Rich Text Editor', 'nt-conversi' ),
			'id'		=> $prefix . "subtitle",
			'type' 		=> 'wysiwyg',
			'raw'  		=> false,
			'options' 	=> array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_id',
		),
		
		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Design Options', 'nt-conversi' ),
		),
		
		array(
			'name' 				=> esc_html__( 'Heading background Image', 'nt-conversi' ),
			'id'               	=> $prefix . "page_bg_image",
			'type'             	=> 'image_advanced',
			'max_file_uploads' 	=> 1,
		),
		array(
			'name' 		=> esc_html__( 'Disable background image mask color', 'nt-conversi' ),
			'id'   		=> $prefix . "disable_page_mask",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),
		array(
			'name' 		=> esc_html__( 'Background image mask color', 'nt-conversi' ),
			'id'   		=> $prefix . "page_mask_color",
			'type' 		=> 'color',
		),
		array(
			'name' 		=> esc_html__( 'Mask color opacity', 'nt-conversi' ),
			'id'   		=> $prefix . "page_mask_opacity",
			'type' 		=> 'number',
			'min'  		=> 0,
			'max'  		=> 1,
			'step' 		=> 0.1,
		),
		// COLOR
		array(
			'name' 		=> esc_html__( 'Page background color', 'nt-conversi' ),
			'id'   		=> $prefix . "page_bg_color",
			'type' 		=> 'color',
		),	
		array(
			'name' 		=> esc_html__( 'Page title color', 'nt-conversi' ),
			'id'   		=> $prefix . "page_text_color",
			'type' 		=> 'color',
		),
		array(
			'name' 		=> esc_html__( 'Page subtitle color', 'nt-conversi' ),
			'id'   		=> $prefix . "page_subtitle_color",
			'type' 		=> 'color',
		),
		array(
			'name' 		=> esc_html__( 'Page header padding top', 'nt-conversi' ),
			'id'   		=> $prefix . "header_p_top",
			'type' 		=> 'number',
			'min'  		=> 0,
			'step' 		=> 1,
		),
		
		array(
			'name' 		=> esc_html__( 'Page header padding bottom', 'nt-conversi' ),
			'id'   		=> $prefix . "header_p_bottom",
			'type' 		=> 'number',
			'min'  		=> 0,
			'step' 		=> 1,
		),
			
		// SELECT BOX
		array(
			'name'     	=> esc_html__( 'Page sidebar', 'nt-conversi' ),
			'id'       	=> $prefix . "pagelayout",
			'type'     	=> 'select',
			'options'  	=> array(
				'left-sidebar' 	=> esc_html__( 'left', 'nt-conversi' ),
				'right-sidebar' => esc_html__( 'right', 'nt-conversi' ),
				'full-width' 	=> esc_html__( 'full', 'nt-conversi' ),
			),
			'multiple'  => false,
			'std'       => 'right-sidebar',
			'placeholder' => esc_html__( 'Select an Item', 'nt-conversi' ),
		),

		
	)
);

/* ----------------------------------------------------- */
// ONE-PAGE METABOX MENU
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' 		=> esc_html__( 'Metabox menu', 'nt-conversi' ),
	'pages'    		=> array( 'page' ),
	'clone-group' 	=> 'onepage-clone-group','clone-group' => 'onepage-clone-group',
	'id' 			=> 'page_menu',
	'context' 		=> 'side',
	'priority' 		=> 'low',
	
	'show'   		=> array(
		'template'    => array( 'one-page-template.php' )
	),
	'fields' 		=> array(
		array(
			'name' 			=> esc_html__('Header menu type', 'nt-conversi'),
			'desc' 			=> esc_html__('Select header menu type', 'nt-conversi'),
			'id'   			=> $prefix . 'menutype',
			'type' 			=> 'select',
			'options'  		=> array(
					'm' => esc_html__( 'Metabox menu', 'nt-conversi' ),
					'p' => esc_html__( 'Default Primary menu', 'nt-conversi' ),
			),
			'std'       	=> 'm'
		),
		array(
			'name'  		=> esc_html__( 'Menu item name', 'nt-conversi' ),
			'desc'  		=> esc_html__('Format: Any text', 'nt-conversi' ),
			'id'    		=> $prefix . 'section_name',
			'type'  		=> 'text',
			'std'   		=> 'Menu item name',
			'class' 		=> 'custom-class',
			'clone' 		=> true,
			'sort_clone' 	=> true,
			'clone-group' 	=> 'onepage-clone-group','clone-group' => 'onepage-clone-group',
		),
		array(
			'name'  		=> esc_html__( 'Menu item Url', 'nt-conversi' ),
			'desc'  		=> esc_html__( 'Format: #sectionname or http://yoururl.com', 'nt-conversi' ),
			'id'    		=> $prefix . 'section_url',
			'type'  		=> 'text',
			'std'   		=> '#sectionname',
			'class' 		=> 'custom-class',
			'clone' 		=> true,
			'sort_clone' 	=> true,
			'clone-group' 	=> 'onepage-clone-group',
		),
	),
);


/* ----------------------------------------------------- */
// PRICE PLUGINS SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' 		=> 'eventssettings',
	'title' 	=> esc_html__('Price table', 'nt-conversi'),
	'pages' 	=> array( 'price' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> esc_html__( 'Pack Type', 'nt-conversi' ),
			'id'		=> $prefix . "featured",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Pack Type', 'nt-conversi' ),
						'featured'	=> esc_html__( 'Featured', 'nt-conversi' ),
						'normal'	=> esc_html__( 'Normal', 'nt-conversi' ),
			)
		),
		array(
			'name' 		=> esc_html__('Featured pack title', 'nt-conversi'),
			'id'		=> $prefix . "f_title",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'recommended'
		),
		array(
			'name' 		=> esc_html__('Price', 'nt-conversi'),
			'id'		=> $prefix . "price",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '19'
		),
		array(
			'name' 		=> esc_html__('Currency', 'nt-conversi'),
			'id'		=> $prefix . "currency",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '$'
		),
		array(
			'name' 		=> esc_html__('Period', 'nt-conversi'),
			'id'		=> $prefix . "period",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'per month'
		),
		array(
			'name' 		=> esc_html__('Table Features List', 'nt-conversi'),
			'desc'  	=> esc_html__( 'Add features for this pack', 'nt-conversi' ),
			'id'    	=> $prefix . 'features_list',
			'type'  	=> 'text',
			'std'   	=> 'Single user account',
			'class' 	=> 'custom-class',
			'clone' 	=> true,
			'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
        ),
		// RESPONSIVE OPT
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_8', // Not used, but needed
		),
		array(
			'name'		=> esc_html__( 'Large Device', 'nt-conversi' ),
			'id'		=> $prefix . "lg_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-lg-1'	=> esc_html__( 'col-lg-1', 'nt-conversi' ),
						'col-lg-2'	=> esc_html__( 'col-lg-2', 'nt-conversi' ),
						'col-lg-3'	=> esc_html__( 'col-lg-3', 'nt-conversi' ),
						'col-lg-4'	=> esc_html__( 'col-lg-4', 'nt-conversi' ),
						'col-lg-5'	=> esc_html__( 'col-lg-5', 'nt-conversi' ),
						'col-lg-6'	=> esc_html__( 'col-lg-6', 'nt-conversi' ),
						'col-lg-7'	=> esc_html__( 'col-lg-7', 'nt-conversi' ),
						'col-lg-8'	=> esc_html__( 'col-lg-8', 'nt-conversi' ),
						'col-lg-9'	=> esc_html__( 'col-lg-9', 'nt-conversi' ),
						'col-lg-10'	=> esc_html__( 'col-lg-10', 'nt-conversi' ),
						'col-lg-11'	=> esc_html__( 'col-lg-11', 'nt-conversi' ),
						'col-lg-12'	=> esc_html__( 'col-lg-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop', 'nt-conversi' ),
			'id'		=> $prefix . "md_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-4',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-md-1'	=> esc_html__( 'col-md-1', 'nt-conversi' ),
						'col-md-2'	=> esc_html__( 'col-md-2', 'nt-conversi' ),
						'col-md-3'	=> esc_html__( 'col-md-3', 'nt-conversi' ),
						'col-md-4'	=> esc_html__( 'col-md-4', 'nt-conversi' ),
						'col-md-5'	=> esc_html__( 'col-md-5', 'nt-conversi' ),
						'col-md-6'	=> esc_html__( 'col-md-6', 'nt-conversi' ),
						'col-md-7'	=> esc_html__( 'col-md-7', 'nt-conversi' ),
						'col-md-8'	=> esc_html__( 'col-md-8', 'nt-conversi' ),
						'col-md-9'	=> esc_html__( 'col-md-9', 'nt-conversi' ),
						'col-md-10'	=> esc_html__( 'col-md-10', 'nt-conversi' ),
						'col-md-11'	=> esc_html__( 'col-md-11', 'nt-conversi' ),
						'col-md-12'	=> esc_html__( 'col-md-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop offset', 'nt-conversi' ),
			'id'		=> $prefix . "md_off",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column offset', 'nt-conversi' ),
						'col-md-offset-1'	=> esc_html__( 'col-md-offset-1', 'nt-conversi' ),
						'col-md-offset-2'	=> esc_html__( 'col-md-offset-2', 'nt-conversi' ),
						'col-md-offset-3'	=> esc_html__( 'col-md-offset-3', 'nt-conversi' ),
						'col-md-offset-4'	=> esc_html__( 'col-md-offset-4', 'nt-conversi' ),
						'col-md-offset-5'	=> esc_html__( 'col-md-offset-5', 'nt-conversi' ),
						'col-md-offset-6'	=> esc_html__( 'col-md-offset-6', 'nt-conversi' ),
						'col-md-offset-7'	=> esc_html__( 'col-md-offset-7', 'nt-conversi' ),
						'col-md-offset-8'	=> esc_html__( 'col-md-offset-8', 'nt-conversi' ),
						'col-md-offset-9'	=> esc_html__( 'col-md-offset-9', 'nt-conversi' ),
						'col-md-offset-10'	=> esc_html__( 'col-md-offset-10', 'nt-conversi' ),
						'col-md-offset-11'	=> esc_html__( 'col-md-offset-11', 'nt-conversi' ),
						'col-md-offset-12'	=> esc_html__( 'col-md-offset-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Tablet', 'nt-conversi' ),
			'id'		=> $prefix . "sm_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-sm-4',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-sm-1'		=> esc_html__( 'col-sm-1', 'nt-conversi' ),
						'col-sm-2'		=> esc_html__( 'col-sm-2', 'nt-conversi' ),
						'col-sm-3'		=> esc_html__( 'col-sm-3', 'nt-conversi' ),
						'col-sm-4'		=> esc_html__( 'col-sm-4', 'nt-conversi' ),
						'col-sm-5'		=> esc_html__( 'col-sm-5', 'nt-conversi' ),
						'col-sm-6'		=> esc_html__( 'col-sm-6', 'nt-conversi' ),
						'col-sm-7'		=> esc_html__( 'col-sm-7', 'nt-conversi' ),
						'col-sm-8'		=> esc_html__( 'col-sm-8', 'nt-conversi' ),
						'col-sm-9'		=> esc_html__( 'col-sm-9', 'nt-conversi' ),
						'col-sm-10'		=> esc_html__( 'col-sm-10', 'nt-conversi' ),
						'col-sm-11'		=> esc_html__( 'col-sm-11', 'nt-conversi' ),
						'col-sm-12'		=> esc_html__( 'col-sm-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Phone', 'nt-conversi' ),
			'id'		=> $prefix . "xs_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-xs-12',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-xs-1'		=> esc_html__( 'col-xs-1', 'nt-conversi' ),
						'col-xs-2'		=> esc_html__( 'col-xs-2', 'nt-conversi' ),
						'col-xs-3'		=> esc_html__( 'col-xs-3', 'nt-conversi' ),
						'col-xs-4'		=> esc_html__( 'col-xs-4', 'nt-conversi' ),
						'col-xs-5'		=> esc_html__( 'col-xs-5', 'nt-conversi' ),
						'col-xs-6'		=> esc_html__( 'col-xs-6', 'nt-conversi' ),
						'col-xs-7'		=> esc_html__( 'col-xs-7', 'nt-conversi' ),
						'col-xs-8'		=> esc_html__( 'col-xs-8', 'nt-conversi' ),
						'col-xs-9'		=> esc_html__( 'col-xs-9', 'nt-conversi' ),
						'col-xs-10'		=> esc_html__( 'col-xs-10', 'nt-conversi' ),
						'col-xs-11'		=> esc_html__( 'col-xs-11', 'nt-conversi' ),
						'col-xs-12'		=> esc_html__( 'col-xs-12', 'nt-conversi' ),
			)
		),

	)
);

/* ----------------------------------------------------- */
// TEAM PLUGINS SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' 		=> esc_html__( 'Team Details', 'nt-conversi' ),
	'pages'    		=> array( 'team' ),
	'clone-group' 	=> 'my-clone-group','clone-group' => 'my-clone-group',
	'id' 			=> 'mm_review',
	'context'     	=> 'normal',
	'priority'    	=> 'high',
	'fields' 		=> array(

		array(
			'name' 		=> esc_html__('Team Job', 'nt-conversi'),
			'id'		=> $prefix . "team_job",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'Developer'
		),
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_7', // Not used, but needed
		),
		array(
			'name'     	=> esc_html__( 'Team image width (without px)', 'nt-conversi' ),
			'id'		=> $prefix . "img_width",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '350'
		),

		array(
			'name'     	=> esc_html__( 'Team image height (without px)', 'nt-conversi' ),
			'id'		=> $prefix . "img_height",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '350'
		),

		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_8', // Not used, but needed
		),
		array(

			'name'  	=> esc_html__( 'Social Icon Name', 'nt-conversi' ),
			'desc'  	=> esc_html__( 'Format: fa fa-facebook. Enter social icon name here', 'nt-conversi' ),
			'id'    	=> $prefix . 'social_icon',
			'type'  	=> 'text',
			'std'   	=> 'fa fa-facebook',
			'class' 	=> 'custom-class',
			'clone' 	=> true,
			'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
		),

		array(
			'name'  	=> esc_html__( 'Social Url', 'nt-conversi' ),
			'desc'  	=> esc_html__( 'Format: http://facebook.com', 'nt-conversi' ),
			'id'    	=> $prefix . 'social_url',
			'type'  	=> 'text',
			'std'   	=> '#',
			'class' 	=> 'custom-class',
			'clone' 	=> true,
			'clone-group' => 'my-clone-group',
		),

		array(
			'name'     	=> esc_html__( 'Select target type', 'nt-conversi' ),
			'id'		=> $prefix . "social_target",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '_blank',
			'options'	=> array(
						'_blank'		=> '_blank',
						'_self'			=> '_self',
						'_parent'		=> '_parent',
						'_top'			=> '_top',
			)
		),
		// RESPONSIVE OPT
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_8', // Not used, but needed
		),
		array(
			'name'		=> esc_html__( 'Large Device', 'nt-conversi' ),
			'id'		=> $prefix . "lg_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-lg-1'	=> esc_html__( 'col-lg-1', 'nt-conversi' ),
						'col-lg-2'	=> esc_html__( 'col-lg-2', 'nt-conversi' ),
						'col-lg-3'	=> esc_html__( 'col-lg-3', 'nt-conversi' ),
						'col-lg-4'	=> esc_html__( 'col-lg-4', 'nt-conversi' ),
						'col-lg-5'	=> esc_html__( 'col-lg-5', 'nt-conversi' ),
						'col-lg-6'	=> esc_html__( 'col-lg-6', 'nt-conversi' ),
						'col-lg-7'	=> esc_html__( 'col-lg-7', 'nt-conversi' ),
						'col-lg-8'	=> esc_html__( 'col-lg-8', 'nt-conversi' ),
						'col-lg-9'	=> esc_html__( 'col-lg-9', 'nt-conversi' ),
						'col-lg-10'	=> esc_html__( 'col-lg-10', 'nt-conversi' ),
						'col-lg-11'	=> esc_html__( 'col-lg-11', 'nt-conversi' ),
						'col-lg-12'	=> esc_html__( 'col-lg-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop', 'nt-conversi' ),
			'id'		=> $prefix . "md_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-3',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-md-1'	=> esc_html__( 'col-md-1', 'nt-conversi' ),
						'col-md-2'	=> esc_html__( 'col-md-2', 'nt-conversi' ),
						'col-md-3'	=> esc_html__( 'col-md-3', 'nt-conversi' ),
						'col-md-4'	=> esc_html__( 'col-md-4', 'nt-conversi' ),
						'col-md-5'	=> esc_html__( 'col-md-5', 'nt-conversi' ),
						'col-md-6'	=> esc_html__( 'col-md-6', 'nt-conversi' ),
						'col-md-7'	=> esc_html__( 'col-md-7', 'nt-conversi' ),
						'col-md-8'	=> esc_html__( 'col-md-8', 'nt-conversi' ),
						'col-md-9'	=> esc_html__( 'col-md-9', 'nt-conversi' ),
						'col-md-10'	=> esc_html__( 'col-md-10', 'nt-conversi' ),
						'col-md-11'	=> esc_html__( 'col-md-11', 'nt-conversi' ),
						'col-md-12'	=> esc_html__( 'col-md-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop offset', 'nt-conversi' ),
			'id'		=> $prefix . "md_off",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column offset', 'nt-conversi' ),
						'col-md-offset-1'	=> esc_html__( 'col-md-offset-1', 'nt-conversi' ),
						'col-md-offset-2'	=> esc_html__( 'col-md-offset-2', 'nt-conversi' ),
						'col-md-offset-3'	=> esc_html__( 'col-md-offset-3', 'nt-conversi' ),
						'col-md-offset-4'	=> esc_html__( 'col-md-offset-4', 'nt-conversi' ),
						'col-md-offset-5'	=> esc_html__( 'col-md-offset-5', 'nt-conversi' ),
						'col-md-offset-6'	=> esc_html__( 'col-md-offset-6', 'nt-conversi' ),
						'col-md-offset-7'	=> esc_html__( 'col-md-offset-7', 'nt-conversi' ),
						'col-md-offset-8'	=> esc_html__( 'col-md-offset-8', 'nt-conversi' ),
						'col-md-offset-9'	=> esc_html__( 'col-md-offset-9', 'nt-conversi' ),
						'col-md-offset-10'	=> esc_html__( 'col-md-offset-10', 'nt-conversi' ),
						'col-md-offset-11'	=> esc_html__( 'col-md-offset-11', 'nt-conversi' ),
						'col-md-offset-12'	=> esc_html__( 'col-md-offset-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Tablet', 'nt-conversi' ),
			'id'		=> $prefix . "sm_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-sm-6',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-sm-1'		=> esc_html__( 'col-sm-1', 'nt-conversi' ),
						'col-sm-2'		=> esc_html__( 'col-sm-2', 'nt-conversi' ),
						'col-sm-3'		=> esc_html__( 'col-sm-3', 'nt-conversi' ),
						'col-sm-4'		=> esc_html__( 'col-sm-4', 'nt-conversi' ),
						'col-sm-5'		=> esc_html__( 'col-sm-5', 'nt-conversi' ),
						'col-sm-6'		=> esc_html__( 'col-sm-6', 'nt-conversi' ),
						'col-sm-7'		=> esc_html__( 'col-sm-7', 'nt-conversi' ),
						'col-sm-8'		=> esc_html__( 'col-sm-8', 'nt-conversi' ),
						'col-sm-9'		=> esc_html__( 'col-sm-9', 'nt-conversi' ),
						'col-sm-10'		=> esc_html__( 'col-sm-10', 'nt-conversi' ),
						'col-sm-11'		=> esc_html__( 'col-sm-11', 'nt-conversi' ),
						'col-sm-12'		=> esc_html__( 'col-sm-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Phone', 'nt-conversi' ),
			'id'		=> $prefix . "xs_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-xs-12',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-xs-1'		=> esc_html__( 'col-xs-1', 'nt-conversi' ),
						'col-xs-2'		=> esc_html__( 'col-xs-2', 'nt-conversi' ),
						'col-xs-3'		=> esc_html__( 'col-xs-3', 'nt-conversi' ),
						'col-xs-4'		=> esc_html__( 'col-xs-4', 'nt-conversi' ),
						'col-xs-5'		=> esc_html__( 'col-xs-5', 'nt-conversi' ),
						'col-xs-6'		=> esc_html__( 'col-xs-6', 'nt-conversi' ),
						'col-xs-7'		=> esc_html__( 'col-xs-7', 'nt-conversi' ),
						'col-xs-8'		=> esc_html__( 'col-xs-8', 'nt-conversi' ),
						'col-xs-9'		=> esc_html__( 'col-xs-9', 'nt-conversi' ),
						'col-xs-10'		=> esc_html__( 'col-xs-10', 'nt-conversi' ),
						'col-xs-11'		=> esc_html__( 'col-xs-11', 'nt-conversi' ),
						'col-xs-12'		=> esc_html__( 'col-xs-12', 'nt-conversi' ),
			)
		)
	)
);

/* ----------------------------------------------------- */
// POST SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' 		=> 'postsettings',
	'title' 	=> 'Post Custom Options ( for one-page latest news shortcode )',
	'pages' 	=> array( 'post' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',
	'fields' 	=> array(
		array(
			'name'     	=> esc_html__( 'Post image width (without px,unit)', 'nt-conversi' ),
			'desc'  	=> esc_html__( 'Enter custom image width for auto-crop', 'nt-conversi' ),
			'id'		=> $prefix . "img_width",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '500'
		),
		array(
			'name'     	=> esc_html__( 'Post image height (without px,unit)', 'nt-conversi' ),
			'desc'  	=> esc_html__( 'Enter custom image height for auto-crop', 'nt-conversi' ),
			'id'		=> $prefix . "img_height",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '400'
		),
		// RESPONSIVE OPT
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_8', // Not used, but needed
		),
		array(
			'name'		=> esc_html__( 'Large Device', 'nt-conversi' ),
			'id'		=> $prefix . "lg_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-lg-1'	=> esc_html__( 'col-lg-1', 'nt-conversi' ),
						'col-lg-2'	=> esc_html__( 'col-lg-2', 'nt-conversi' ),
						'col-lg-3'	=> esc_html__( 'col-lg-3', 'nt-conversi' ),
						'col-lg-4'	=> esc_html__( 'col-lg-4', 'nt-conversi' ),
						'col-lg-5'	=> esc_html__( 'col-lg-5', 'nt-conversi' ),
						'col-lg-6'	=> esc_html__( 'col-lg-6', 'nt-conversi' ),
						'col-lg-7'	=> esc_html__( 'col-lg-7', 'nt-conversi' ),
						'col-lg-8'	=> esc_html__( 'col-lg-8', 'nt-conversi' ),
						'col-lg-9'	=> esc_html__( 'col-lg-9', 'nt-conversi' ),
						'col-lg-10'	=> esc_html__( 'col-lg-10', 'nt-conversi' ),
						'col-lg-11'	=> esc_html__( 'col-lg-11', 'nt-conversi' ),
						'col-lg-12'	=> esc_html__( 'col-lg-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop', 'nt-conversi' ),
			'id'		=> $prefix . "md_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-3',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-md-1'	=> esc_html__( 'col-md-1', 'nt-conversi' ),
						'col-md-2'	=> esc_html__( 'col-md-2', 'nt-conversi' ),
						'col-md-3'	=> esc_html__( 'col-md-3', 'nt-conversi' ),
						'col-md-4'	=> esc_html__( 'col-md-4', 'nt-conversi' ),
						'col-md-5'	=> esc_html__( 'col-md-5', 'nt-conversi' ),
						'col-md-6'	=> esc_html__( 'col-md-6', 'nt-conversi' ),
						'col-md-7'	=> esc_html__( 'col-md-7', 'nt-conversi' ),
						'col-md-8'	=> esc_html__( 'col-md-8', 'nt-conversi' ),
						'col-md-9'	=> esc_html__( 'col-md-9', 'nt-conversi' ),
						'col-md-10'	=> esc_html__( 'col-md-10', 'nt-conversi' ),
						'col-md-11'	=> esc_html__( 'col-md-11', 'nt-conversi' ),
						'col-md-12'	=> esc_html__( 'col-md-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop offset', 'nt-conversi' ),
			'id'		=> $prefix . "md_off",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column offset', 'nt-conversi' ),
						'col-md-offset-1'	=> esc_html__( 'col-md-offset-1', 'nt-conversi' ),
						'col-md-offset-2'	=> esc_html__( 'col-md-offset-2', 'nt-conversi' ),
						'col-md-offset-3'	=> esc_html__( 'col-md-offset-3', 'nt-conversi' ),
						'col-md-offset-4'	=> esc_html__( 'col-md-offset-4', 'nt-conversi' ),
						'col-md-offset-5'	=> esc_html__( 'col-md-offset-5', 'nt-conversi' ),
						'col-md-offset-6'	=> esc_html__( 'col-md-offset-6', 'nt-conversi' ),
						'col-md-offset-7'	=> esc_html__( 'col-md-offset-7', 'nt-conversi' ),
						'col-md-offset-8'	=> esc_html__( 'col-md-offset-8', 'nt-conversi' ),
						'col-md-offset-9'	=> esc_html__( 'col-md-offset-9', 'nt-conversi' ),
						'col-md-offset-10'	=> esc_html__( 'col-md-offset-10', 'nt-conversi' ),
						'col-md-offset-11'	=> esc_html__( 'col-md-offset-11', 'nt-conversi' ),
						'col-md-offset-12'	=> esc_html__( 'col-md-offset-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Tablet', 'nt-conversi' ),
			'id'		=> $prefix . "sm_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-sm-6',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-sm-1'		=> esc_html__( 'col-sm-1', 'nt-conversi' ),
						'col-sm-2'		=> esc_html__( 'col-sm-2', 'nt-conversi' ),
						'col-sm-3'		=> esc_html__( 'col-sm-3', 'nt-conversi' ),
						'col-sm-4'		=> esc_html__( 'col-sm-4', 'nt-conversi' ),
						'col-sm-5'		=> esc_html__( 'col-sm-5', 'nt-conversi' ),
						'col-sm-6'		=> esc_html__( 'col-sm-6', 'nt-conversi' ),
						'col-sm-7'		=> esc_html__( 'col-sm-7', 'nt-conversi' ),
						'col-sm-8'		=> esc_html__( 'col-sm-8', 'nt-conversi' ),
						'col-sm-9'		=> esc_html__( 'col-sm-9', 'nt-conversi' ),
						'col-sm-10'		=> esc_html__( 'col-sm-10', 'nt-conversi' ),
						'col-sm-11'		=> esc_html__( 'col-sm-11', 'nt-conversi' ),
						'col-sm-12'		=> esc_html__( 'col-sm-12', 'nt-conversi' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Phone', 'nt-conversi' ),
			'id'		=> $prefix . "xs_col",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-xs-12',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-conversi' ),
						'col-xs-1'		=> esc_html__( 'col-xs-1', 'nt-conversi' ),
						'col-xs-2'		=> esc_html__( 'col-xs-2', 'nt-conversi' ),
						'col-xs-3'		=> esc_html__( 'col-xs-3', 'nt-conversi' ),
						'col-xs-4'		=> esc_html__( 'col-xs-4', 'nt-conversi' ),
						'col-xs-5'		=> esc_html__( 'col-xs-5', 'nt-conversi' ),
						'col-xs-6'		=> esc_html__( 'col-xs-6', 'nt-conversi' ),
						'col-xs-7'		=> esc_html__( 'col-xs-7', 'nt-conversi' ),
						'col-xs-8'		=> esc_html__( 'col-xs-8', 'nt-conversi' ),
						'col-xs-9'		=> esc_html__( 'col-xs-9', 'nt-conversi' ),
						'col-xs-10'		=> esc_html__( 'col-xs-10', 'nt-conversi' ),
						'col-xs-11'		=> esc_html__( 'col-xs-11', 'nt-conversi' ),
						'col-xs-12'		=> esc_html__( 'col-xs-12', 'nt-conversi' ),
			)
		)
	)
);

/*-----------------------------------------------------------------------------------*/
/*  METABOXES FOR BLOG POSTS
/*-----------------------------------------------------------------------------------*/

// GALLERY POST FORMAT
$meta_boxes[] = array(
	'title'    	=> esc_html__('Gallery Settings', 'nt-conversi'),
	'pages'    	=> array('post'),
	'fields' 	=> array(
		array(
			'name' => esc_html__('Select Images', 'nt-conversi'),
			'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-conversi'),
			'id'   => $prefix . 'gallery_image',
			'type' => 'image_advanced',
		)
	)
);

// QUOTE POST FORMAT
$meta_boxes[] = array(
	'title'    	=> esc_html__('Quote Settings', 'nt-conversi'),
	'pages'    	=> array('post'),
	'fields' 	=> array(
		array(
			'name' => esc_html__('The Quote', 'nt-conversi'),
			'desc' => esc_html__('Write your quote in this field.', 'nt-conversi'),
			'id'   => $prefix . 'quote_text',
			'type' => 'textarea',
			'rows' => 5
		),
		array(
			'name' => esc_html__('The Author', 'nt-conversi'),
			'desc' => esc_html__('Enter the name of the author of this quote.', 'nt-conversi'),
			'id'   => $prefix . 'quote_author',
			'type' => 'text'
		),
		array(
			'name' => esc_html__('Background Color', 'nt-conversi'),
			'desc' => esc_html__('Choose the background color for this quote.', 'nt-conversi'),
			'id'   => $prefix . 'quote_bg',
			'type' => 'color'
		),
		array(
			'name' => esc_html__('Background Opacity', 'nt-conversi'),
			'desc' => esc_html__('Choose the opacity of the background color.', 'nt-conversi'),
			'id'   => $prefix . 'quote_bg_opacity',
			'type' => 'text',
			'std'  => 80
		)
	)
);

// AUDIO POST FORMAT
$meta_boxes[] = array(
	'title'    	=> esc_html__('Audio Settings', 'nt-conversi'),
	'pages'    	=> array('post'),
	'fields' 	=> array(
		array(
		'type'     => 'heading',
		'name'     => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-conversi' ),
		'id'   	   => 'audio_head'
		),
		array(
			'name' => esc_html__('MP3 File URL', 'nt-conversi'),
			'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-conversi'),
			'id'   => $prefix . 'audio_mp3',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGA File URL', 'nt-conversi'),
			'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-conversi'),
			'id'   => $prefix . 'audio_ogg',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Divider', 'nt-conversi'),
			'desc' => esc_html__('divider.', 'nt-conversi'),
			'id'   => $prefix . 'audio_divider',
			'type' => 'divider'
		),
		array(
			'name' => esc_html__('SoundCloud', 'nt-conversi'),
			'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-conversi'),
			'id'   => $prefix . 'audio_sc',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Color', 'nt-conversi'),
			'desc' => esc_html__('Choose the color.', 'nt-conversi'),
			'id'   => $prefix . 'audio_sc_color',
			'type' => 'color',
			'std'  => '#ff7700'
		)
	)
);

// VIDEO POST FORMAT
$meta_boxes[] = array(
'title'    	=> esc_html__('Video Settings', 'nt-conversi'),
'pages'    	=> array('post'),
'fields' 	=> array(
		array(
		'type'     => 'heading',
		'name'     => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-conversi' ),
		'id'       => 'video_head'
		),
		array(
			'name' => esc_html__('M4V File URL', 'nt-conversi'),
			'desc' => esc_html__('The URL to the .m4v video file.', 'nt-conversi'),
			'id'   => $prefix . 'video_m4v',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGV File URL', 'nt-conversi'),
			'desc' => esc_html__('The URL to the .ogv video file.', 'nt-conversi'),
			'id'   => $prefix . 'video_ogv',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('WEBM File URL', 'nt-conversi'),
			'desc' => esc_html__('The URL to the .webm video file.', 'nt-conversi'),
			'id'   => $prefix . 'video_webm',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Embeded Code', 'nt-conversi'),
			'desc' => esc_html__('Select the preview image for this video.', 'nt-conversi'),
			'id'   => $prefix . 'video_embed',
			'type' => 'textarea',
			'rows' => 8
		)
	)
);

	//end
	return $meta_boxes;
}

?>